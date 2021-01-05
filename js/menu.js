document.addEventListener('scroll', () => {
    let topSection = document.querySelector('#top-section');
    let menu = document.querySelector('nav');
    menu.classList.toggle('visible', (document.scrollingElement.scrollTop > topSection.scrollHeight));
});

function toggleMobileNav() {
    document.querySelector('#mobilenav-wrapper').classList.toggle('opened');
}