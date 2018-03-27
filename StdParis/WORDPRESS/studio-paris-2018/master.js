$( document ).ready(function() {
    $('#out-of-the-box-demo').slippry({
        adaptiveHeight: true,
        captions: false
    });
    $('#slider-product-single ul').slippry({
        adaptiveHeight: true,
        captions: false
    });
    $('.tooltip').tooltipster({
        contentCloning: true,
        contentAsHTML: true,
        interactive: true,
        side: 'bottom',
        theme: 'tooltipster-light'
    });
    $('.tooltip-footer').tooltipster({
        contentCloning: true,
        contentAsHTML: true,
        interactive: true,
        side: 'top',
        theme: 'tooltipster-light'
    });

    setTimeout(" $('.isa_info_box').fadeOut('slow', function(){ $('.isa_info_box').remove(); }); ", 5000);
});
