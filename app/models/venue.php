<?php

class Venue extends Model
{
	protected $tableName = 'venues';

	public function findAll()
	{
		$stmt = $this->db->prepare("SELECT * FROM {$this->tableName}");

		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_CLASS, 'Venue'); // get result as an object of Venue
	}

	public function find($id)
	{
		$stmt = $this->db->prepare(
			"SELECT * FROM {$this->tableName} WHERE id=:id LIMIT 1"
		);

		$stmt->execute([':id' => $id]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Venue');

		return $stmt->fetch(); // get single user by id
	}

	public function create(array $data)
	{
		$venueData = [];

		$venueData[':title'] = trim($data['title']);
		$venueData[':description'] = trim($data['description']);
		$venueData[':distance'] = trim($data['distance']);


		$query = "
			INSERT INTO
				{$this->tableName}
					(title,description,distance)
				VALUES
					(:title,:description,:distance)
		";

		$stmt = $this->db->prepare($query);


		$stmt->execute($venueData);

	}

	public function update(array $data)
	{		
		$stmt = $this->db->prepare(
			"UPDATE {$this->tableName} SET
				title = :title,
				description = :description,
				distance = :distance
			WHERE id=:id"
		);

		$stmt->execute([
			':title' => $data['title'],
			':description' => $data['description'],
			':distance' => $data['distance'],
			':id' => $this->id
		]);
	}

	public function delete($id)
	{
		$stmt = $this->db->prepare(
			"DELETE FROM {$this->tableName} WHERE id=:id"
		);

		$stmt->execute([':id' => $id]);
	}

	public function shortDesc()
	{
		return substr($this->description, 0, 20);
	}
}