<?php

$ROOT = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);

define('SITE_URL', "http://localhost".$ROOT);

require_once(__DIR__ . '/../bootstrap.php');

$parsed = parse_url($_SERVER['REQUEST_URI']);

$path = $parsed['path'];

$path = substr($path, strlen('/paradox_inc/'));

// dd($path);
// dd(site_url('views/favourites'));

if($path === '') return view()->load('index');

$path = trim($path, '/');

if($path === 'dashboard') return view()->load('dashboard/index');
if($path === 'dashboard/concerts') return view()->load('dashboard/concerts/index');
if($path === 'dashboard/users') return view()->load('dashboard/users/index');
if($path === 'dashboard/genres') return view()->load('dashboard/genres/index');
if($path === 'dashboard/venues') return view()->load('dashboard/venues/index');

return view()->load($path);



