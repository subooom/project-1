<?php

class Genre extends Model
{
	protected $tableName = 'genres';

	public function findAll()
	{
		$this->stmt = $this->db->prepare("SELECT * FROM {$this->tableName}");

		$this->stmt->execute();

		return $this->stmt->fetchAll(PDO::FETCH_CLASS, 'Genre'); // get result as an object of Genre
	}

	public function find($id)
	{
		$stmt = $this->db->prepare(
			"SELECT * FROM {$this->tableName} WHERE id=:id LIMIT 1"
		);

		$stmt->execute([':id' => $id]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Genre');

		return $stmt->fetch(); // get single Genre by id
	}

	public function create(array $data)
	{
		$query = "INSERT INTO {$this->tableName} (name) VALUES (:name)";

		$stmt = $this->db->prepare($query);


		$stmt->execute([':name' => $data['name']]);
	}

	public function update(array $data)
	{
		$stmt = $this->db->prepare("UPDATE {$this->tableName} SET name = :name WHERE id=:id");

		$stmt->execute([':name' => $data['name'], ':id' => $this->id]);
	}

	public function delete($id)
	{
		$stmt = $this->db->prepare(
			"DELETE FROM {$this->tableName} WHERE id=:id"
		);

		$stmt->execute([':id' => $id]);
	}
}