# Schiedsrichter-Lizenzen Changelog

## Version 1.2.0 (2024-04-18)

* Add: codefog/contao-haste
* Change: Haste-Toggler statt des normalen Togglers
* Add: Kompatibilität PHP 8

## Version 1.1.6 (2021-11-19)

* Fix: Numeric value out of range: 1264 Out of range value for column 'prue_datum' at row 1 (29897161200 = Datum aus Jahr 2917!) -> tl_schiedsrichter.prue_datum geändert von int(10) auf int(12)

## Version 1.1.5 (2021-11-19)

* Fix: String data, right truncated: 1406 Data too long for column 'country' at row 1 (Wert = Deu) -> tl_schiedsrichter.country geändert von char(1) auf varchar(3)

## Version 1.1.4 (2021-11-19)

* Add: Import.php Funktion mysql_timestamp zur Umwandlung von MySQL-Datumswerten in Unix-Zeitstempel

## Version 1.1.3 (2021-11-18)

* Fix: Import.php - Numeric value out of range: 1264 Out of range value for column 'edited' at row 1 -> tl_schiedsrichter.edited von 10 auf 12 Byte verlängert

## Version 1.1.2 (2021-11-18)

* Fix: tl_schiedsrichter.rds_d und tl_schiedsrichter.dwz_d von 11 auf 12 Byte verlängert

## Version 1.1.1 (2021-11-18)

* Fix: Import.php - String data, right truncated: 1406 Data too long for column 'rds_d' at row 1 -> tl_schiedsrichter.rds_d und tl_schiedsrichter.dwz_d von 10 auf 11 Byte verlängert

## Version 1.1.0 (2021-03-13)

* Add: NewsletterSynchronisation.php für die Synchronisierung der Schiedsrichter mit dem Contao-Newsletter
* Add: System-Einstellungen für NewsletterSynchronisation

## Version 1.0.0 (2020-11-30)

* Umbau des Bundles, da die Daten nicht mehr aus Excel importiert werden
* Delete: import-Verzeichnis (nicht mehr benötigt)
* Add: tl_settings für Datenbank-Zugangsdaten für Schiedsrichter-Import
* Add: Import.php für die Aktualisierung der Lizenzen
* Delete: Folgende Spalten wurden in tl_schiedsrichter entfernt, da nicht im Import vorhanden oder zuordnenbar: k, fax, faxk1, faxk2, mobil, verband, verein, geb_datum, aktiv, geburtsort, passnr, wahl, bestanden, funktion, l, los, pn, tagg, nn_vn, ls, lsr, ro, title
* Change: Spalte tl_schiedsrichter.sel von 2 auf 20 Zeichen geändert
* Add: Geändert-Spalte übernommen
* Add: Fehlende Übersetzungen tl_schiedsrichter ergänzt
* Add: Import-Funktion im Backend verbaut. Aktualisierung per Ajax.
* Add: Abhängigkeit schachbulle/contao-helper-bundle
* Add: Frontendmodul für Schiedsrichterliste

## Version 0.0.2 (2020-04-02)

* \Samson\Helper::getDate auskommentiert, muß gefixt werden

## Version 0.0.1 (2020-04-02)

* Initialversion als Contao-4-Bundle auf der Grundlage der Version für Contao 3
