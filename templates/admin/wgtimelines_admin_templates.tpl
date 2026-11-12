<!-- Header -->
<{include file='db:wgtimelines_admin_header.tpl'}>
<{if $templates_list|default:false}>
<table class='outer'>
    <thead>
        <tr class="head">
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TEMPLATE_NAME}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TEMPLATE_DESC}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TEMPLATE_FILE}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TEMPLATE_OPTIONS}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TEMPLATE_VERSION}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TEMPLATE_AUTHOR}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_DATE_CREATE}></th>
            <th class="center width-action"><{$smarty.const._AM_WGTIMELINES_FORM_ACTION}></th>
        </tr>
    </thead>
<{if $templates_count|default:false}>
    <tbody><{foreach item=template from=$templates_list|default:null}>
        <tr class="<{cycle values='odd, even'}>">
            <td class="center">
                <{$template.name}>
                <{if $template.newtemplate|default:false}>
                    <br><div class="info-box"><i class="fa-regular fa-square-plus"></i> <{$smarty.const._AM_WGTIMELINES_TEMPLATE_NEWTEMPLATE}></div>
                <{/if}>
                <{if $template.notsupported|default:false}>
                    <br><div class="info-box"><i class="fa-regular fa-circle-xmark"></i> <{$smarty.const._AM_WGTIMELINES_TEMPLATE_NOTSUPPORTED}></div>
                <{/if}>
                <{if $template.newversion|default:false}>
                    <br><div class="info-box"><i class="fa-solid fa-clock-rotate-left"></i> <{$smarty.const._AM_WGTIMELINES_TEMPLATE_NEWVERSION}></div>
                <{/if}>
            </td>
            <td class="center"><{$template.desc}></td>
            <td class="center"><{$template.file}></td>
            <td class="left">
                <{foreach item=option from=$template.options|default:null}>
                    <{if $option.valid|default:0 > 0}>
                        <p style="padding:3px;">
                        <{$option.title}>: <{$option.value}>
                        <{if $option.type|default:'' == 'color'}>
                            &nbsp;<span style="border:1px solid #000;background-color:<{$option.value}>;border-radius:5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <{/if}>
                        </p>
                    <{/if}>
                <{/foreach}>
            </td>
            <td class="center"><{$template.version}></td>
            <td class="center"><{$template.author}></td>
            <td class="center"><{$template.date_create_formatted}></td>
            <td class="center width-action xo-buttons">
                <a href="templates.php?op=edit&amp;tpl_id=<{$template.id}>" title="<{$smarty.const._EDIT}>"><i class='fa fa-edit'></i></a>
                <{if $template.notsupported|default:false == false}>
                <a href="templates.php?op=reset&amp;tpl_id=<{$template.id}>" title="<{$smarty.const._AM_WGTIMELINES_TEMPLATE_RESETVERSION}>"><i class="fa-solid fa-arrows-spin"></i></a>
                <{/if}>
                <{if $template.newversion|default:false}>
                    <a href="templates.php?op=update&amp;tpl_id=<{$template.id}>" title="<{$smarty.const._AM_WGTIMELINES_TEMPLATE_NEWVERSION}>"><i class="fa-solid fa-clock-rotate-left"></i></a>
                <{/if}>
            </td>
        </tr>

<{/foreach}>
</tbody>

<{/if}>

</table>
<div class="clear">&nbsp;</div>
<{if $pagenav|default:false}>
    <div class="xo-pagenav floatright"><{$pagenav}></div><div class="clear spacer"></div>
<{/if}>

<{/if}>
<{if $form|default:false}>
    <{$form}>
<{/if}>
<{if $error|default:false}>
    <div class="errorMsg"><strong><{$error}></strong></div>
<{/if}>
<br></br />
<!-- Footer --><{include file='db:wgtimelines_admin_footer.tpl'}>
