<?php

/**
 * palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{schiedsrichter_legend:hide},schiedsrichter_host,schiedsrichter_db,schiedsrichter_user,schiedsrichter_pass';

/**
 * fields
 */

// Alte Elobase-Datenbank Host
$GLOBALS['TL_DCA']['tl_settings']['fields']['schiedsrichter_host'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['schiedsrichter_host'],
	'inputType'               => 'text',
	'eval'                    => array
	(
		'tl_class'            => 'w50',
	)
);

// Alte Elobase-Datenbank Datenbank
$GLOBALS['TL_DCA']['tl_settings']['fields']['schiedsrichter_db'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['schiedsrichter_db'],
	'inputType'               => 'text',
	'eval'                    => array
	(
		'tl_class'            => 'w50',
	)
);

// Alte Elobase-Datenbank Benutzer
$GLOBALS['TL_DCA']['tl_settings']['fields']['schiedsrichter_user'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['schiedsrichter_user'],
	'inputType'               => 'text',
	'eval'                    => array
	(
		'tl_class'            => 'w50',
	)
);

// Alte Elobase-Datenbank Passwort
$GLOBALS['TL_DCA']['tl_settings']['fields']['schiedsrichter_pass'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['schiedsrichter_pass'],
	'inputType'               => 'text',
	'eval'                    => array
	(
		'tl_class'            => 'w50',
	)
);
