"use strict"

document.addEventListener('DOMContentLoaded', function() {
  const banner = document.getElementById('banner')
  const bannerTitle = document.getElementById('bannerTitle')

  const eventTitle = document.getElementById('eventTitle').innerText
  const image = document.getElementById('src').innerText
  
  if (image) banner.style.backgroundImage = `url('public/assets/images/events/${image}')`

  bannerTitle.innerText = eventTitle
  
})