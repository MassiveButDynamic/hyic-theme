function setDocHeight() {
    document.documentElement.style.setProperty('--vh', `${window.innerHeight/100}px`);
}
setDocHeight();

window.addEventListener('resize', setDocHeight)
window.addEventListener('orientationchange', setDocHeight)