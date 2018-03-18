<?php

class Session
{
	public function set($key, $value)
	{
		$_SESSION[$key] = $value;

		return $this;
	}

	public function has($key)
	{
		return array_key_exists($key, $_SESSION);
	}


	public function get($key)
	{
		if(!$this->has($key)) return null;


		return $_SESSION[$key];
	}

	public function remove($key)
	{
		unset($_SESSION[$key]);
	}

	public function flush()
	{
		$_SESSION = [];
		session_destroy();
	}
}