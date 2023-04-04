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

// variables of cards
const cardsContainer = document.getElementById('cards')
const cards = cardsContainer.getElementsByTagName('article')

// variables of inputs
const searchIn = document.getElementById('searchIn')
const searchBtn = document.getElementById('searchBtn')
const cityIn = document.getElementById('cityIn')
const ratingIn = document.getElementById('ratingIn')

// events
searchBtn.addEventListener('click', filter)
searchIn.addEventListener('keypress', (e) => e.keyCode === 13 ? filter() : null)
cityIn.addEventListener('change', filter)
ratingIn.addEventListener('change', filter)


// event handler
function filter() {

    // get all values from inputs
    const searchValue = searchIn.value.toLowerCase()
    const cityValue = cityIn.value
    const ratingValue = ratingIn.value

    for (i = 0; i < cards.length; i++) {
        // get data form each event
        title = cards[i].getElementsByTagName("h5")[0].innerText
        city = cards[i].getElementsByClassName("city-name")[0].innerText
        rating = cards[i].getElementsByClassName("age-rating")[0].innerText

        // show only filtered cards and hide rest
        if (
            (title.toLowerCase().indexOf(searchValue) > -1)
            && (city === cityValue || cityValue === 'NULL')
            && (rating == ratingValue || ratingValue === 'NULL')
        ) {
            cards[i].style.display = ""
        } else {
            cards[i].style.display = "none"
        }
    }
}


/* Sort */

const sortIn = document.getElementById('sortIn')

// event
sortIn.addEventListener('change', sort)


// // event handler
// function sort(e) {
//     const value = e.target.value

//     for (i = 0; i < card.length; i++) {

//         date = card[i].getElementsByClassName("event-date")[0].innerText
//         time = card[i].getElementsByClassName("event-time")[0].innerText

//         console.log(date, time)
//     }
// }



// performance issue due to dom man. need to find other approach
function sort() {
    console.time('run-time')
    
    let switching = true
    let shouldSwitch

    let swaps = 0
    let iter = 0

    while (switching) {

        switching = false;

        for (i = 0; i < (cards.length - 1); i++) {
            iter++

            shouldSwitch = false

            let a = cards[i].getElementsByTagName("h5")[0].innerText.toLocaleLowerCase()
            let b = cards[i + 1].getElementsByTagName("h5")[0].innerText.toLocaleLowerCase()
            console.log(a, b)

            if (a > b) {
                shouldSwitch = true
                break
            }
        }
        if (shouldSwitch) {
            
            cards[i].parentNode.insertBefore(cards[i + 1], cards[i]);
            switching = true

            swaps++
        }
    }

    console.log(`
    Total iter:  ${iter}
    Total swaps: ${swaps}
    `)

    console.timeEnd('run-time')
}

