<?php

class Concert extends Model
{
	protected $tableName = 'concerts';

	protected $uploadDir = __DIR__."/../../public/assets/dashboard/img/concerts/";
	protected $serveDir = "public/assets/dashboard/img/concerts/";

	// Function to find a data at $id from concert
	public function find($id)
	{
		$stmt = $this->db->prepare(

			"SELECT * FROM {$this->tableName} where id=:id limit 1"
		);

		$stmt->execute([':id' => $id]); // Using PDO to exctute the statement

		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Concert');

		return $stmt->fetch(); // get result as an object of Concert
	}

	// Function to find all data from concert
	public function findAll($query="")
	{
		$stmt = $this->db->prepare("SELECT * FROM {$this->tableName} {$query}");

		$stmt->execute(); // Using PDO to exctute the statement

		$concerts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Concert'); // get result as an object of Concert

		if(isset($concerts[0])) $this->image = $concerts[0]->image; // Storing the image url in local variable $image


		return $concerts; // Returning all the concerts
	}

	public function favourites(array $ids)
	{
		$placeholders = str_repeat("?,", count($ids)-1) . "?";

		$query = "SELECT * FROM {$this->tableName} WHERE id IN ({$placeholders})";

		$stmt = $this->db->prepare($query);

		$stmt->execute($ids);


		return $stmt->fetchAll(PDO::FETCH_CLASS, 'Concert');
	}

	public function search($searchQuery)
	{
		$query = "SELECT * FROM {$this->tableName} WHERE title LIKE :query OR description LIKE :query";

		$stmt = $this->db->prepare($query);

		$stmt->execute([':query' => "%{$searchQuery}%"]);

		return $stmt->fetchAll(PDO::FETCH_CLASS, 'Concert');
	}

	public function create(array $data, array $uploadable)
	{
		$concertData = [];
		$image = '';


		if($uploadable['name']){
			$image = $this->uploadImage($uploadable);
		}

		$concertData[':title'] = trim($data['title']);
		$concertData[':description'] = trim($data['description']);
		$concertData[':image'] = $image;
		$concertData[':genre_id'] = $data['genre_id'];
		$concertData[':event_date'] = $data['event_date'];
		$concertData[':venue_id'] = $data['venue_id'];
		$concertData[':pinned'] = $data['pinned'];


		$query = "
			INSERT INTO
				{$this->tableName}
					(title,description,image,genre_id,event_date,venue_id,pinned)
				VALUES
					(:title,:description,:image,:genre_id,:event_date,:venue_id,:pinned)
		";

		$stmt = $this->db->prepare($query);


		$stmt->execute($concertData);


		if($stmt->rowCount()==0){

			var_dump($concertData, $stmt->errorInfo());

			die;

		}redirect('/dashboard/concert/show');
	}

	public function update(array $data, array $uploadable)
	{
		$image = $this->image;

		if($uploadable['name']){
			$this->removeImage();

			$image = $this->uploadImage($uploadable);
		}


		$stmt = $this->db->prepare(
			"
				UPDATE {$this->tableName} SET
					title = :title,
					description = :description,
					genre_id = :genre_id,
					event_date = :event_date,
					venue_id = :venue_id,
					image = :image,
					pinned = :pinned
				WHERE id = :id
			"
		);

		$updateData = [
			':title' => $data['title'],
			':description' => $data['description'],
			':genre_id' => $data['genre_id'],
			':event_date' => $data['date'],
			':venue_id' => $data['venue_id'],
			':pinned' => $data['pinned'],
			':image' => $image,
			':id' => $this->id
		];

		$stmt->execute($updateData);
	}

	public function delete($id) // Function delete to delete an item at $id
	{
		$stmt = $this->db->prepare(
			"DELETE FROM {$this->tableName} WHERE `id` = {$id}"
		);

		$stmt->execute(); // PDO execute funtion

		$concert = $this->find($id);

		if($concert) $concert->removeImage();
	}

	public function shortDesc() // Function to shorten the description
	{
		return substr($this->description, 0, 20);
	}

	public function imgURL() // function to retun the actual url of the image
	{
		return assets('dashboard/img/concerts/' . $this->image);
	}

	// function to store the image in localhost
	public function uploadImage($image) // Stores the image in disk
	{
	    $target_file = time() . basename($image["name"]);

	    if(!move_uploaded_file($image["tmp_name"], $this->uploadDir . $target_file)) {
	    	return false;
	    }

	    return $target_file;
	}

	public function removeImage()
	{
		$toRemove = $this->uploadDir . $this->image;

		if(file_exists($toRemove)) unlink($toRemove);
	}
}
