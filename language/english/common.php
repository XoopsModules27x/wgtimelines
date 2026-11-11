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
 * Wfdownloads module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @package         wfdownload
 * @since           3.23
 * @author          Xoops Development Team
 */

$moduleDirName      = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

\define('_CO_WGTIMELINES_TIMELINE_EXPIRED', 'Expired items');
\define('_CO_WGTIMELINES_TIMELINE_EXPIRED_DESC', "If you use 'date/time' then you can hide expired items");
\define('_CO_TIMELINE_EXPIRED_SHOW', 'Continue showing them');
\define('_CO_TIMELINE_EXPIRED_HIDE', 'Hide them');
\define('_CO_WGTIMELINES_ADMIN', 'Administation');

\define('_CO_WGTIMELINES_GDLIBSTATUS', 'GD library support: ');
\define('_CO_WGTIMELINES_GDLIBVERSION', 'GD Library version: ');
\define('_CO_WGTIMELINES_GDOFF', "<span style='font-weight: bold;'>Disabled</span> (No thumbnails available)");
\define('_CO_WGTIMELINES_GDON', "<span style='font-weight: bold;'>Enabled</span> (Thumbsnails available)");
\define('_CO_WGTIMELINES_IMAGEINFO', 'Server status');
\define('_CO_WGTIMELINES_MAXPOSTSIZE', 'Max post size permitted (post_max_size directive in php.ini): ');
\define('_CO_WGTIMELINES_MAXUPLOADSIZE', 'Max upload size permitted (upload_max_filesize directive in php.ini): ');
\define('_CO_WGTIMELINES_MEMORYLIMIT', 'Memory limit (memory_limit directive in php.ini): ');
\define('_CO_WGTIMELINES_METAVERSION', "<span style='font-weight: bold;'>Downloads meta version:</span> ");
\define('_CO_WGTIMELINES_OFF', "<span style='font-weight: bold;'>OFF</span>");
\define('_CO_WGTIMELINES_ON', "<span style='font-weight: bold;'>ON</span>");
\define('_CO_WGTIMELINES_SERVERPATH', 'Server path to XOOPS root: ');
\define('_CO_WGTIMELINES_SERVERUPLOADSTATUS', 'Server uploads status: ');
\define('_CO_WGTIMELINES_SPHPINI', "<span style='font-weight: bold;'>Information taken from PHP ini file:</span>");
\define('_CO_WGTIMELINES_UPLOADPATHDSC', 'Note. Upload path *MUST* contain the full server path of your upload folder.');

\define('_CO_WGTIMELINES_PRINT', "<span style='font-weight: bold;'>Print</span>");
\define('_CO_WGTIMELINES_PDF', "<span style='font-weight: bold;'>Create PDF</span>");

\define('_CO_WGTIMELINES_UPGRADEFAILED0', "Update failed - couldn't rename field '%s'");
\define('_CO_WGTIMELINES_UPGRADEFAILED1', "Update failed - couldn't add new fields");
\define('_CO_WGTIMELINES_UPGRADEFAILED2', "Update failed - couldn't rename table '%s'");
\define('_CO_WGTIMELINES_ERROR_COLUMN', 'Could not create column in database : %s');
\define('_CO_WGTIMELINES_ERROR_BAD_XOOPS', 'This module requires XOOPS %s+ (%s installed)');
\define('_CO_WGTIMELINES_ERROR_BAD_PHP', 'This module requires PHP version %s+ (%s installed)');
\define('_CO_WGTIMELINES_ERROR_TAG_REMOVAL', 'Could not remove tags from Tag Module');

\define('_CO_WGTIMELINES_FOLDERS_DELETED_OK', 'Upload Folders have been deleted');

// Error Msgs
\define('_CO_WGTIMELINES_ERROR_BAD_DEL_PATH', 'Could not delete %s directory');
\define('_CO_WGTIMELINES_ERROR_BAD_REMOVE', 'Could not delete %s');
\define('_CO_WGTIMELINES_ERROR_NO_PLUGIN', 'Could not load plugin');

