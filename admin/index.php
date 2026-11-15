<?php

declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * wgTimelines module for xoops
 *
 * @copyright      XOOPS Project https://xoops.org/
 * @license        GPL 3.0 or later
 * @package        wgtimelines
 * @author         Goffy (wedega.com) - Email:<webmaster@wedega.com> - Website:<https://xoops.wedega.com>
 */

use XoopsModules\Wgtimelines;

require_once \dirname(__DIR__) . '/preloads/autoloader.php';
include_once __DIR__ . '/header.php';
// Count elements
$countTimelines = $timelinesHandler->getCount();
$countItems     = $itemsHandler->getCount();
$countTemplates = $templatesHandler->getCount();
if ($countTemplates == 0) {
    // check default template set after install
    $tplsetsdefaultHandler->checkTplsetsdefault();
    $countTemplates = $templatesHandler->getCount();
}
// Template Index
$templateMain = 'wgtimelines_admin_index.tpl';
// InfoBox Statistics
$adminObject->addInfoBox(\_AM_WGTIMELINES_STATISTICS);
// Info elements
$adminObject->addInfoBoxLine(\sprintf('<label>'.\_AM_WGTIMELINES_THEREARE_TIMELINES.'</label>', $countTimelines));
$adminObject->addInfoBoxLine(\sprintf('<label>'.\_AM_WGTIMELINES_THEREARE_ITEMS.'</label>', $countItems));
$adminObject->addInfoBoxLine(\sprintf('<label>'.\_AM_WGTIMELINES_THEREARE_TEMPLATES.'</label>', $countTemplates));
// Upload Folders
$folder = [
    \WGTIMELINES_UPLOAD_PATH,
    \WGTIMELINES_UPLOAD_PATH . '/images/',
    \WGTIMELINES_UPLOAD_PATH . '/images/timelines/',
    \WGTIMELINES_UPLOAD_PATH . '/images/items/'
];
// Uploads Folders Created
foreach(\array_keys($folder) as $i) {
    $adminObject->addConfigBoxLine($folder[$i], 'folder');
    $adminObject->addConfigBoxLine(array($folder[$i], '777'), 'chmod');
}
// Render Index
$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->renderNavigation('index.php'));

//------------- Test Data ----------------------------
if ($helper->getConfig('displaySampleButton')) {
    \xoops_loadLanguage('admin/modulesadmin', 'system');
    require \dirname(__DIR__) . '/testdata/index.php';
    $adminObject->addItemButton(\_CO_WGTIMELINES_LOAD_SAMPLEDATA, '__DIR__ . /../../testdata/index.php?op=load');
    $adminObject->addItemButton(\_CO_WGTIMELINES_SAVE_SAMPLEDATA, '__DIR__ . /../../testdata/index.php?op=save');
    //    $adminObject->addItemButton(\constant('_CO_WGTIMELINES_EXPORT_SCHEMA'), '__DIR__ . /../../testdata/index.php?op=exportschema', 'add');
    $GLOBALS['xoopsTpl']->assign('buttons',  $adminObject->renderButton('left'));
}
//------------- End Test Data ----------------------------

$GLOBALS['xoopsTpl']->assign('index', $adminObject->renderIndex());
include_once __DIR__ . '/footer.php';
