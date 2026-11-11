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
 * feedback plugin for xoops modules
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        general
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         XOOPS - Website:<https://xoops.org>
 */

$moduleDirName      = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

\define('_CO_WGTIMELINES_FB_FORM_TITLE', 'Ein Feedback senden');
\define('_CO_WGTIMELINES_FB_RECIPIENT', 'Empfänger');
\define('_CO_WGTIMELINES_FB_NAME', 'Name');
\define('_CO_WGTIMELINES_FB_NAME_PLACEHOLER', 'Bitte ergänzen Sie Ihren Namen');
\define('_CO_WGTIMELINES_FB_SITE', 'Website');
\define('_CO_WGTIMELINES_FB_SITE_PLACEHOLER', 'Bitte ergänzen Sie Ihre Website');
\define('_CO_WGTIMELINES_FB_MAIL', 'E-Mail');
\define('_CO_WGTIMELINES_FB_MAIL_PLACEHOLER', 'Bitte ergänzen Sie Ihre E-Mail');
\define('_CO_WGTIMELINES_FB_TYPE', 'Art des Feedbacks');
\define('_CO_WGTIMELINES_FB_TYPE_SUGGESTION', 'Vorschläge');
\define('_CO_WGTIMELINES_FB_TYPE_BUGS', 'Fehler & Bugs');
\define('_CO_WGTIMELINES_FB_TYPE_TESTIMONIAL', 'Empfehlungen');
\define('_CO_WGTIMELINES_FB_TYPE_FEATURES', 'Features');
\define('_CO_WGTIMELINES_FB_TYPE_OTHERS', 'Sonstiges');
\define('_CO_WGTIMELINES_FB_TYPE_CONTENT', 'Feedback Inhalt');
\define('_CO_WGTIMELINES_FB_SEND_FOR', 'Feedback für Modul ');
\define('_CO_WGTIMELINES_FB_SEND_SUCCESS', 'Feedback erfolgreich gesendet');
\define('_CO_WGTIMELINES_FB_SEND_ERROR', 'Beim Senden des Feedbacks ist leider ein Fehler aufgetreten!');
