"use-strict"

"use strict"


/* Variables */
const btnUp = document.getElementById('btnUp')
const header = document.querySelector('header')


/* Events */
btnUp.addEventListener('click', handleClick)
document.addEventListener('scroll', handleScroll)


/* helpers */
function handleClick() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    })
}

function handleScroll() {
    const y = window.scrollY
    const h = header.clientHeight

    if (y > h) {
        header.classList.add('--scroll')
    } else {
        header.classList.remove('--scroll')
    }
}