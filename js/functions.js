( function($) {
    pageActions = {
        displayImageOnly: function() {

            var imageContainers = $('body').find('.hershey-image'),
                videoContainers = $('body').find('.hershey-video');

            imageContainers.each(function() {

                var image = $(this)
                    .find('a')
                    .attr('data-lightbox', 'hershey-image')
                    .attr('data-image-loaded', 'true');

                if (image.attr('data-image-load') === true ) {
                    return
                }
                 
                $(this).html(image);

            });

            if (videoContainers) {

                var videoLink = $('<a></a>'),
                    videoElement = $('<video>Sorry, the video could not be displayed.</video>');

                videoContainers.each(function() {
                    var videoUrl = $(this).find('a').attr('href'),
                        videoAttrs = {
                            src: videoUrl,
                            height: '100%',
                            width: '100%',
                            controls: 'controls'
                        };


                    if (!videoUrl) {
                        return;
                    }

                    videoElement.attr(videoAttrs);

                    $(this).html('');

                    videoElement.appendTo($(this));

                });

            }
        },

        applyMasonry: function() {
            var container = document.querySelector('#main'),
                options = {
                    itemSelector: '.hershey-grid',
                    columnWidth: '.grid-sizer',
                    containerStyler: null
                },
                masonry = new Masonry(container, options);
        }
    }

    $(document).ready(function() {
        pageActions.displayImageOnly();
        pageActions.applyMasonry();
    });

    $( document.body ).on( 'post-load', function (posts) {
        pageActions.displayImageOnly();
        pageActions.applyMasonry();

    } );

} )(jQuery)