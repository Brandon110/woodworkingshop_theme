jQuery(function ($) {

    /**
     * header on scroll js
     * 
     * Makes site header a sticky header when top of window reaches div[class='site-content']
     */
    $(window).on('scroll', function () {
        var siteContent = $('#content');
        var siteHeader = $('.site-header');

        if ($(window).scrollTop() > siteContent.offset().top) {
            siteHeader.addClass('sticky-header');
        }
        else {
            siteHeader.removeClass('sticky-header');
        }
    });

    /**
     * Toggle handheld menu
     * 
     * Shows and hides handheld menu
     */
    $('#toggle-handheld-menu').click(function () {
        var handheldMenuItems = $('#handheld-menu-items');

        if (!handheldMenuItems.is(':visible')) {
            handheldMenuItems.slideDown(300);
        }
        else {
            handheldMenuItems.slideUp(300);
        }
    });

    /**
     * Toggle handheld sub menu
     * 
     * Appends toggle button to sub menu and shows and hides sub menu
     * 
     */
    $('.handheld-menu .menu-item-has-children > a')
        .after('<button class="toggle-sub-menu">+</button>');

    $('.toggle-sub-menu').click(function () {

        var toggledSubMenu = $(this).parent().children('ul.sub-menu').first();

        if (!toggledSubMenu.is(':visible')) {
            toggledSubMenu.slideDown(300);
            $(this).html('-');
        }
        else {
            toggledSubMenu.slideUp(300);
            $(this).html('+');
        }
    });

    /**
     * Toggle search form
     * 
     * Shows and hides search form
     * 
     */
    $('#toggle-search-form').click(function () {

        var searchForm = $('.header-icons-wrap .search-form');

        if (!searchForm.is(':visible')) {
            searchForm.fadeIn(300);
        }
        else {
            searchForm.fadeOut(300);
        }
    });

});