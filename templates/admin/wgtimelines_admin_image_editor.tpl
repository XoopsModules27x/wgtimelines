<{include file='db:wgtimelines_admin_header.tpl'}>

<style>
    /* ===== Standalone styles (no Bootstrap needed) ===== */
    .ie-scope, .ie-scope * { box-sizing: border-box; }
    .ie-scope { --ie-border:#ccc; --ie-accent:#337ab7; --ie-bg:#fff; --ie-muted:#f5f5f5; }
    .ie-scope .center { text-align:center; }
    .ie-scope .clear  { clear:both; }
    .ie-scope .hidden, .ie-scope .ie-hidden { display:none !important; }
    .ie-scope .sr-only { position:absolute; width:1px; height:1px; margin:-1px; padding:0; overflow:hidden; clip:rect(0,0,0,0); border:0; }
    #currentImg, #ImageSelected, #gridImg, .imageeditor-selimages img { max-width:100%; height:auto; }

    /* tabs */
    .ie-tabs { list-style:none; margin:0 0 15px; padding:0; display:flex; flex-wrap:wrap; border-bottom:1px solid var(--ie-border); }
    .ie-tabs li { margin:0 0 -1px; }
    .ie-tabs a { display:block; padding:8px 14px; border:1px solid transparent; border-radius:4px 4px 0 0; text-decoration:none; color:var(--ie-accent); }
    .ie-tabs a:hover { background:var(--ie-muted); }
    .ie-tabs li.active a { background:var(--ie-bg); border-color:var(--ie-border) var(--ie-border) var(--ie-bg); color:#333; cursor:default; }
    .ie-pane { display:none; }
    .ie-pane.active { display:block; }

    /* layout helpers */
    .ie-row { display:flex; flex-wrap:wrap; gap:15px; margin-bottom:15px; }
    .ie-col-half { flex:1 1 300px; min-width:0; }
    .ie-col-third { flex:1 1 200px; min-width:0; }
    .ie-col-twothirds { flex:2 1 300px; min-width:0; }
    .ie-col-full { flex:1 1 100%; }
    .ie-thumbs { display:grid; grid-template-columns:repeat(auto-fill, minmax(110px, 1fr)); gap:8px; }
    .ie-thumbs h4 { grid-column:1 / -1; margin:10px 0 0; }
    .ie-grid-src { display:flex; align-items:center; gap:10px; margin-bottom:6px; }
    .ie-grid-src img { max-width:75px; }
    .ie-radios label { margin-right:15px; cursor:pointer; }

    /* buttons */
    .ie-btn, .ie-scope .btn { display:inline-block; padding:6px 12px; margin:2px; font-size:14px; line-height:1.4; text-align:center; text-decoration:none; cursor:pointer;
        border:1px solid var(--ie-border); border-radius:4px; background:var(--ie-muted); color:#333; vertical-align:middle; }
    .ie-btn:hover, .ie-scope .btn:hover { background:#e6e6e6; }
    .ie-scope .btn.active, .ie-scope label.btn.active { background:var(--ie-accent); border-color:var(--ie-accent); color:#fff; }
    .ie-scope .btn.disabled, .ie-scope .btn[disabled], .ie-scope .btn:disabled { opacity:.5; pointer-events:none; cursor:not-allowed; }
    .ie-btn-group { display:inline-flex; flex-wrap:nowrap; margin:3px 4px; }
    .ie-btn-group .btn { margin:0 -1px 0 0; border-radius:0; }
    .ie-btn-group .btn:first-child { border-radius:4px 0 0 4px; }
    .ie-btn-group .btn:last-child  { border-radius:0 4px 4px 0; margin-right:0; }
    .ie-btn-group .btn:only-child  { border-radius:4px; }
    .ie-btn-block-group { width:100%; text-align:center; margin-top:10px; }

    /* images */
    .imageeditor-img { border:2px solid transparent; border-radius:3px; }
    .imageeditor-modal-selected { border-color:var(--ie-accent) !important; box-shadow:0 0 4px var(--ie-accent); }
    .imageeditor-selimages input[type=image] { width:100%; padding:3px; cursor:pointer; }
    .img-container { max-width:100%; margin-bottom:10px; }
    .img-container img { max-width:100%; }

    /* modal */
    .ie-modal { display:none; position:fixed; top:0; right:0; bottom:0; left:0; z-index:10050; background:rgba(0,0,0,.5); overflow:auto; }
    .ie-modal.ie-open { display:block; }
    .ie-modal-dialog { position:relative; margin:30px auto; width:calc(100% - 30px); max-width:900px; }
    .ie-modal-content { background:var(--ie-bg); color:#333; border-radius:6px; box-shadow:0 5px 20px rgba(0,0,0,.4); }
    .ie-modal-header, .ie-modal-footer { padding:12px 15px; display:flex; align-items:center; justify-content:space-between; }
    .ie-modal-header { border-bottom:1px solid var(--ie-border); }
    .ie-modal-footer { border-top:1px solid var(--ie-border); justify-content:flex-end; }
    .ie-modal-body { padding:15px; }
    .ie-modal-title { margin:0; font-size:18px; }
    .ie-modal-close { background:none; border:0; font-size:26px; line-height:1; cursor:pointer; color:#666; }
    .ie-modal-body input[type=image] { border:2px solid transparent; }
</style>

<h3><{$image_info|default:''}></h3>
<div id='imghandler' class='ie-scope'>
    <ul class='ie-tabs' id='ie-tabs'>
        <li class='active'><a id='navtab_main'   href='#1'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CURRENT}></a></li>
        <li><a id='navtab_exist'  href='#2'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_USE_EXISTING}></a></li>
        <li><a id='navtab_grid'   href='#3'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID}></a></li>
        <li><a id='navtab_crop'   href='#4'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP}></a></li>
        <li><a id='navtab_upload' href='#5'><{$smarty.const._AM_WGTIMELINES_FORM_UPLOAD_IMG}></a></li>
    </ul>

    <div class='ie-tab-content'>
        <!-- *************** Basic Tab ***************-->
        <div class='ie-pane active center' id='1'>
            <{if $no_blank|default:false}>
        <img id='currentImg' class='imageeditor-img center' src='<{$imgCurrent.src}>' alt='<{$imgCurrent.img_name}>'>
            <p><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CURRENT2}>: <{$image_path}><br>
                <{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_RESXY}>: <{$albimage_width}> / <{$albimage_height}></p>
            <{else}>
            <p class='imageeditor-no_image'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_NOIMAGE}></p>
            <{/if}>
            <input type='button' class='btn <{$btn_style}>' value='<{$smarty.const._CANCEL}>' onclick='history.go(-1);return true;'>
        </div>

        <!-- *************** Tab for select image of albums ***************-->
        <div class='ie-pane' id='2'>
            <div class='ie-row'>
                <div class='ie-col-half'>
                    <div class='ie-thumbs'>
                        <{foreach item=image from=$images|default:null name=fe_image}>
                        <{if $image.group|default:false}><h4 class='ie-modal-title'><{$image.group}></h4><{/if}>
                        <div class='imageeditor-selimages'>
                            <input id='<{$image.name}>_image' class='imgSelect1 imageeditor-img <{if $image.selected|default:false}>imageeditor-modal-selected<{/if}>' type='image' src='<{$image.src}>' alt='<{$image.title}>' value='<{$image.name}>'>
                        </div>
                        <{/foreach}>
                    </div>
                </div>
                <div class='ie-col-half'>
                    <img id='ImageSelected' class='imageeditor-img' src='<{$imgCurrent.src}>' alt='<{$imgCurrent.img_name}>'>
                </div>
            </div>
            <div class='center'>
                <form name='form' id='form_selectimage' action='image_editor.php' method='post' enctype='multipart/form-data'>
                    <input type='hidden' name='<{$imageOrigin}>' id='<{$imageOrigin}>' value='<{$imageId}>'>
                    <input type='hidden' name='image_id' id='image_id' value='<{$imgCurrent.img_name}>'>
                    <input type='hidden' name='op' id='op' value='saveImageSelected'>
                    <input type='submit' class='btn <{$btn_style}> disabled' name='btnApplySelected' id='btnApplySelected' value='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_APPLY}>'>
                    <input type='button' class='btn <{$btn_style}>' value='<{$smarty.const._CANCEL}>' onclick='history.go(-1);return true;'>
                    <{$wgtimelines_form_token|default:false}>
                </form>
            </div>
        </div>

        <!-- *************** Tab for image grid ***************-->
        <div class='ie-pane' id='3'>
            <div class='ie-row ie-radios'>
                <div class='ie-col-full'>
                    <label><input type='radio' name='gridtype' id='alb_imgcat1' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID4}>' value='1' checked> <{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID4}></label>
                    <label><input type='radio' name='gridtype' id='alb_imgcat2' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID6}>' value='2'> <{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID6}></label>
                </div>
            </div>
            <div class='ie-row'>
                <div class='ie-col-third'>
                    <div class='ie-grid-src'>
                        <button id='btnGridAdd1' type='button' class='btn <{$btn_style}>' data-ie-open='myModalImagePicker1'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID_SRC1}></button>
                        <img src='<{$wgtimelines_upload_image_url}>blank.gif' id='imageGrid1' alt='imageGrid1'>
                    </div>
                    <div class='ie-grid-src'>
                        <button id='btnGridAdd2' type='button' class='btn <{$btn_style}>' data-ie-open='myModalImagePicker2'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID_SRC2}></button>
                        <img src='<{$wgtimelines_upload_image_url}>blank.gif' id='imageGrid2' alt='imageGrid2'>
                    </div>
                    <div class='ie-grid-src'>
                        <button id='btnGridAdd3' type='button' class='btn <{$btn_style}>' data-ie-open='myModalImagePicker3'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID_SRC3}></button>
                        <img src='<{$wgtimelines_upload_image_url}>blank.gif' id='imageGrid3' alt='imageGrid3'>
                    </div>
                    <div class='ie-grid-src'>
                        <button id='btnGridAdd4' type='button' class='btn <{$btn_style}>' data-ie-open='myModalImagePicker4'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID_SRC4}></button>
                        <img src='<{$wgtimelines_upload_image_url}>blank.gif' id='imageGrid4' alt='imageGrid4'>
                    </div>
                    <div class='ie-grid-src'>
                        <button id='btnGridAdd5' type='button' class='btn <{$btn_style}>' data-ie-open='myModalImagePicker5' disabled='disabled'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID_SRC5}></button>
                        <img src='<{$wgtimelines_upload_image_url}>blank.gif' id='imageGrid5' alt='imageGrid5'>
                    </div>
                    <div class='ie-grid-src'>
                        <button id='btnGridAdd6' type='button' class='btn <{$btn_style}>' data-ie-open='myModalImagePicker6' disabled='disabled'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID_SRC6}></button>
                        <img src='<{$wgtimelines_upload_image_url}>blank.gif' id='imageGrid6' alt='imageGrid6'>
                    </div>
                </div>
                <div class='ie-col-twothirds'>
                    <img id='gridImg' src='<{$wgtimelines_upload_image_url}>blank.gif' alt='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID}>'>
                </div>
            </div>
            <div class='center'>
                <button id='btnCreateGrid4' type='button' class='btn <{$btn_style}>' data-token='<{$wgtimelines_btn_token|default:''}>'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CREATE}></button>
                <button id='btnCreateGrid6' type='button' class='btn <{$btn_style}> hidden' data-token='<{$wgtimelines_btn_token|default:''}>'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CREATE}></button>
                <form name='form' id='form_imagegrid' action='image_editor.php' method='post' enctype='multipart/form-data'>
                    <input type='hidden' name='op' value='saveGrid'>
                    <input type='hidden' name='gridImgFinal' id='gridImgFinal' value=''>
                    <input type='hidden' name='<{$imageOrigin}>' value='<{$imageId}>'>
                    <input type='submit' class='btn <{$btn_style}> disabled' name='btnApplyGrid' id='btnApplyGrid' value='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_APPLY}>'>
                    <input type='button' class='btn <{$btn_style}>' value='<{$smarty.const._CANCEL}>' onclick='history.go(-1);return true;'>
                    <{$wgtimelines_form_token|default:false}>
                </form>
            </div>
        </div>

        <!-- ***************Tab for crop image ***************-->
        <div class='ie-pane center' id='4'>
            <input type='hidden' id='imageIdCrop' name='imageIdCrop' value='<{$imageId}>'>
            <input type='hidden' id='imageOriginCrop' name='imageOriginCrop' value='<{$imageOrigin}>'>
            <input type='hidden' id='tokenCrop' name='XOOPS_TOKEN_REQUEST' value='<{$wgtimelines_btn_token|default:''}>'>
            <div class='container-crop'>
                <div class='img-container'>
                    <img id='cropImg' src='<{$imgCurrent.src}>' alt='<{$imgCurrent.img_name}>'>
                </div>
            </div>
            <div id='actions'>
                <div class='docs-toggles'>
                    <div class='ie-btn-group' id='ie-aspect-group'>
                        <label class='btn imageeditor-btn-crop <{$btn_style}>' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_ASPECTRATIO}>: 16 / 9'>
                            <input type='radio' class='sr-only' id='aspectRatio1' name='aspectRatio' value='1.7777777777777777'>16:9
                        </label>
                        <label class='btn imageeditor-btn-crop <{$btn_style}> active' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_ASPECTRATIO}>: 4 / 3'>
                            <input type='radio' class='sr-only' id='aspectRatio2' name='aspectRatio' value='1.3333333333333333' checked>4:3
                        </label>
                        <label class='btn imageeditor-btn-crop <{$btn_style}>' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_ASPECTRATIO}>: 1 / 1'>
                            <input type='radio' class='sr-only' id='aspectRatio3' name='aspectRatio' value='1'>1:1
                        </label>
                        <label class='btn imageeditor-btn-crop <{$btn_style}>' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_ASPECTRATIO}>: 2 / 3'>
                            <input type='radio' class='sr-only' id='aspectRatio4' name='aspectRatio' value='0.6666666666666666'>2:3
                        </label>
                        <label class='btn imageeditor-btn-crop <{$btn_style}>' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_ASPECTRATIO}>: NaN'>
                            <input type='radio' class='sr-only' id='aspectRatio5' name='aspectRatio' value='NaN'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_ASPECTRATIO_FREE}>
                        </label>
                    </div>
                </div><!-- /.docs-toggles -->

                <div class='docs-buttons'>
                    <div class='ie-btn-group'>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='setDragMode' data-option='move' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_MOVE}>'><span class='fa fa-arrows'></span></button>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='setDragMode' data-option='crop' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP}>'><span class='fa fa-crop'></span></button>
                    </div>

                    <div class='ie-btn-group'>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='zoom' data-option='0.1' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_ZOOMIN}>'><span class='fa fa-search-plus'></span></button>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='zoom' data-option='-0.1' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_ZOOMOUT}>'><span class='fa fa-search-minus'></span></button>
                    </div>

                    <div class='ie-btn-group'>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='move' data-option='-10' data-second-option='0' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_MOVE_LEFT}>'><span class='fa fa-arrow-left'></span></button>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='move' data-option='10' data-second-option='0' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_MOVE_RIGHT}>'><span class='fa fa-arrow-right'></span></button>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='move' data-option='0' data-second-option='-10' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_MOVE_UP}>'><span class='fa fa-arrow-up'></span></button>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='move' data-option='0' data-second-option='10' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_MOVE_DOWN}>'><span class='fa fa-arrow-down'></span></button>
                    </div>

                    <div class='ie-btn-group'>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='rotate' data-option='-45' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_ROTATE_LEFT}>'><span class='fa fa-rotate-left'></span></button>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='rotate' data-option='45' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_ROTATE_RIGHT}>'><span class='fa fa-rotate-right'></span></button>
                    </div>

                    <div class='ie-btn-group'>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='scaleX' data-option='-1' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_FLIP_HORIZONTAL}>'><span class='fa fa-arrows-h'></span></button>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='scaleY' data-option='-1' title='<{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CROP_FLIP_VERTICAL}>'><span class='fa fa-arrows-v'></span></button>
                    </div>

                    <div class='ie-btn-group'>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='reset' title='<{$smarty.const._RESET}>'><span class='fa fa-refresh'></span></button>
                    </div>
                    <div class='ie-btn-group'>
                        <label class='btn <{$btn_style}> btn-upload' for='inputImage' title='<{$smarty.const._UPLOAD}>'>
                            <input type='file' class='sr-only' id='inputImage' name='file' accept='image/*'>
                            <span class='fa fa-upload'></span>
                        </label>
                    </div>

                    <div class='ie-btn-block-group btn-group-crop'>
                        <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='getCroppedCanvas' data-option='{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096, &quot;save&quot;: 0 }'><{$smarty.const._PREVIEW}></button>
                        <button id='btnCropCreate' type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-method='getCroppedCanvas' data-option='{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096, &quot;save&quot;: 1 }' data-token='<{$wgtimelines_btn_token|default:''}>'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_CREATE}></button>
                        <form method="post" action="image_editor.php" id="formCropApply">
                            <input type="hidden" name="op" value="saveCrop">
                            <input type="hidden" name="<{$imageOrigin}>" value="<{$imageId}>">
                            <input type="hidden" name="target" value="<{$croptarget|default:''}>">
                            <input type="hidden" name="start" value="<{$start}>">
                            <input type="hidden" name="limit" value="<{$limit}>">
                            <{$wgtimelines_form_token}>
                            <button type="submit" id="btnCropApply" class="btn <{$btn_style}> disabled">
                                <{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_APPLY}>
                            </button>
                        </form>

                        <button type='button' class='btn btn-crop <{$btn_style}>' onclick='history.go(-1);return true;'><{$smarty.const._CANCEL}></button>
                    </div>

                    <!-- Show the cropped image in modal -->
                    <div class='ie-modal docs-cropped' id='getCroppedCanvasModal' role='dialog' aria-hidden='true' aria-labelledby='getCroppedCanvasTitle' tabindex='-1'>
                        <div class='ie-modal-dialog'>
                            <div class='ie-modal-content'>
                                <div class='ie-modal-header'>
                                    <h5 class='ie-modal-title' id='getCroppedCanvasTitle'><{$smarty.const._PREVIEW}></h5>
                                    <button type='button' class='ie-modal-close' data-ie-close aria-label='<{$smarty.const._CLOSE}>'>&times;</button>
                                </div>
                                <div class='ie-modal-body modal-body'></div>
                                <div class='ie-modal-footer'>
                                    <button type='button' class='btn imageeditor-btn-crop <{$btn_style}>' data-ie-close><{$smarty.const._CLOSE}></button>
                                    <a class='btn <{$btn_style}> hidden' id='download' href='javascript:void(0);' download='cropped.jpg'>Download</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal -->
                </div><!-- /.docs-buttons -->
            </div>
        </div>

        <!-- ***************Tab for upload image ***************-->
        <div class='ie-pane center' id='5'>
            <{$form_uploadimage}>
        </div>
    </div>
