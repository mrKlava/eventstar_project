"use-strict"


/* Scroll up */

const btnUp = document.getElementById('btnUp')
const header = document.querySelector('header')


// events
btnUp.addEventListener('click', handleClick)
document.addEventListener('scroll', handleScroll)


// event handlers
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


/* Filtering */

const cards = document.getElementById('cards')
const card = cards.getElementsByTagName('article')

console.log(card[0].getElementsByTagName("h5")[0])
console.log(card[0].getElementsByClassName("city-name")[0].innerText)

    /* Search */

const searchIn = document.getElementById('searchIn')
const searchBtn = document.getElementById('searchBtn')

// events
searchBtn.addEventListener('click', search)
searchIn.addEventListener('keypress', (e) => e.keyCode === 13 ? search() : null)

// event handler
function search() {
    const value = searchIn.value.toLowerCase()

    for (i = 0; i < card.length; i++) {

        title = card[i].getElementsByTagName("h5")[0]

        txtValue = title.textContent || title.innerText

        if (txtValue.toLowerCase().indexOf(value) > -1) {
            card[i].style.display = ""
        } else {
            card[i].style.display = "none"
        }
    }
}


    /* Filter Cities */

const cityIn = document.getElementById('cityIn')

// event
cityIn.addEventListener('change', cityFilter)

// event handler
function cityFilter(e) {
    const value = e.target.value

    for (i = 0; i < card.length; i++) {

        name = card[i].getElementsByClassName("city-name")[0].innerText

        if (name === value) {
            card[i].style.display = ""
        } else if (value === 'NULL') {
            card[i].style.display = ""
        } else {
            card[i].style.display = "none"
        } 
    }
}
