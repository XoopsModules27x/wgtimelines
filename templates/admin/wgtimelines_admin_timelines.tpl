<!-- Header -->
<{include file='db:wgtimelines_admin_header.tpl'}>
<{if $timelines_list|default:false}>
<table class='outer' id="sortable-timelines">
    <thead>
        <tr class="head">
            <th class="center">&nbsp;</th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TIMELINE_NAME}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TIMELINE_DESC}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TIMELINE_IMAGE}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TIMELINE_TEMPLATE}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TIMELINE_SORTBY}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TIMELINE_LIMIT}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TIMELINE_DATETIME}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TIMELINE_MAGNIFIC}></th>
            <th class="center"><{$smarty.const._CO_WGTIMELINES_TIMELINE_EXPIRED}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_TIMELINE_SHOWREADS}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_ONLINE}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_SUBMITTER}></th>
            <th class="center"><{$smarty.const._AM_WGTIMELINES_DATE_CREATE}></th>
            <th class="center width5"><{$smarty.const._AM_WGTIMELINES_FORM_ACTION}></th>
        </tr>
    </thead>
    <{if $timelines_count|default:false}>
    <tbody id="timelines-list"><{foreach item=timeline from=$timelines_list|default:null}>
        <tr class="even" id="torder_<{$timeline.id}>" >
            <td class="center"><i class="icon-sortable fa-solid fa-up-down-left-right"></i></td>
            <td class="center"><{$timeline.name}></td>
            <td class="left"><{$timeline.desc_admin}></td>
            <td class="center"><img src="<{$wgtimelines_upload_url}>/images/timelines/<{$timeline.image}>" alt="<{$timeline.name}>" style="max-width:50px;" /></td>
            <td class="center"><{$timeline.template}></td>
            <td class="center"><{$timeline.sortby_text}></td>
            <td class="center"><{$timeline.limit}></td>
            <td class="center"><{$timeline.datetime_text}></td>
            <td class="center">
                <{if $timeline.magnific|default:0 == 1}>
                    <i class="icon-sortable fa-regular fa-circle-check"></i>
                <{else}>
                    <i class="icon-sortable fa-regular fa-circle-xmark"></i>
                <{/if}>
            </td>
            <td class="center"><{$timeline.expired_text}></td>
            <td class="center">
                <{if $timeline.showreads|default:0 == 1}>
                    <i class="icon-sortable fa-regular fa-circle-check"></i>
                <{else}>
                    <i class="icon-sortable fa-regular fa-circle-xmark"></i>
                <{/if}>
            </td>
            <td class="center">
                <form action='timelines.php' method='post' style='display:inline;'>
                    <{$wgtimelines_form_token}>
                    <input type='hidden' name='op' value='set_onoff'>
                    <input type='hidden' name='tl_id' value='<{$timeline.id}>'>
                    <input type='hidden' name='start' value='<{$start}>'>
                    <input type='hidden' name='limit' value='<{$limit}>'>
                    <span class='xo-buttons'>
                        <{if $timeline.online == 1}>
                            <button class='' aria-label="<{$smarty.const._AM_WGTIMELINES_ITEM_ONLINE}>" title="<{$smarty.const._AM_WGTIMELINES_ITEM_ONLINE}>">
                                <i class='fa fa-eye'></i>
                            </button>
                        <{else}>
                            <button class='' aria-label="<{$smarty.const._AM_WGTIMELINES_ITEM_OFFLINE}>" title="<{$smarty.const._AM_WGTIMELINES_ITEM_OFFLINE}>">
                                <i class='fa fa-eye-slash'></i>
                            </button>
                        <{/if}>
                    </span>
                </form>
            </td>
            <td class="center"><{$timeline.submitter}></td>
            <td class="center"><{$timeline.date_create}></td>
            <td class="center width5 xo-buttons">
                <a href="timelines.php?op=edit&amp;tl_id=<{$timeline.id}>" title="<{$smarty.const._EDIT}>"><i class='fa fa-edit'></i></a>
                <a href="image_editor.php?op=edit_timeline&amp;tl_id=<{$timeline.id}>" title="<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR}>"><i class='fa fa-image'></i></a>
                <a href="timelines.php?op=delete&amp;tl_id=<{$timeline.id}>" title="<{$smarty.const._DELETE}>"><i class='fa fa-trash'></i></a>
            </td>
        </tr>
    <{/foreach}>
    </tbody>
    <{/if}>
</table>
<div class="clear">&nbsp;</div>
<{if $pagenav|default:false}>
    <div class="xo-pagenav floatright"><{$pagenav}></div>
    <div class="clear spacer"></div>
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


<input type="hidden" id="xoopsSortToken" value="<{$wgtimelines_btn_token|default:''|escape}>">

<script>
    $(document).ready(function () {

        function saveItemOrder(element) {
            var list = element.sortable("serialize");
            var token = $("#xoopsSortToken").val();

            $.post("timelines.php?op=order", list + "&XOOPS_TOKEN_REQUEST=" + encodeURIComponent(token))
                .fail(function (xhr) {
                    console.error("Error when sorting:", xhr.responseText);
                });
        }

        $("#sortable-timelines > tbody").sortable({
            items: "tr:has(td)",
            opacity: 0.6,
            cursor: "move",

            update: function (event, ui) {
                saveItemOrder($(this));
            },

            receive: function (event, ui) {
                saveItemOrder($(this));
            }

        }).disableSelection();

    });
</script>
