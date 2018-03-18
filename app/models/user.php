<?php

class User extends Model
{
	protected $tableName = 'users';

	const NO_USER = -1;
	const PASSWORD_NO_MATCH = 0;

	public function findAll($query="")
	{
		$stmt = $this->db->prepare(
			"SELECT * FROM {$this->tableName} {$query}"
		);

		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_CLASS, 'User'); // get result as an object of User
	}

	public function find($id)
	{
		$stmt = $this->db->prepare(
			"SELECT * FROM {$this->tableName} WHERE id=:id LIMIT 1"
		);

		$stmt->execute([':id' => $id]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

		return $stmt->fetch(); // get single user by id
	}

	public function findByCredentials($email, $password)
	{
		$stmt = $this->db->prepare(
			"SELECT * FROM {$this->tableName} WHERE email=:email LIMIT 1"
		);

		$stmt->execute([':email' => $email]);

		$user = $stmt->fetch(PDO::FETCH_ASSOC); // get user in associative array

		// user doesnot exists
		if(!$user) return User::NO_USER;

		// passord no match
		if (!bcrypt()->check($password, $user['password'])) return User::PASSWORD_NO_MATCH;

		return $user;
	}

	public function toggleAdmin(){

		$admin = $this->isAdmin() ? 0 : 1;

		$query = "UPDATE {$this->tableName} SET isadmin={$admin} where id=:id";


		$stmt = $this->db->prepare($query);

		$stmt->execute([':id' => $this->id]);

	}

	public function isAdmin()
	{
		return (int) $this->isadmin ? true : false;
	}

	public function create(array $data)
	{
		$userData = [];

		$userData[':firstname'] = trim($data['firstname']);
		$userData[':lastname'] = trim($data['lastname']);
		$userData[':email'] = trim($data['email']);
		$userData[':agerange'] = $data['agerange'];
		$userData[':password'] = bcrypt()->make($data['password']);

		$query = "
			INSERT INTO
				{$this->tableName}
					(firstname,lastname,email,agerange,password)
				VALUES
					(:firstname,:lastname,:email,:agerange,:password)
		";

		$stmt = $this->db->prepare($query);


		$stmt->execute($userData);
	}

	public function delete($id) // Function delete to delete an item at $id
	{
		$stmt = $this->db->prepare(
			"DELETE FROM {$this->tableName} WHERE id=:id"
		);

		$stmt->execute([':id' => $id]);
	}
}