</div>

<div class='clear'>&nbsp;</div>

<!-- Create Modals -->
<div class='ie-scope'>
    <{foreach item=m from=$nbModals|default:null}>
    <div class='ie-modal' id='myModalImagePicker<{$m}>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel<{$m}>'>
        <div class='ie-modal-dialog' role='document'>
            <div class='ie-modal-content'>
                <div class='ie-modal-header'>
                    <h4 class='ie-modal-title' id='myModalLabel<{$m}>'><{$smarty.const._AM_WGTIMELINES_IMG_EDITOR_GRID}></h4>
                    <button type='button' class='ie-modal-close' data-ie-close aria-label='Close'>&times;</button>
                </div>
                <div class='ie-modal-body'>
                    <{foreach item=image from=$images|default:null}>
                    <{if $image.group|default:false}><h4 class='ie-modal-title'><{$image.group}></h4><{/if}>
                <input class='imgGrid<{$m}>' type='image' src='<{$image.src}>' alt='<{$image.name}>'
                       style='padding:3px;max-height:150px;max-width:200px' value='<{$image.name}>' onclick='return selectGridImage(this, <{$m}>)'>
                    <{/foreach}>
                </div>
            </div>
        </div>
    </div>
    <{/foreach}>
</div>
<!-- end of modals -->

