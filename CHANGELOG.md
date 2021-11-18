# Schiedsrichter-Lizenzen Changelog

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
