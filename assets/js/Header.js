define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var Header = /** @class */ (function () {
        // Constructor
        function Header() {
            /**
             * Header
             * Manages the opening and closing of the mobile nav
             * @author Jérémy Goulet <jeremy.goulet14@gmail.com>
             */
            // Attributes
            this.$btnMenu = $('.header__action');
            this.$header = $('.header');
            this.headerHeight = this.$header.outerHeight();
            this.scrollPosition = 0;
            this.$btnMenu.on('click', this.openCloseNav.bind(this));
            $(window).on('scroll', this.showHideHeader.bind(this));
        }
        /**
         * Toggle classes which show or hide the nav
         * @param {Event} e - Transitioned event
         */
        Header.prototype.openCloseNav = function (e) {
            e.preventDefault();
            this.$header.toggleClass('opened');
            if (this.$btnMenu.text() == "Menu") {
                this.$btnMenu.text("Fermer");
                this.$btnMenu.removeClass("icon--hamburger");
                this.$btnMenu.addClass("icon--close");
            }
            else {
                this.$btnMenu.text("Menu");
                this.$btnMenu.removeClass("icon--close");
                this.$btnMenu.addClass("icon--hamburger");
            }
        };
        Header.prototype.showHideHeader = function (e) {
            var scrollTop = $(e.currentTarget).scrollTop();
            // If scroll is at the top, removes minimized or maximized classes
            if (scrollTop <= 0) {
                this.$header.removeClass('header--inTransition');
            }
            else {
                this.$header.addClass('header--inTransition');
            }
            this.scrollPosition = scrollTop;
        };
        return Header;
    }());
    exports.Header = Header;
});
//# sourceMappingURL=Header.js.map