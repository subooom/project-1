<?php

class Database
{
	private static $instance;
	private $statement;
	private $pdo;

	private function __construct()
	{
		$this->pdo = new PDO(
			'mysql:host=localhost;dbname=paradox;charset=utf8mb4', 'root', ''
		);
	}

	public static function getInstance()
	{
		if(!static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function pdo()
	{
		return $this->pdo;
	}

	public function prepare($query)
	{
		return $this->pdo->prepare($query);
	}
}