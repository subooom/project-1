<?php

function app() {
	global $APP;

	return $APP;
}

function bcrypt() {

	return app()->bcrypt();

}

function redirect($url) {

	header('Location: '. site_url($url));

}

function session() {

	return app()->session();

}

function cookie() {

	return app()->cookie();

}

function view() {

	return app()->view();

}

function dd() {
	$args = func_get_args();

	echo '<pre>';

	foreach ($args as $arg) var_dump($arg);

	die();
}

function assets($path) {
	return SITE_URL . 'public/assets/' . trim($path, '/');

}
function public_dir($path) {
	return SITE_URL . 'public/' . trim($path, '/');

}

function site_url($path) {

	return SITE_URL . trim($path, '/');

}
