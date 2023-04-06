"use strict"
const address = document.getElementById('address').textContent
const lat = document.getElementById('lat').textContent
const long = document.getElementById('long').textContent
const position = [Number(lat), Number(long)]

const map = L.map('map').setView(position, 13)

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

const marker = L.marker(position).addTo(map)

marker.bindPopup(address).openPopup()