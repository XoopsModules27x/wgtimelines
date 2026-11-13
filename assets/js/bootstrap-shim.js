/* Minimal stand-ins for Bootstrap jQuery plugins, for themes without Bootstrap.
   Load AFTER jQuery and BEFORE cropper-main.js. */
(function ($) {
    'use strict';
    if (!$) { return; }
    ['tooltip', 'popover', 'collapse', 'dropdown'].forEach(function (name) {
        if (!$.fn[name]) { $.fn[name] = function () { return this; }; }
    });
    if (!$.fn.modal) {
        $.fn.modal = function (action) {
            return this.each(function () {
                var show = action !== 'hide';
                this.classList.toggle('ie-open', show);
                this.setAttribute('aria-hidden', show ? 'false' : 'true');
            });
        };
    }
})(window.jQuery);
