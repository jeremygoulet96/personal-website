export class Header {
    /**
     * Header
     * Manages the opening and closing of the mobile nav
     * @author Jérémy Goulet <jeremy.goulet14@gmail.com>
     */

    // Attributes
    private $btnMenu = $('.header__action');
    private $header = $('.header');

    // Constructor
    public constructor() {
        this.$btnMenu.on('click', this.openCloseNav.bind(this));
    }

    /**
     * Toggle classes which show or hide the nav
     * @param {Event} e - Transitioned event
     */
    private openCloseNav(e: Event):void {
        e.preventDefault();

        this.$header.toggleClass('opened');

        if(this.$btnMenu.text() == "Menu") {
            this.$btnMenu.text("Fermer");
            this.$btnMenu.removeClass("icon--hamburger");
            this.$btnMenu.addClass("icon--close");
        }
        else {
            this.$btnMenu.text("Menu");
            this.$btnMenu.removeClass("icon--close");
            this.$btnMenu.addClass("icon--hamburger");
        }
    }
}
