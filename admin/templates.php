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
 * @version        $Id: 1.0 templates.php 13070 Sat 2016-10-01 05:42:15Z XOOPS Development Team $
 */

use Xmf\Request;

include_once __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op = Request::getString('op', 'list');
// Request tpl_id
$tplId = Request::getInt('tpl_id');
switch ($op) {
    case 'list':
    default:
        $start = Request::getInt('start');
        $limit = Request::getInt('limit', $helper->getConfig('adminpager'));
        $templateMain = 'wgtimelines_admin_templates.tpl';

        // check default template set
        $tplsetsdefaultHandler->checkTplsetsdefault();

        $templatesCount = $templatesHandler->getCountTemplates();
        $templatesAll = $templatesHandler->getAllTemplates($start, $limit);

        $GLOBALS['xoopsTpl']->assign('templates_count', $templatesCount);
        $GLOBALS['xoopsTpl']->assign('wgtimelines_url', \WGTIMELINES_URL);
        $GLOBALS['xoopsTpl']->assign('wgtimelines_upload_url', \WGTIMELINES_UPLOAD_URL);
        $GLOBALS['xoopsTpl']->assign('wgtimelines_icons_url', \WGTIMELINES_ICONS_URL);
        // Table view templates
        if ($templatesCount > 0) {
            foreach (\array_keys($templatesAll) as $i) {
                $template = $templatesAll[$i]->getValuesTemplatesAdmin();
                $obj_tplsetdefault = $tplsetsdefaultHandler->get($template['id']);
                $template['newversion'] = 0;
                $template['notsupported'] = 0;
                if (\is_object($obj_tplsetdefault)) {
                    if ($template['tpl_version'] < $obj_tplsetdefault->getVar('tpl_version')) {
                        $template['newversion'] = 1;
                    }
                } else {
                    $template['notsupported'] = 1;
                }
                $template['newtemplate'] = 0;
                if ($template['tpl_date_create'] > (\time()-2592000)) {
                    $template['newtemplate'] = 1;
                }
                $GLOBALS['xoopsTpl']->append('templates_list', $template);
                unset($template);
            }
            // Display Navigation
            if ($templatesCount > $limit) {
                include_once \XOOPS_ROOT_PATH .'/class/pagenav.php';
                $pagenav = new \XoopsPageNav($templatesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', \_AM_WGTIMELINES_THEREARENT_TEMPLATES);
        }

    break;
    case 'new':
        $templateMain = 'wgtimelines_admin_templates.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->renderNavigation('templates.php'));
        $adminObject->addItemButton(\_AM_WGTIMELINES_TEMPLATES_LIST, 'templates.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->renderButton());
        // Get Form
        $templatesObj = $templatesHandler->create();
        $form = $templatesObj->getFormTemplates();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());

    break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('templates.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($tplId)) {
            $templatesObj = $templatesHandler->get($tplId);
        } else {
            $templatesObj = $templatesHandler->create();
        }

        // Set Vars
        $templatesObj->setVar('tpl_name', Request::getString('tpl_name'));
        $templatesObj->setVar('tpl_desc', Request::getString('tpl_desc'));
        $templatesObj->setVar('tpl_file', Request::getString('tpl_file'));

        $options = [];
        $options[] = ['name' => 'tabletype',
                            'valid' => Request::hasVar('tabletype', 'POST') ? 1 : 0,
                            'value' => Request::getString('tabletype'),
                            'type' => 'text'];
        $options[] = ['name' => 'panel_pos',
                            'valid' => Request::hasVar('panel_pos', 'POST') ? 1 : 0,
                            'value' => Request::getString('panel_pos'),
                            'type' => 'text'];
        $options[] = ['name' => 'panel_pos_single',
                            'valid' => Request::hasVar('panel_pos_single', 'POST') ? 1 : 0,
                            'value' => Request::getString('panel_pos_single', 'left'),
                            'type' => 'text'];
        $options[] = ['name' => 'panel_imgpos',
                            'valid' => Request::hasVar('panel_imgpos', 'POST') ? 1 : 0,
                            'value' => Request::getString('panel_imgpos'),
                            'type' => 'text'];
        $options[] = ['name' => 'imgstyle',
                            'valid' => Request::hasVar('imgstyle', 'POST') ? 1 : 0,
                            'value' => Request::getString('imgstyle'),
                            'type' => 'text'];
        $options[] = ['name' => 'bgcolor',
                            'valid' => Request::hasVar('bgcolor', 'POST') ? 1 : 0,
                            'value' => Request::getString('bgcolor'),
                            'type' => 'color'];
        $options[] = ['name' => 'fontcolor',
                            'valid' => Request::hasVar('fontcolor', 'POST') ? 1 : 0,
                            'value' => Request::getString('fontcolor'),
                            'type' => 'color'];
        $options[] = ['name' => 'bgcolor2',
                            'valid' => Request::hasVar('bgcolor2', 'POST') ? 1 : 0,
                            'value' => Request::getString('bgcolor2'),
                            'type' => 'color'];
        $options[] = ['name' => 'fontcolor2',
                            'valid' => Request::hasVar('fontcolor2', 'POST') ? 1 : 0,
                            'value' => Request::getString('fontcolor2'),
                            'type' => 'color'];
        $options[] = ['name' => 'bgcolor3',
                            'valid' => Request::hasVar('bgcolor3', 'POST') ? 1 : 0,
                            'value' => Request::getString('bgcolor3'),
                            'type' => 'color'];
        $options[] = ['name' => 'fontcolor3',
                            'valid' => Request::hasVar('fontcolor3', 'POST') ? 1 : 0,
                            'value' => Request::getString('fontcolor3'),
                            'type' => 'color'];
        $options[] = ['name' => 'bgcolor4',
                            'valid' => Request::hasVar('bgcolor4', 'POST') ? 1 : 0,
                            'value' => Request::getString('bgcolor4'),
                            'type' => 'color'];
        $options[] = ['name' => 'fontcolor4',
                            'valid' => Request::hasVar('fontcolor4', 'POST') ? 1 : 0,
                            'value' => Request::getString('fontcolor4'),
                            'type' => 'color'];
        $options[] = ['name' => 'badgestyle',
                            'valid' => Request::hasVar('badgestyle', 'POST') ? 1 : 0,
                            'value' => Request::getString('badgestyle'),
                            'type' => 'text'];
        $options[] = ['name' => 'badgecontent',
                            'valid' => Request::hasVar('badgecontent', 'POST') ? 1 : 0,
                            'value' => Request::getString('badgecontent', 'none'),
                            'type' => 'text'];
        $options[] = ['name' => 'badgecolor',
                            'valid' => Request::hasVar('badgecolor', 'POST') ? 1 : 0,
                            'value' => Request::getString('badgecolor'),
                            'type' => 'color'];
        $options[] = ['name' => 'badgefontcolor',
                            'valid' => Request::hasVar('badgefontcolor', 'POST') ? 1 : 0,
                            'value' => Request::getString('badgefontcolor', '#eeeeee'),
                            'type' => 'color'];
        $options[] = ['name' => 'showyear',
                            'valid' => Request::hasVar('showyear', 'POST') ? 1 : 0,
                            'value' => Request::getString('showyear', 'none'),
                            'type' => 'text'];
        $options[] = ['name' => 'linecolor',
                            'valid' => Request::hasVar('linecolor', 'POST') ? 1 : 0,
                            'value' => Request::getString('linecolor'),
                            'type' => 'color'];
        $options[] = ['name' => 'borderwidth',
                            'valid' => Request::hasVar('borderwidth', 'POST') ? 1 : 0,
                            'value' => Request::getString('borderwidth', '1px'),
                            'type' => 'text'];
        $options[] = ['name' => 'borderstyle',
                            'valid' => Request::hasVar('borderstyle', 'POST') ? 1 : 0,
                            'value' => Request::getString('borderstyle', 'solid'),
                            'type' => 'text'];
        $options[] = ['name' => 'bordercolor',
                            'valid' => Request::hasVar('bordercolor', 'POST') ? 1 : 0,
                            'value' => Request::getString('bordercolor', '#eeeeee'),
                            'type' => 'color'];
        $options[] = ['name' => 'borderradius',
                            'valid' => Request::hasVar('borderradius', 'POST') ? 1 : 0,
                            'value' => Request::getString('borderradius', '5px'),
                            'type' => 'text'];
        $options[] = ['name' => 'boxshadow',
                            'valid' => Request::hasVar('boxshadow_h', 'POST') ? 1 : 0,
                            'value' => Request::getString('boxshadow_h', '5px')
                                . ' ' . Request::getString('boxshadow_v', '5px')
                                . ' ' . Request::getString('boxshadow_blur', '5px')
                                . ' ' . Request::getString('boxshadow_spread', '5px')
                                . ' ' . Request::getString('boxshadow_color', '#eeeeee'),
                            'type' => 'text'];
        $options[] = ['name' => 'orientation',
                            'valid' => Request::hasVar('orientation', 'POST') ? 1 : 0,
                            'value' => Request::getString('orientation'),
                            'type' => 'text'];
        $options[] = ['name' => 'datesspeed',
                            'valid' => Request::hasVar('datesspeed', 'POST') ? 1 : 0,
                            'value' => Request::getString('datesspeed'),
                            'type' => 'text'];
        $options[] = ['name' => 'issuesspeed',
                            'valid' => Request::hasVar('issuesspeed', 'POST') ? 1 : 0,
                            'value' => Request::getString('issuesspeed'),
                            'type' => 'text'];
        $options[] = ['name' => 'issuestransparency',
                            'valid' => Request::hasVar('issuestransparency', 'POST') ? 1 : 0,
                            'value' => Request::getString('issuestransparency'),
                            'type' => 'text'];
        $options[] = ['name' => 'issuestransparencyspeed',
                            'valid' => Request::hasVar('issuestransparencyspeed', 'POST') ? 1 : 0,
                            'value' => Request::getString('issuestransparencyspeed'),
                            'type' => 'text'];
        $options[] = ['name' => 'autoplay',
                            'valid' => Request::hasVar('autoplay', 'POST') ? 1 : 0,
                            'value' => (1 == Request::getInt('autoplay')) ? 'true' : 'false',
                            'type' => 'bool'];
        $options[] = ['name' => 'autoplaydirection',
                            'valid' => Request::hasVar('autoplaydirection', 'POST') ? 1 : 0,
                            'value' => Request::getString('autoplaydirection'),
                            'type' => 'text'];
        $options[] = ['name' => 'autoplaypause',
                            'valid' => Request::hasVar('autoplaypause', 'POST') ? 1 : 0,
                            'value' => Request::getString('autoplaypause'),
                            'type' => 'text'];
        $options[] = ['name' => 'arrowkeys',
                            'valid' => Request::hasVar('arrowkeys', 'POST') ? 1 : 0,
                            'value' => (1 == Request::getInt('arrowkeys')) ? 'true' : 'false',
                            'type' => 'bool'];
        $options[] = ['name' => 'startat',
                            'valid' => Request::hasVar('startat', 'POST') ? 1 : 0,
                            'value' => Request::getInt('startat') > 0 ? Request::getInt('startat') : 1,
                            'type' => 'text'];
        $options[] = ['name' => 'fadein',
                            'valid' => Request::hasVar('fadein', 'POST') ? 1 : 0,
                            'value' => Request::getString('fadein', 'appear'),
                            'type' => 'text'];

        $templatesObj->setVar('tpl_options', serialize($options));

        // Insert Data
        if ($templatesHandler->insert($templatesObj)) {
            \redirect_header('templates.php?op=list', 2, \_AM_WGTIMELINES_FORM_OK);
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $templatesObj->getHtmlErrors());
        $form = $templatesObj->getFormTemplates();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());

    break;
    case 'save-master':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('templates.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($tplId)) {
            $templatesObj = $templatesHandler->get($tplId);
        }
        $options = [];
        // Set Vars
        $templatesObj->setVar('tpl_name', Request::getString('tpl_name'));
        $templatesObj->setVar('tpl_desc', Request::getString('tpl_desc'));
        $templatesObj->setVar('tpl_file', Request::getString('tpl_file'));

        for ($i = 1; $i <= Request::getInt('counter'); $i++) {
            if (!Request::getString('name_'.$i) == '') {
                $options[] = [
                    'name' => Request::getString('name_' . $i),
                    'valid' => Request::getString('valid_' . $i),
                    'value' => Request::getString('value_' . $i),
                    'type' => Request::getString('type_' . $i)
                ];
                $templatesObj->setVar(Request::getString('name_' . $i), Request::getString('value_' . $i));
            }
        }
        $templatesObj->setVar('tpl_options', serialize($options));
        $templatesObj->setVar('tpl_version', Request::getString('tpl_version'));
        $templatesObj->setVar('tpl_author', Request::getString('tpl_author'));
        $tplDate_create = date_create_from_format(_SHORTDATESTRING, Request::getString('tpl_date_create'));
        $templatesObj->setVar('tpl_date_create', $tplDate_create->getTimestamp());

        // Insert Data
        if ($templatesHandler->insert($templatesObj)) {
            if (Request::getInt('addopt') > 0) {
                \redirect_header('templates.php?op=edit-master&tpl_id=' . $tplId, 2, \_AM_WGTIMELINES_FORM_OK);
            } else {
                \redirect_header('templates.php?op=edit&tpl_id=' . $tplId, 2, \_AM_WGTIMELINES_FORM_OK);
            }
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $templatesObj->getHtmlErrors());
        $form = $templatesObj->getFormTemplates();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());

    break;
    case 'edit':
    case 'edit-master':
        $templateMain = 'wgtimelines_admin_templates.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->renderNavigation('templates.php'));
        $adminObject->addItemButton(\_AM_WGTIMELINES_TEMPLATES_LIST, 'templates.php', 'list');
        if ($op === 'edit-master') {
            $adminObject->addItemButton(\_AM_WGTIMELINES_TEMPLATE_ADD, 'templates.php?op=new');
        }
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->renderButton());
        // Get Form
        $templatesObj = $templatesHandler->get($tplId);
        if ($op === 'edit-master') {
            $form = $templatesObj->getFormTemplatesMaster();
        } else {
            $form = $templatesObj->getFormTemplates();
        }
        $GLOBALS['xoopsTpl']->assign('form', $form->render());

    break;
    case 'update':
    case 'reset':
        $templatesObj = $templatesHandler->get($tplId);
        if (1 == Request::getString('ok')) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('templates.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            $tplsetdefaultObj = $tplsetsdefaultHandler->get($tplId);
            // Set Vars
            $templatesObj->setVar('tpl_name', $tplsetdefaultObj->getVar('tpl_name'));
            $templatesObj->setVar('tpl_desc', $tplsetdefaultObj->getVar('tpl_desc', 'n'));
            $templatesObj->setVar('tpl_file', $tplsetdefaultObj->getVar('tpl_file'));
            $templatesObj->setVar('tpl_options', $tplsetdefaultObj->getVar('tpl_options', 'n'));
            $templatesObj->setVar('tpl_weight', $tplsetdefaultObj->getVar('tpl_weight'));
            $templatesObj->setVar('tpl_version', $tplsetdefaultObj->getVar('tpl_version'));
            $templatesObj->setVar('tpl_author', $tplsetdefaultObj->getVar('tpl_author'));
            $templatesObj->setVar('tpl_date_create', $tplsetdefaultObj->getVar('tpl_date_create'));
            // Insert Data
            if ($templatesHandler->insert($templatesObj)) {
                \redirect_header('templates.php?op=list', 2, \_AM_WGTIMELINES_FORM_OK);
            }
            $GLOBALS['xoopsTpl']->assign('error', $templatesObj->getHtmlErrors());
        } else {
            $info = ($op === 'update') ? \_AM_WGTIMELINES_TEMPLATE_SURE_UPDATE : \_AM_WGTIMELINES_TEMPLATE_SURE_RESET;
            xoops_confirm(['ok' => 1, 'tpl_id' => $tplId, 'op' => $op], $_SERVER['REQUEST_URI'], $info);
        }

    break;
}
include_once __DIR__ . '/footer.php';
