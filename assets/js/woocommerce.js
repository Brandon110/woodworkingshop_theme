jQuery(function ($) {
    /**
     * Toggles quantity buttons on product page
     */
    function validateQty(qty) {
        if (isNaN(qty) && parseInt(qty) !== parseFloat(qty)) {
            return 1;
        }
        else {
            return Number(qty);
        }
    }

    $('.input-qty-btn').click(function () {
        var buttonId = $(this).attr('id'),
            inputQty = $(this).parent().children('.qty'),
            qty = inputQty.val().replace(/\D/g, ''),
            qty = validateQty(qty);

        if (buttonId === 'increment-qty') {
            qty = qty + 1;
        }
        else if (buttonId === 'decrement-qty' && qty > 0) {
            qty = qty - 1;
        }
        else {
            return 1;
        }

        inputQty.val(qty).trigger('change');
    });

    /**
     * Adds margin to bottom of footer if store notice is enabled
     */
    var storeNotice = $('.woocommerce-store-notice');

    if (storeNotice.length) {
        $('.site-footer').css({ paddingBottom: storeNotice.height() + 'px' });
    }

    /**
    * Toggles woocommerce gallery lightbox
    * 
    */
    if ($('.woocommerce-product-gallery__trigger').length) {//check if lightbox is active
        $('.woocommerce-product-gallery__image').click(function () {
            $('.woocommerce-product-gallery__trigger').trigger('click');
        });
    }
});