<script type='text/javascript'>
    (function () {
        'use strict';

        var $id = function (id) { return document.getElementById(id); };
        var $$  = function (sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); };

        /* ---------- Tabs ---------- */
        $$('#ie-tabs a').forEach(function (a) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                $$('#ie-tabs li').forEach(function (li) { li.classList.remove('active'); });
                $$('.ie-tab-content > .ie-pane').forEach(function (p) { p.classList.remove('active'); });
                a.parentNode.classList.add('active');
                var pane = $id(a.getAttribute('href').substring(1));
                if (pane) { pane.classList.add('active'); }
                // legacy Bootstrap tab events, in case other scripts listen for them
                if (window.jQuery) {
                    window.jQuery(a).trigger('show.bs.tab').trigger('shown.bs.tab');
                }
                window.dispatchEvent(new Event('resize')); // lets cropper recalc size after its tab becomes visible
            });
        });

        /* ---------- Modals ---------- */
        function toggleModal(el, show) {
            if (!el) { return; }
            el.classList.toggle('ie-open', show);
            el.setAttribute('aria-hidden', show ? 'false' : 'true');
            document.body.style.overflow = $$('.ie-modal.ie-open').length ? 'hidden' : '';
        }
        window.ieToggleModal = toggleModal;

        // Minimal $.fn.modal shim so existing scripts calling $('#...').modal() / .modal('hide') keep working
        if (window.jQuery) {
            ['tooltip', 'popover', 'collapse', 'dropdown'].forEach(function (n) {
                if (!window.jQuery.fn[n]) { window.jQuery.fn[n] = function () { return this; }; }
            });
        }
        if (window.jQuery && !window.jQuery.fn.modal) {
            window.jQuery.fn.modal = function (action) {
                return this.each(function () { toggleModal(this, action !== 'hide'); });
            };
        }

        document.addEventListener('click', function (e) {
            var opener = e.target.closest ? e.target.closest('[data-ie-open]') : null;
            if (opener) { toggleModal($id(opener.getAttribute('data-ie-open')), true); return; }
            var closer = e.target.closest ? e.target.closest('[data-ie-close]') : null;
            if (closer) { toggleModal(closer.closest('.ie-modal'), false); return; }
            if (e.target.classList && e.target.classList.contains('ie-modal')) { toggleModal(e.target, false); }
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { $$('.ie-modal.ie-open').forEach(function (m) { toggleModal(m, false); }); }
        });

        /* ---------- Crop tab ---------- */
        $$('#ie-aspect-group input[type=radio]').forEach(function (radio) {
            radio.addEventListener('change', function () {
                $$('#ie-aspect-group label').forEach(function (l) { l.classList.remove('active'); });
                radio.parentNode.classList.add('active');
            });
        });
        var btnCropCreate = $id('btnCropCreate');
        if (btnCropCreate) {
            btnCropCreate.addEventListener('click', function () {
                $id('btnCropApply').classList.remove('disabled');
            });
        }

        /* ---------- Select existing image tab ---------- */
        $$('.imgSelect1').forEach(function (img) {
            img.addEventListener('click', function (e) {
                e.preventDefault();
                $id('image_id').value = img.id;
                $id('ImageSelected').src = img.src;
                $$('.imgSelect1').forEach(function (i) { i.classList.remove('imageeditor-modal-selected'); });
                img.classList.add('imageeditor-modal-selected');
                $id('btnApplySelected').classList.remove('disabled');
            });
        });
        // block submit while "disabled"
        [['form_selectimage', 'btnApplySelected'], ['form_imagegrid', 'btnApplyGrid']].forEach(function (p) {
            var f = $id(p[0]);
            if (f) {
                f.addEventListener('submit', function (e) {
                    if ($id(p[1]).classList.contains('disabled')) { e.preventDefault(); }
                });
            }
        });

        /* ---------- Grid tab ---------- */
        $$('input[name=gridtype]').forEach(function (r) {
            r.addEventListener('change', function () { changeGridSetting(r); });
        });

        function changeGridSetting(element) {
            $id('btnGridAdd5').setAttribute('disabled', 'disabled');
            $id('btnGridAdd6').setAttribute('disabled', 'disabled');
            $id('btnCreateGrid4').classList.add('hidden');
            $id('btnCreateGrid6').classList.add('hidden');
            if (String(element.value) === '1') {
                $id('btnCreateGrid4').classList.remove('hidden');
            } else {
                $id('btnGridAdd5').removeAttribute('disabled');
                $id('btnGridAdd6').removeAttribute('disabled');
                $id('btnCreateGrid6').classList.remove('hidden');
            }
        }

        window.selectGridImage = function (element, id) {
            $id('imageGrid' + id).src = element.src;
            $$('.imgGrid' + id).forEach(function (i) { i.classList.remove('imageeditor-modal-selected'); });
            $id('imageGrid' + id).classList.add('imageeditor-img');
            element.classList.add('imageeditor-modal-selected');
            toggleModal($id('myModalImagePicker' + id), false);
            return false;
        };

        function createGrid(type) {
            var gridImg = $id('gridImg');
            gridImg.src = '<{$wgtimelines_url}>/assets/images/loading.gif';

            var params = new URLSearchParams();
            params.append('op', 'creategrid');
            params.append('XOOPS_TOKEN_REQUEST', $id('btnCreateGrid' + type).getAttribute('data-token'));
            params.append('type', type);
            params.append('<{$imageOrigin}>', '<{$imageId}>');
            for (var i = 1; i <= type; i++) {
                params.append('src' + i, $id('imageGrid' + i).getAttribute('src'));
            }
            params.append('target', '<{$gridtarget}>');

            fetch('image_editor.php', {
                method: 'POST',
                credentials: 'same-origin',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: params.toString()
            }).then(function () {
                gridImg.src = '<{$wgtimelines_upload_url}>/temp/<{$gridtarget}>?' + new Date().getTime();
                $id('gridImgFinal').value = '<{$wgtimelines_upload_path}>/temp/<{$gridtarget}>';
                gridImg.classList.add('imageeditor-img');
                $id('btnApplyGrid').classList.remove('disabled');
            });
        }
        $id('btnCreateGrid4').addEventListener('click', function () { createGrid(4); });
        $id('btnCreateGrid6').addEventListener('click', function () { createGrid(6); });
    })();
</script>

<script type='text/javascript' src='<{$wgtimelines_url}>/assets/js/bootstrap-shim.js'></script>
<script type='text/javascript' src='<{$wgtimelines_url}>/assets/js/cropper.min.js'></script>
<script type='text/javascript' src='<{$wgtimelines_url}>/assets/js/cropper-main.js'></script>

<{include file='db:wgtimelines_admin_footer.tpl'}>
