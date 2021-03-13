<?php

// Contao einbinden
define('TL_MODE', 'FE');
define('TL_SCRIPT', 'bundles/contaoschiedsrichter/NewsletterSynchronisation.php');
require($_SERVER['DOCUMENT_ROOT'].'/../system/initialize.php');

/**
 * Run in a custom namespace, so the class can be replaced
 */
use Contao\Controller;

/**
 * Klasse NewsletterSynchronisation
 * ==========================================================================================================
 * Import die E-Mail-Adressen der Schiedsrichter aus der Tabelle sr-person der Datenbank des Ergebnisdienstes
 *
 */
class NewsletterSynchronisation
{
	public function __construct()
	{
	}

	public function run()
	{

		try
		{
			// Tabelle sr-person der Ergebnisdienst-Datenbank auslesen
			$objImportDB = \Database::getInstance(array
			(
				'dbHost'     => $GLOBALS['TL_CONFIG']['schiedsrichter_host'],
				'dbUser'     => $GLOBALS['TL_CONFIG']['schiedsrichter_user'],
				'dbPass'     => $GLOBALS['TL_CONFIG']['schiedsrichter_pass'],
				'dbDatabase' => $GLOBALS['TL_CONFIG']['schiedsrichter_db']
			));

			// Aktive und ruhende Schiedsrichter auslesen
			$objSchiedsrichter = $objImportDB->prepare('SELECT * FROM `sr-person` WHERE Lizenz_Status = ? OR Lizenz_Status = ?')
			                                 ->execute('A', 'R');

			// E-Mail-Adressen in Array eintragen
			$adressenSchiedsrichter = array();
			if($objSchiedsrichter->numRows)
			{
				while($objSchiedsrichter->next())
				{
					if($objSchiedsrichter->E_Mail1)
					{
						// Adresse eintragen
						$adressenSchiedsrichter[] = $objSchiedsrichter->E_Mail1;
					}
					else
					{
						// Keine Adresse vorhanden, in tl_log vermerken
						\System::log('Newsletter-Synchronisation Schiedsrichter: '.$objSchiedsrichter->Nachname.','.$objSchiedsrichter->Vorname.' ohne E-Mail', __CLASS__.'::'.__FUNCTION__, TL_NEWSLETTER);
					}
				}
			}
			// Zwangsadresse als Newsletter-Empfänger eintragen
			$adressenSchiedsrichter[] = $GLOBALS['TL_CONFIG']['schiedsrichter_newsletterMail'];
			$adressenSchiedsrichter = array_unique($adressenSchiedsrichter);

			// Adressen aus Newsletter-Tabelle auslesen
			$objNewsletter = \Database::getInstance()->prepare("SELECT * FROM tl_newsletter_recipients WHERE pid=?")
			                                         ->execute($GLOBALS['TL_CONFIG']['schiedsrichter_newsletter']);
			
			// Adresse eintragen
			$adressenNewsletter = array();
			if($objNewsletter->numRows)
			{
				while($objNewsletter->next())
				{
					$adressenNewsletter[] = $objNewsletter->email;
				}
			}
			
			// Vergleicht Array $adressenSchiedsrichter mit dem Array $adressenNewsletter und gibt die Werte aus $adressenSchiedsrichter zurück, die nicht in $adressenNewsletter enthalten sind. 
			$neuabonnenten = array_diff($adressenSchiedsrichter, $adressenNewsletter);
			// Vergleicht Array $adressenNewsletter mit dem Array $adressenSchiedsrichter und gibt die Werte aus $adressenNewsletter zurück, die nicht in $adressenSchiedsrichter enthalten sind. 
			$altabonnenten = array_diff($adressenNewsletter, $adressenSchiedsrichter);
			
			// Neue Abonnenten in den Newsletter eintragen
			foreach($neuabonnenten as $email)
			{
				\Database::getInstance()->prepare("INSERT INTO tl_newsletter_recipients (pid, tstamp, email, active) VALUES (?, ?, ?, ?)")
				                        ->execute($GLOBALS['TL_CONFIG']['schiedsrichter_newsletter'], time(), $email, 1);
			}
			
			// Gelöschte Kunden aus Newsletter löschen
			foreach($altabonnenten as $email)
			{
				\Database::getInstance()->prepare("DELETE FROM tl_newsletter_recipients WHERE pid=? AND email=?")
				                        ->execute($GLOBALS['TL_CONFIG']['schiedsrichter_newsletter'], $email);
			}
			
			echo "Neue Abonnenten:";
			print_r($neuabonnenten);
			echo "Gelöschte Abonnenten:";
			print_r($altabonnenten);

			echo "Fertig";
		}


		catch(Exception $ex)
		{
			print_r($ex);
		}
	}

}

/**
 * Instantiate controller
 */
$objClick = new NewsletterSynchronisation();
$objClick->run();
