export default {
  init() {
    // JavaScript to be fired on all pages
    const navBurger = $('.navbar-burger');
    const navMenu = $('.navbar-menu');
    const page = $('html, body');
    const scrollToTop = $('.back-to-top');
    const dropDown = $('.menu-item-has-children::after');
    const dropDownMenu = $('.sub-menu');
    
    navBurger.on('click', () => toggleMenu());
    dropDown.on('click', () => toggleDropDown());

    const toggleMenu = () => {
      // Toggle the 'is-active' class on both the 'navbar-burger' and the 'navbar-menu'
      navBurger.toggleClass('is-active');
      navMenu.toggleClass('is-active');
    }

    const toggleDropDown = () => {
      dropDownMenu.toggleClass('menu-open');
    }

    //Check to see if the window is top if not then display button
    $(window).scroll( function() {
      if ($(this).scrollTop() > 100) {
        scrollToTop.fadeIn();
      } else {
        scrollToTop.fadeOut();
      }
    });
    
    //Click event to scroll to top
    scrollToTop.on('click', function() {
      page.animate({scrollTop : 0},800);
      return false;
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
