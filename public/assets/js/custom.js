function navClick(element) {
    const NAV_LINK = document.querySelectorAll('.sidebar .nav .nav-item .nav-link');
    for (i = 0; i < NAV_LINK.length; i++) {
        NAV_LINK[i].classList.remove('nav-link--active')
    }
    element.classList.toggle('nav-link--active');
}

function subMenuClick(element) {
    const SUB_MENU = document.querySelectorAll('.sidebar .nav.sub-menu .nav-item .nav-link');
    const SUB_ICON = document.querySelectorAll('.sidebar .nav.sub-menu .nav-item .nav-link i');
    // console.log(SUB_ICON);

    for (i = 0; i < SUB_MENU.length; i++) {
        SUB_MENU[i].classList.remove('sub-menu--active')
    }
    element.classList.toggle('sub-menu--active');

    for (j = 0; j < SUB_ICON.length; j++) {
        SUB_ICON[j].classList.remove('mdi-radiobox-marked')
        SUB_ICON[j].classList.add('mdi-radiobox-blank')
    }
    const elementChildren = element.querySelector('.mdi-radiobox-blank');
    elementChildren.classList.remove('mdi-radiobox-blank')
    elementChildren.classList.add('mdi-radiobox-marked')
}