$('#share-buttons a').each(function () {
    var link = "";
    switch ($(this).attr('id')) {
        case 'soc_fb':
            link = 'https://www.facebook.com/sharer/sharer.php?u=' + location.href;
            break;
        case 'soc_goog':
            link = 'https://plus.google.com/share?url=' + location.href;
            break;
        case 'soc_li':
            link = 'http://www.linkedin.com/shareArticle?mini=true&amp;url=' + location.href;
            break;
        case 'soc_tw':
            link = 'https://twitter.com/share?url=' + location.href;
            break;
    }

    $(this).attr('href', link)

})
