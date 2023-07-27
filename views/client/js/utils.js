export function animatedInterval() {

    let headerLogo = document.querySelector('.header__logo')
    setInterval(() => {
        headerLogo.classList.add('animate__flip')
    }, 2000)

    setInterval(() => {
        headerLogo.classList.remove('animate__flip')
    }, 4000)
}