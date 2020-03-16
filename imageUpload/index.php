<?php require_once('init.php'); ?>

<?php 
$create = new Image;
$create->create();
$images = $create->getImage();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ImagrUpload</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<?php 
		foreach ($images as $image) {
			echo "<div id='img_div'>";
				echo "<img src='images/".$image->image. "' >";
				echo "<p>".$image->description. "</p>";
			echo "</div>";
		}

	?>

	

	<div id="content">
		<form method="post" action="index.php" enctype="multipart/form-data">
			<div>
				<input type="file" name="image">
			</div>
			<div>
				<textarea name="text" cols="40" rows="4" placeholder="say something about the image...."></textarea>
			</div>
			<div>
				<input type="submit" name="upload" value="Upload Image">
			</div>
		</form>
	</div>		
</body>
</html>
