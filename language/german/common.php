<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
/**
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           1
 * @author          Xoops Development Team
 */

$moduleDirName      = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

\define('_CO_WGTIMELINES_TIMELINE_EXPIRED', 'Abgelaufene Einträge');
\define('_CO_WGTIMELINES_TIMELINE_EXPIRED_DESC', "Wenn Sie 'Datum/Uhrzeit' verwenden, dann können sie abgelaufene Einträge ausblenden");
\define('_CO_TIMELINE_EXPIRED_SHOW', 'Weiterhin anzeigen');
\define('_CO_TIMELINE_EXPIRED_HIDE', 'Nicht mehr anzeigen');
\define('_CO_WGTIMELINES_ADMIN', 'Administation');

\define('_CO_WGTIMELINES_GDLIBSTATUS', 'GD library support: ');
\define('_CO_WGTIMELINES_GDLIBVERSION', 'GD Library version: ');
\define('_CO_WGTIMELINES_GDOFF', "<span style='font-weight: bold;'>Deaktivieren</span> (Keine Vorschaubilder verfügbar)");
\define('_CO_WGTIMELINES_GDON', "<span style='font-weight: bold;'>Aktivieren</span> (Vorschaubilder verfügbar)");
\define('_CO_WGTIMELINES_IMAGEINFO', 'Server Status');
\define('_CO_WGTIMELINES_MAXPOSTSIZE', 'Maximal erlaubte Größe (Wert post_max_size in php.ini): ');
\define('_CO_WGTIMELINES_MAXUPLOADSIZE', 'Maximal erlaubte Uploadgröße (Wert upload_max_filesize in php.ini): ');
\define('_CO_WGTIMELINES_MEMORYLIMIT', 'Memory limit (Wert memory_limit in php.ini): ');
\define('_CO_WGTIMELINES_METAVERSION', "<span style='font-weight: bold;'>Downloads Meta Version:</span> ");
\define('_CO_WGTIMELINES_OFF', "<span style='font-weight: bold;'>AUS</span>");
\define('_CO_WGTIMELINES_ON', "<span style='font-weight: bold;'>EIN</span>");
\define('_CO_WGTIMELINES_SERVERPATH', 'Serverpfad zum XOOPS Root: ');
\define('_CO_WGTIMELINES_SERVERUPLOADSTATUS', 'Server Uploads Status: ');
\define('_CO_WGTIMELINES_SPHPINI', "<span style='font-weight: bold;'>Aus der Datei PHP.Ini enthaltene Information:</span>");
\define('_CO_WGTIMELINES_UPLOADPATHDSC', 'Beachte. Der Upload-Pfad *MUSS* den vollständigen Serverpfad zum Upload-Verzeichnis enthalten.');

\define('_CO_WGTIMELINES_PRINT', "<span style='font-weight: bold;'>Drucken</span>");
\define('_CO_WGTIMELINES_PDF', "<span style='font-weight: bold;'>PDF erstellen</span>");

\define('_CO_WGTIMELINES_UPGRADEFAILED0', "Update fehlgeschlagen - konnte Feld '%s' nicht umbenennen");
\define('_CO_WGTIMELINES_UPGRADEFAILED1', "Update fehlgeschlagen - konnte neues Feld '%s' nicht hinzufügen");
\define('_CO_WGTIMELINES_UPGRADEFAILED2', "Update fehlgeschlagen - konnte Tabelle '%s' nicht umbenennen");
\define('_CO_WGTIMELINES_ERROR_COLUMN', 'Konnte Feld in Datenbank nicht erstellen: %s');
\define('_CO_WGTIMELINES_ERROR_BAD_XOOPS', 'Dieses Modul benötigt XOOPS %s+ (%s installiert)');
\define('_CO_WGTIMELINES_ERROR_BAD_PHP', 'Dieses Modul benötigt PHP Version %s+ (%s installiert)');
\define('_CO_WGTIMELINES_ERROR_TAG_REMOVAL', 'Konnte Tags vom Modul Tags nicht entfernen');

