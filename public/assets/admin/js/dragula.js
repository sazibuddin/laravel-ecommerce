(function ($) {
    'use strict';
    var iconTochange;
    var relatedImage;
    dragula([document.getElementById("dragula-left"), document.getElementById("dragula-right")]);
    dragula([document.getElementById("profile-list-left"), document.getElementById("profile-list-right")]);
    dragula([document.getElementById("dragula-event-left"), document.getElementById("dragula-event-right")])
        .on('drop', function (el) {
            console.log($(el));
            iconTochange = $(el).find('.fa');

            relatedImage = $(el).find('.related_image');

            let divId = $(el).closest('.parentDiv').attr('id');

            if (divId === 'dragula-event-right') {
                iconTochange.removeClass('text-primary').addClass('text-success');
                relatedImage.attr('name', 'relatedImage[]');
                relatedImage.addClass('active');
            } else {
                relatedImage.removeClass('active');
                relatedImage.attr('name', '');
                iconTochange.removeClass('text-success').addClass('text-primary');
            }

        })
})(jQuery);