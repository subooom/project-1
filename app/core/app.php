<?php

class App
{
	private $container = [];


	public function set($key, $value)
	{
		$this->container[$key] = $value;

		return $this;
	}

	public function get($key)
	{
		if(!array_key_exists($key, $this->container)) {
			
			print_r(array_keys($this->container));


			throw new Exception("$key is't available in the app container.");
		}

		return $this->container[$key];
	}

	/* if method doesn't exists */
	public function __call($functionName, $args)
	{
		return $this->get($functionName);
	}
}