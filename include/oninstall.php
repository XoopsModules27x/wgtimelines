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

defined('XOOPS_ROOT_PATH') || exit('Restricted access');

use XoopsModules\Wgtimelines;
use XoopsModules\Wgtimelines\Common;

/**
 * @param  \XoopsModule $module
 * @return bool
 */
function xoops_module_pre_install_wgtimelines(\XoopsModule $module): bool
{
    require \dirname(__DIR__) . '/preloads/autoloader.php';
    $utility = new Wgtimelines\Utility();

    //check for minimum XOOPS version
    $xoopsSuccess = $utility::checkVerXoops($module);

    // check for minimum PHP version
    $phpSuccess = $utility::checkVerPhp($module);

    return $xoopsSuccess && $phpSuccess;
}

/**
 * @param XoopsModule $module
 *
 * @return bool|string
 */
function xoops_module_install_wgtimelines(\XoopsModule $module): bool|string
{
    require \dirname(__DIR__) . '/preloads/autoloader.php';
    
    $moduleDirName = \basename(\dirname(__DIR__));

    /** @var Wgtimelines\Helper $helper */
    /** @var Wgtimelines\Utility $utility */
    /** @var Common\Configurator $configurator */
    $helper       = Wgtimelines\Helper::getInstance();
    $utility      = new Wgtimelines\Utility();
    $configurator = new Common\Configurator();

    // Load language files
    $helper->loadLanguage('admin');
    $helper->loadLanguage('modinfo');
    $helper->loadLanguage('common');

    //  ---  CREATE FOLDERS ---------------
    if ($configurator->uploadFolders) {
        //    foreach (\array_keys($GLOBALS['uploadFolders']) as $i) {
        foreach (\array_keys($configurator->uploadFolders) as $i) {
            $utility::createFolder($configurator->uploadFolders[$i]);
        }
    }

    //  ---  COPY blank.gif FILES ---------------
    if ($configurator->copyBlankFiles) {
        $file = \dirname(__DIR__) . '/assets/images/blank.gif';
        foreach (\array_keys($configurator->copyBlankFiles) as $i) {
            $dest = $configurator->copyBlankFiles[$i] . '/blank.gif';
            $utility::copyFile($file, $dest);
        }
    }
    
    //  ---  DELETE OLD FILES ---------------
    if (\count($configurator->oldFiles) > 0) {
        //    foreach (\array_keys($GLOBALS['uploadFolders']) as $i) {
        foreach (\array_keys($configurator->oldFiles) as $i) {
            $tempFile = $GLOBALS['xoops']->path('modules/' . $moduleDirName . $configurator->oldFiles[$i]);
            if (\is_file($tempFile)) {
                \unlink($tempFile);
            }
        }
    }

    //  ---  DELETE OLD FOLDERS ---------------
    \xoops_load('XoopsFile');
    if (\count($configurator->oldFolders) > 0) {
        //    foreach (\array_keys($GLOBALS['uploadFolders']) as $i) {
        foreach (\array_keys($configurator->oldFolders) as $i) {
            $tempFolder = $GLOBALS['xoops']->path('modules/' . $moduleDirName . $configurator->oldFolders[$i]);
            /* @var $folderHandler XoopsObjectHandler */
            $folderHandler = XoopsFile::getHandler('folder', $tempFolder);
            $folderHandler->delete($tempFolder);
        }
    }

    return true;
}
