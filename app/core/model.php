<?php

class Model
{
	protected $db;
	protected $attr = [];

	public function __construct()
	{
		$this->db = Database::getInstance();
	}

	// The __set method executes when an non member function of this Class is called with $key and $value as an arguement
	public function __set($name, $value)
	{
		$this->attr[$name] = $value;
	}

	// The __get method executes when an non member function of this Class is called with $key and returns the previously stored value
	public function __get($name)
	{
		if(array_key_exists($name, $this->attr)) {

			return $this->attr[$name];

		}

		return null;
	}
}