(function ($) {
    "use strict";
    $(function () {
        $(".file-upload-browse").on("click", function () {
            var file = $(this)
                .parent()
                .parent()
                .parent()
                .find(".file-upload-default");
            file.trigger("click");
        });
        $(".file-upload-default").on("change", function () {
            $(this).parent().find(".file-upload-info").val($(this).val());
        });
    });
})(jQuery);
