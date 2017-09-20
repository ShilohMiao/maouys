(function ($) {

    $.fn.stickySidebar = function (options) {

        var config = $.extend({
            headerSelector: 'header',
            navSelector: '.page-header',
            contentSelector: '#content',
            footerSelector: '#footer',
            sidebarTopMargin: -50,
            footerThreshold: 40,
            contentfooterbottom: '.contentfooterbottom',
            
            
            
            
        }, options);

        var fixSidebr = function () {

            var sidebarSelector = $(this);
            var viewportHeight = $(window).height();
            var viewportWidth = $(window).width();
            var documentHeight = $(document).height();
            var headerHeight = $(config.headerSelector).outerHeight();
            var navHeight = $(config.navSelector).outerHeight();
            var sidebarHeight = sidebarSelector.outerHeight();
            var contentHeight = $(config.contentSelector).outerHeight();
            var footerHeight = $(config.footerSelector).outerHeight();
            var contentPaddingBottom = $(config.contentfooterbottom).outerHeight();
            var scroll_top = $(window).scrollTop();
            var fixPosition = contentHeight - sidebarHeight;
            var breakingPoint1 = navHeight;
            var breakingPoint2 = documentHeight - (sidebarHeight + footerHeight + config.footerThreshold);
            var breakingPoint3 = contentHeight + navHeight - (sidebarHeight + contentPaddingBottom);

            var negative = breakingPoint3 - scroll_top;
            // calculate
            if ((contentHeight > sidebarHeight) && (viewportHeight > sidebarHeight)) {

                if (scroll_top < breakingPoint1) {

                    sidebarSelector.removeClass('sticky');

                } else if ((scroll_top >= breakingPoint1) && (scroll_top < breakingPoint3)) {

                    sidebarSelector.addClass('sticky').css('top', config.sidebarTopMargin);

                } else {
                    
                    sidebarSelector.addClass('sticky').css('top', negative);
                    
                }
            }
                  
        };

        return this.each(function () {
            $(window).on('scroll', $.proxy(fixSidebr, this));
            $(window).on('resize', $.proxy(fixSidebr, this))
            $.proxy(fixSidebr, this)();
        });

    };

}(jQuery));
