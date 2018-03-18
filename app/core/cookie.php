<?php
class Cookie
{	
	function set($key, $value, $expirationDate = 60*60*24*30)
	{

		setcookie( $key, $value, time()+$expirationDate );

	}

	public function has($key)
	{

		return array_key_exists($key, $_COOKIE);

	}

	function get($key){

		if(!$this->has($key)) return null;

		return $_COOKIE[$key];

	}
	public function flush($key, $expirationDate = 10)
	{	
		unset($_COOKIE[$key]);
		setcookie( $key, $value, time()-$expirationDate );
	}
}