\define('_CO_WGTIMELINES_FOLDERS_DELETED_OK', 'Upload-Ordner wurden gelöscht');

// Error Msgs
\define('_CO_WGTIMELINES_ERROR_BAD_DEL_PATH', 'Konnte Verzeichnis %s nicht löschen');
\define('_CO_WGTIMELINES_ERROR_BAD_REMOVE', 'Konnte %s nicht löschen');
\define('_CO_WGTIMELINES_ERROR_NO_PLUGIN', 'Konnte PlugIn nicht laden');

//Hilfe
\define('_CO_WGTIMELINES_DIRNAME', \basename(\dirname(__DIR__, 2)));
\define('_CO_WGTIMELINES_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
\define('_CO_WGTIMELINES_BACK_2_ADMIN', 'Zurück zur Administration von');
\define('_CO_WGTIMELINES_OVERVIEW', 'Übersicht');

//\define('_CO_WGTIMELINES_HELP_DIR', __DIR__);

//help multi-page
\define('_CO_WGTIMELINES_DISCLAIMER', 'Disclaimer');
\define('_CO_WGTIMELINES_LICENSE', 'License');
\define('_CO_WGTIMELINES_SUPPORT', 'Support');

//Sample Data
\define('_CO_WGTIMELINES_LOAD_SAMPLEDATA', 'Importe Beispieldaten (ALLE vorhandenen Daten werden gelöscht)');
\define('_CO_WGTIMELINES_LOAD_SAMPLEDATA_CONFIRM', 'Sind Sie sicher, Beispieldaten zu importieren? (ALLE vorhandenen Daten werden gelöscht)');
\define('_CO_WGTIMELINES_LOAD_SAMPLEDATA_SUCCESS', 'Beispieldaten erfolgreich geladen');
\define('_CO_WGTIMELINES_SAVE_SAMPLEDATA', 'Exportiere Tabellen nach YAML');
\define('_CO_WGTIMELINES_SAVE_SAMPLEDATA_SUCCESS', 'Tabellen erfolgreich nach YAML exportiert');
\define('_CO_WGTIMELINES_CLEAR_SAMPLEDATA', 'Beispieldaten löschen');
\define('_CO_WGTIMELINES_CLEAR_SAMPLEDATA_OK', 'Beispieldaten wurden erfolgreich gelöscht');
\define('_CO_WGTIMELINES_CLEAR_SAMPLEDATA_CONFIRM', 'Sind Sie sicher, Beispieldaten zu löschen? (ALLE vorhandenen Daten werden gelöscht)');
\define('_CO_WGTIMELINES_EXPORT_SCHEMA', 'Exportiere DB Schema nach YAML');
\define('_CO_WGTIMELINES_EXPORT_SCHEMA_SUCCESS', 'Export DB Schema nach YAML erfolgreich abgeschlossen');
\define('_CO_WGTIMELINES_EXPORT_SCHEMA_ERROR', 'Fehler: Export DB Schema nach YAML fehlgeschlagen');
\define('_CO_WGTIMELINES_SHOW_SAMPLE_BUTTON', 'Schaltfläche Import Beispieldaten anzeigen?');
\define('_CO_WGTIMELINES_SHOW_SAMPLE_BUTTON_DESC', 'Falls Ja, dann wird die Schaltfläche "Importe Beispieldaten" im Adminbereich sichtbar. Diese Option ist nach der Installation standardmäßig aktiviert.');
\define('_CO_WGTIMELINES_HIDE_SAMPLEDATA_BUTTONS', 'Schaltfläche Import verstecken');
\define('_CO_WGTIMELINES_SHOW_SAMPLEDATA_BUTTONS', 'Schaltfläche Import anzeigen');
\define('_CO_WGTIMELINES_CONFIRM', 'Bestätigen');

//letter choice
\define('_CO_WGTIMELINES_BROWSETOTOPIC', "<span style='font-weight: bold;'>Einträge alphabetisch anzeigen</span>");
\define('_CO_WGTIMELINES_OTHER', 'Andere');
\define('_CO_WGTIMELINES_ALL', 'Alle');

// block defines
\define('_CO_WGTIMELINES_ACCESSRIGHTS', 'Zugriffsberechtigungen');
\define('_CO_WGTIMELINES_ACTION', 'Aktion');
\define('_CO_WGTIMELINES_ACTIVERIGHTS', 'Aktive Berechtigungen');
\define('_CO_WGTIMELINES_BADMIN', 'Blockverwaltung');
\define('_CO_WGTIMELINES_BLKDESC', 'Beschreibung');
\define('_CO_WGTIMELINES_CBCENTER', 'Mitte Mitte');
\define('_CO_WGTIMELINES_CBLEFT', 'Mitte Links');
\define('_CO_WGTIMELINES_CBRIGHT', 'Mitte Rechts');
\define('_CO_WGTIMELINES_SBLEFT', 'Links');
\define('_CO_WGTIMELINES_SBRIGHT', 'Rechts');
\define('_CO_WGTIMELINES_SIDE', 'Ausrichtung');
\define('_CO_WGTIMELINES_TITLE', 'Titel');
\define('_CO_WGTIMELINES_VISIBLE', 'Sichtbar');
\define('_CO_WGTIMELINES_VISIBLEIN', 'Sichtbar in');
\define('_CO_WGTIMELINES_WEIGHT', 'Reihung');

\define('_CO_WGTIMELINES_PERMISSIONS', 'Berechtigungen');
\define('_CO_WGTIMELINES_BLOCKS', 'Blockverwaltung');
\define('_CO_WGTIMELINES_BLOCKS_DESC', 'Block- und Gruppenverwaltung');

\define('_CO_WGTIMELINES_BLOCKS_MANAGMENT', 'Management');
\define('_CO_WGTIMELINES_BLOCKS_ADDBLOCK', 'Neuen Block hinzufügen');
\define('_CO_WGTIMELINES_BLOCKS_EDITBLOCK', 'Block bearbeiten');
\define('_CO_WGTIMELINES_BLOCKS_CLONEBLOCK', 'Block klonen');

//myblocksadmin
\define('_CO_WGTIMELINES_AGDS', 'Administration Gruppen');
\define('_CO_WGTIMELINES_BCACHETIME', 'Cache Time');
\define('_CO_WGTIMELINES_BLOCKS_ADMIN', 'Blockverwaltung');

//Template Admin
\define('_CO_WGTIMELINES_TPLSETS', 'Template Management');
\define('_CO_WGTIMELINES_GENERATE', 'Generieren');
\define('_CO_WGTIMELINES_FILENAME', 'Dateiname');

//Menu
\define('_CO_WGTIMELINES_ADMENU_MIGRATE', 'Migrate');
\define('_CO_WGTIMELINES_FOLDER_YES', 'Folder "%s" exist');
\define('_CO_WGTIMELINES_FOLDER_NO', 'Folder "%s" does not exist. Create the specified folder with CHMOD 777.');
\define('_CO_WGTIMELINES_SHOW_DEV_TOOLS', 'Show Development Tools Button?');
\define('_CO_WGTIMELINES_SHOW_DEV_TOOLS_DESC', 'If yes, the "Migrate" Tab and other Development tools will be visible to the Admin.');
\define('_CO_WGTIMELINES_ADMENU_FEEDBACK', 'Feedback');

//Latest Version Check
\define('_CO_WGTIMELINES_NEW_VERSION', 'Neue Version: ');

//DirectoryChecker
\define('_CO_WGTIMELINES_AVAILABLE', "<span style='color: green;'>Verfügbar</span>");
\define('_CO_WGTIMELINES_NOTAVAILABLE', "<span style='color: red;'>Nicht verfügbar</span>");
\define('_CO_WGTIMELINES_NOTWRITABLE', "<span style='color: red;'>Sollte Berechtigung haben ( %d ), aber es hat ( %d )</span>");
\define('_CO_WGTIMELINES_CREATETHEDIR', 'Estelle es');
\define('_CO_WGTIMELINES_SETMPERM', 'Setze Berechtigung');
\define('_CO_WGTIMELINES_DIRCREATED', 'Das Verzeichnis wurde erstellt');
\define('_CO_WGTIMELINES_DIRNOTCREATED', 'Das Verzeichnis konnte nicht erstellt werden');
\define('_CO_WGTIMELINES_PERMSET', 'Berechtigung wurde gesetzt');
\define('_CO_WGTIMELINES_PERMNOTSET', 'Berechtigung konnte nicht gesetzt werden');

//FileChecker
//\define('_CO_WGTIMELINES_AVAILABLE', "<span style='color: green;'>Available</span>");
//\define('_CO_WGTIMELINES_NOTAVAILABLE', "<span style='color: red;'>Not available</span>");
//\define('_CO_WGTIMELINES_NOTWRITABLE', "<span style='color: red;'>Should have permission ( %d ), but it has ( %d )</span>");
//\define('_CO_WGTIMELINES_COPYTHEFILE', 'Copy it');
//\define('_CO_WGTIMELINES_CREATETHEFILE', 'Create it');
//\define('_CO_WGTIMELINES_SETMPERM', 'Set the permission');

\define('_CO_WGTIMELINES_FILECOPIED', 'Datei wurde kopiert');
\define('_CO_WGTIMELINES_FILENOTCOPIED', 'Datei konnte nicht kopiert werden');

//\define('_CO_WGTIMELINES_PERMSET', 'The permission has been set');
//\define('_CO_WGTIMELINES_PERMNOTSET', 'The permission cannot be set');

//image config
\define('_CO_WGTIMELINES_IMAGE_WIDTH', 'Breite Anzeige Bild');
\define('_CO_WGTIMELINES_IMAGE_WIDTH_DSC', 'Definiere Breite Anzeige Bild');
\define('_CO_WGTIMELINES_IMAGE_HEIGHT', 'Höhe Anzeige Bild');
\define('_CO_WGTIMELINES_IMAGE_HEIGHT_DSC', 'Definiere Höhe Anzeige Bild');
\define('_CO_WGTIMELINES_IMAGE_CONFIG', '<span style="color: #FF0000; font-size: Small;  font-weight: bold;">--- EXTERNE Bildkonfiguration ---</span> ');
\define('_CO_WGTIMELINES_IMAGE_CONFIG_DSC', '');
\define('_CO_WGTIMELINES_IMAGE_UPLOAD_PATH', 'Pfad Bilder-Upload');
\define('_CO_WGTIMELINES_IMAGE_UPLOAD_PATH_DSC', 'Pfad zum Verzeichnis für hochgeladene Bildern');

//Preferences
\define('_CO_WGTIMELINES_TRUNCATE_LENGTH', 'Anzahl Zeichen für das verkürzen von langen Texten');
\define('_CO_WGTIMELINES_TRUNCATE_LENGTH_DESC', 'Definiere die maximale Anzahl an Zeichen zum Kürzen von langen Texten');

//Module Stats
\define('_CO_WGTIMELINES_STATS_SUMMARY', 'Modul-Statistiken');
\define('_CO_WGTIMELINES_TOTAL_CATEGORIES', 'Kategorien:');
\define('_CO_WGTIMELINES_TOTAL_ITEMS', 'Einträge');
\define('_CO_WGTIMELINES_TOTAL_OFFLINE', 'Offline');
\define('_CO_WGTIMELINES_TOTAL_PUBLISHED', 'Veröffentlicht');
\define('_CO_WGTIMELINES_TOTAL_REJECTED', 'Zurückgewiesen');
\define('_CO_WGTIMELINES_TOTAL_SUBMITTED', 'Eingesendet');