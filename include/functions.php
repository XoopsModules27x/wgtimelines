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
 * @copyright      module for xoops
 * @license        GPL 3.0 or later
 * @package        wgtimelines
 * @since          1.0
 * @min_xoops      2.5.7
 * @author         goffy (wedega.com) - Email:<webmaster@wedega.com> - Website:<https://xoops.wedega.com>
 * @version        $Id: 1.0 functions.php 13070 Sat 2016-10-01 05:42:17Z XOOPS Development Team $
 */

defined('XOOPS_ROOT_PATH') || exit('Restricted access');

require_once \WGTIMELINES_PATH . '/preloads/autoloader.php';

/***************Blocks**************
 * @param $cats
 * @return string
 */
function wgtimelines_block_addCatSelect($cats): string
{
    if (\is_array($cats)) {
        $cat_sql = '('.current($cats);
        \array_shift($cats);
        foreach ($cats as $cat) {
            $cat_sql .= ','.$cat;
        }
        $cat_sql .= ')';
    }
    return $cat_sql;
}

/**
 *  Get the number of templates from the sub categories of a category or sub topics of or topic
 * @param $mytree
 * @param $templates
 * @param $entries
 * @param $cid
 * @return int
 */
function wgtimelinesNumbersOfEntries($mytree, $templates, $entries, $cid): int
{
    $count = 0;
    if (\in_array($cid, $templates)) {
        $child = $mytree->getAllChild($cid);
        foreach (\array_keys($entries) as $i) {
            if ($entries[$i]->getVar('tpl_id') == $cid) {
                $count++;
            }
            foreach (\array_keys($child) as $j) {
                if ($entries[$i]->getVar('tpl_id') == $j) {
                    $count++;
                }
            }
        }
    }
    return $count;
}

function wgtimelinesMetaKeywords($content): void
{
    global $xoopsTpl, $xoTheme;
    $myts = MyTextSanitizer::getInstance();
    $content= $myts->undoHtmlSpecialChars($myts->displayTarea($content));
    if (isset($xoTheme) && \is_object($xoTheme)) {
        $xoTheme->addMeta('meta', 'keywords', \strip_tags($content));
    } else {    // Compatibility for old Xoops versions
        $xoopsTpl->assign('xoops_meta_keywords', \strip_tags($content));
    }
}

function wgtimelinesMetaDescription($content): void
{
    global $xoopsTpl, $xoTheme;
    $myts = MyTextSanitizer::getInstance();
    $content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
    if (isset($xoTheme) && \is_object($xoTheme)) {
        $xoTheme->addMeta('meta', 'description', \strip_tags($content));
    } else {    // Compatibility for old Xoops versions
        $xoopsTpl->assign('xoops_meta_description', \strip_tags($content));
    }
}

