<?php
session_start();

require_once(__DIR__ . '/autoload.php');


$APP = new App();

$APP->set('view', new View);
$APP->set('bcrypt', new Bcrypt);
$APP->set('session', new Session);
$APP->set('cookie', new Cookie);
$APP->set('homeModel', new Home);
$APP->set('userModel', new User);
$APP->set('concertModel', new Concert);
$APP->set('venueModel', new Venue);
$APP->set('genreModel', new Genre);

require_once(__DIR__ . '/app/helpers/helpers.php');
