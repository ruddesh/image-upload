<?php 
require_once('init.php');

class Image extends Db{

	public function create() {

		$message = "";
		if (isset($_POST['upload'])) {

			$target = "images/".basename($_FILES['image']['name']);

			$image = $_FILES['image']['name'];
			$desc = $_POST['text'];

			$sql = "INSERT INTO images(image, description) VALUES('$image', '$desc')";
			$statement = $this->connect()->prepare($sql);
			$statement->execute();
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
				$message = "Uploaded Successfully";
			}
			else{
				$message = "Upload failed";
			}
		}
	}


	public function getImage(){
		$sql = "SELECT * FROM images ORDER BY id DESC";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		$image = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $image;
	}
}