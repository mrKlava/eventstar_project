<?php
$routes = [
  'home'                => 'EventStar',

  'login'               => 'Login',
  'register'            => 'Register',
  'user-editor'         => 'Edit Profile',
  'users-manager'       => 'Users Manager',

  'event-editor'        => 'Event Editor',
  'event-participants'  => 'Event Participants',
  'event-details'       => 'Event Details',
  'events'              => 'Events',
  'events-going'        => 'My events',
  'events-manager'      => 'Events Manager',

  'locations-manager'   => 'Locations Manager',
  'location-editor'     => 'Location Editor',
  
  'city-manager'        => 'City Manager',
];

$page = isset($_GET['page']) ? $page = $_GET['page'] : 'home';

$banner = "banner_$page";

$title = isset($routes[$page]) ? $routes[$page] : '404';

$page_title = $title;