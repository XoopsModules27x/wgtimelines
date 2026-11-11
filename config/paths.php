<?php
/**
 * @copyright   XOOPS Project (https://xoops.org)
 * @license     GPL-2.0-or-later (https://www.gnu.org/licenses/gpl-2.0.html)
 */

defined('XOOPS_ROOT_PATH') || exit('Restricted access');

function getPaths(): object
{
    $moduleDirName      = \basename(\dirname(__DIR__));

    return (object)[
        'name'          => \mb_strtoupper($moduleDirName) . ' PathConfigurator',
        'paths'         => [
            'dirname'    => $moduleDirName,
            'admin'      => \XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/admin',
            'modPath'    => \XOOPS_ROOT_PATH . '/modules/' . $moduleDirName,
            'modUrl'     => \XOOPS_URL . '/modules/' . $moduleDirName,
            'uploadPath' => \XOOPS_UPLOAD_PATH . '/' . $moduleDirName,
            'uploadUrl'  => \XOOPS_UPLOAD_URL . '/' . $moduleDirName,
        ],
        'uploadFolders' => [
            \XOOPS_UPLOAD_PATH . '/' . $moduleDirName,
            \XOOPS_UPLOAD_PATH . '/' . $moduleDirName . '/category',
            \XOOPS_UPLOAD_PATH . '/' . $moduleDirName . '/screenshots',
            //\XOOPS_UPLOAD_PATH . '/flags'
        ],
    ];
}