//Help
\define('_CO_WGTIMELINES_DIRNAME', \basename(\dirname(__DIR__, 2)));
\define('_CO_WGTIMELINES_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
\define('_CO_WGTIMELINES_BACK_2_ADMIN', 'Back to Administration of ');
\define('_CO_WGTIMELINES_OVERVIEW', 'Overview');

//\define('_CO_WGTIMELINES_HELP_DIR', __DIR__);

//help multi-page
\define('_CO_WGTIMELINES_DISCLAIMER', 'Disclaimer');
\define('_CO_WGTIMELINES_LICENSE', 'License');
\define('_CO_WGTIMELINES_SUPPORT', 'Support');

//Sample Data
\define('_CO_WGTIMELINES_LOAD_SAMPLEDATA', 'Import Sample Data (will delete ALL current data)');
\define('_CO_WGTIMELINES_LOAD_SAMPLEDATA_CONFIRM', 'Are you sure to Import Sample Data? (It will delete ALL current data)');
\define('_CO_WGTIMELINES_LOAD_SAMPLEDATA_SUCCESS', 'Sample Date saved successfully');
\define('_CO_WGTIMELINES_SAVE_SAMPLEDATA', 'Export Tables to YAML');
\define('_CO_WGTIMELINES_SAVE_SAMPLEDATA_SUCCESS', 'Export Tables to YAML successfully');
\define('_CO_WGTIMELINES_CLEAR_SAMPLEDATA', 'Clear the Sample Data');
\define('_CO_WGTIMELINES_CLEAR_SAMPLEDATA_OK', 'The Sample Data has been cleared');
\define('_CO_WGTIMELINES_CLEAR_SAMPLEDATA_CONFIRM', 'Are you sure to Clear Sample Data? (It will delete ALL current data)');
\define('_CO_WGTIMELINES_EXPORT_SCHEMA', 'Export DB Schema to YAML');
\define('_CO_WGTIMELINES_EXPORT_SCHEMA_SUCCESS', 'Export DB Schema to YAML was a success');
\define('_CO_WGTIMELINES_EXPORT_SCHEMA_ERROR', 'ERROR: Export of DB Schema to YAML failed');
\define('_CO_WGTIMELINES_SHOW_SAMPLE_BUTTON', 'Show Sample Button?');
\define('_CO_WGTIMELINES_SHOW_SAMPLE_BUTTON_DESC', 'If yes, the "Add Sample Data" button will be visible to the Admin. It is Yes as a default for first installation.');
\define('_CO_WGTIMELINES_HIDE_SAMPLEDATA_BUTTONS', 'Hide the Import buttons');
\define('_CO_WGTIMELINES_SHOW_SAMPLEDATA_BUTTONS', 'Show the Import buttons');
\define('_CO_WGTIMELINES_CONFIRM', 'Confirm');

//letter choice
\define('_CO_WGTIMELINES_BROWSETOTOPIC', "<span style='font-weight: bold;'>Browse items alphabetically</span>");
\define('_CO_WGTIMELINES_OTHER', 'Other');
\define('_CO_WGTIMELINES_ALL', 'All');

// block defines
\define('_CO_WGTIMELINES_ACCESSRIGHTS', 'Access Rights');
\define('_CO_WGTIMELINES_ACTION', 'Action');
\define('_CO_WGTIMELINES_ACTIVERIGHTS', 'Active Rights');
\define('_CO_WGTIMELINES_BADMIN', 'Block Administration');
\define('_CO_WGTIMELINES_BLKDESC', 'Description');
\define('_CO_WGTIMELINES_CBCENTER', 'Center Middle');
\define('_CO_WGTIMELINES_CBLEFT', 'Center Left');
\define('_CO_WGTIMELINES_CBRIGHT', 'Center Right');
\define('_CO_WGTIMELINES_SBLEFT', 'Left');
\define('_CO_WGTIMELINES_SBRIGHT', 'Right');
\define('_CO_WGTIMELINES_SIDE', 'Alignment');
\define('_CO_WGTIMELINES_TITLE', 'Title');
\define('_CO_WGTIMELINES_VISIBLE', 'Visible');
\define('_CO_WGTIMELINES_VISIBLEIN', 'Visible In');
\define('_CO_WGTIMELINES_WEIGHT', 'Weight');

\define('_CO_WGTIMELINES_PERMISSIONS', 'Permissions');
\define('_CO_WGTIMELINES_BLOCKS', 'Blocks Admin');
\define('_CO_WGTIMELINES_BLOCKS_DESC', 'Blocks/Group Admin');

\define('_CO_WGTIMELINES_BLOCKS_MANAGMENT', 'Manage');
\define('_CO_WGTIMELINES_BLOCKS_ADDBLOCK', 'Add a new block');
\define('_CO_WGTIMELINES_BLOCKS_EDITBLOCK', 'Edit a block');
\define('_CO_WGTIMELINES_BLOCKS_CLONEBLOCK', 'Clone a block');

//myblocksadmin
\define('_CO_WGTIMELINES_AGDS', 'Admin Groups');
\define('_CO_WGTIMELINES_BCACHETIME', 'Cache Time');
\define('_CO_WGTIMELINES_BLOCKS_ADMIN', 'Blocks Admin');

//Template Admin
\define('_CO_WGTIMELINES_TPLSETS', 'Template Management');
\define('_CO_WGTIMELINES_GENERATE', 'Generate');
\define('_CO_WGTIMELINES_FILENAME', 'File Name');

//Menu
\define('_CO_WGTIMELINES_ADMENU_MIGRATE', 'Migrate');
\define('_CO_WGTIMELINES_FOLDER_YES', 'Folder "%s" exist');
\define('_CO_WGTIMELINES_FOLDER_NO', 'Folder "%s" does not exist. Create the specified folder with CHMOD 777.');
\define('_CO_WGTIMELINES_SHOW_DEV_TOOLS', 'Show Development Tools Button?');
\define('_CO_WGTIMELINES_SHOW_DEV_TOOLS_DESC', 'If yes, the "Migrate" Tab and other Development tools will be visible to the Admin.');
\define('_CO_WGTIMELINES_ADMENU_FEEDBACK', 'Feedback');

//Latest Version Check
\define('_CO_WGTIMELINES_NEW_VERSION', 'New Version: ');

//DirectoryChecker
\define('_CO_WGTIMELINES_AVAILABLE', "<span style='color: green;'>Available</span>");
\define('_CO_WGTIMELINES_NOTAVAILABLE', "<span style='color: red;'>Not available</span>");
\define('_CO_WGTIMELINES_NOTWRITABLE', "<span style='color: red;'>Should have permission ( %d ), but it has ( %d )</span>");
\define('_CO_WGTIMELINES_CREATETHEDIR', 'Create it');
\define('_CO_WGTIMELINES_SETMPERM', 'Set the permission');
\define('_CO_WGTIMELINES_DIRCREATED', 'The directory has been created');
\define('_CO_WGTIMELINES_DIRNOTCREATED', 'The directory cannot be created');
\define('_CO_WGTIMELINES_PERMSET', 'The permission has been set');
\define('_CO_WGTIMELINES_PERMNOTSET', 'The permission cannot be set');

//FileChecker
//\define('_CO_WGTIMELINES_AVAILABLE', "<span style='color: green;'>Available</span>");
//\define('_CO_WGTIMELINES_NOTAVAILABLE', "<span style='color: red;'>Not available</span>");
//\define('_CO_WGTIMELINES_NOTWRITABLE', "<span style='color: red;'>Should have permission ( %d ), but it has ( %d )</span>");
//\define('_CO_WGTIMELINES_COPYTHEFILE', 'Copy it');
//\define('_CO_WGTIMELINES_CREATETHEFILE', 'Create it');
//\define('_CO_WGTIMELINES_SETMPERM', 'Set the permission');

\define('_CO_WGTIMELINES_FILECOPIED', 'The file has been copied');
\define('_CO_WGTIMELINES_FILENOTCOPIED', 'The file cannot be copied');

//\define('_CO_WGTIMELINES_PERMSET', 'The permission has been set');
//\define('_CO_WGTIMELINES_PERMNOTSET', 'The permission cannot be set');

//image config
\define('_CO_WGTIMELINES_IMAGE_WIDTH', 'Image Display Width');
\define('_CO_WGTIMELINES_IMAGE_WIDTH_DSC', 'Display width for image');
\define('_CO_WGTIMELINES_IMAGE_HEIGHT', 'Image Display Height');
\define('_CO_WGTIMELINES_IMAGE_HEIGHT_DSC', 'Display height for image');
\define('_CO_WGTIMELINES_IMAGE_CONFIG', '<span style="color: #FF0000; font-size: Small;  font-weight: bold;">--- EXTERNAL Image configuration ---</span> ');
\define('_CO_WGTIMELINES_IMAGE_CONFIG_DSC', '');
\define('_CO_WGTIMELINES_IMAGE_UPLOAD_PATH', 'Image Upload path');
\define('_CO_WGTIMELINES_IMAGE_UPLOAD_PATH_DSC', 'Path for uploading images');

//Preferences
\define('_CO_WGTIMELINES_TRUNCATE_LENGTH', 'Number of Characters to truncate to the long text field');
\define('_CO_WGTIMELINES_TRUNCATE_LENGTH_DESC', 'Set the maximum number of characters to truncate the long text fields');

//Module Stats
\define('_CO_WGTIMELINES_STATS_SUMMARY', 'Module Statistics');
\define('_CO_WGTIMELINES_TOTAL_CATEGORIES', 'Categories:');
\define('_CO_WGTIMELINES_TOTAL_ITEMS', 'Items');
\define('_CO_WGTIMELINES_TOTAL_OFFLINE', 'Offline');
\define('_CO_WGTIMELINES_TOTAL_PUBLISHED', 'Published');
\define('_CO_WGTIMELINES_TOTAL_REJECTED', 'Rejected');
\define('_CO_WGTIMELINES_TOTAL_SUBMITTED', 'Submitted');
