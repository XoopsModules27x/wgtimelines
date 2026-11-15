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
include_once __DIR__ . '/header.php';
$templateMain = 'wgtimelines_admin_about.tpl';
$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->renderNavigation('about.php'));
$GLOBALS['xoopsTpl']->assign('about', $adminObject->renderAbout(''));
include_once __DIR__ . '/footer.php';
