<?php

/**
* 
*/
class Bcrypt
{
	public function make($password)
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public function check($string, $hash)
	{
		return password_verify($string, $hash);
	}
}