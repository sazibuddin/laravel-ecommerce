(function ($) {
    'use strict';
    if ($(".lightgalleryID").length) {
        $(".lightgalleryID").lightGallery();
    }

    if ($("#lightgallery-without-thumb").length) {
        $("#lightgallery-without-thumb").lightGallery({
            thumbnail: true,
            animateThumb: false,
            showThumbByDefault: false
        });
    }

    if ($("#video-gallery").length) {
        $("#video-gallery").lightGallery();
    }
})(jQuery);