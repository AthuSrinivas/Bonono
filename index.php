<?php
// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();

if ( isset( $_SESSION['uname'] ) ) 
{
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
	$uname = $_SESSION['uname'];
} else {
    // Redirect them to the login page
    header("Location: singin.html");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Image</title>
	<link href="index.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
  <form action="upload.php" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
      <input type="file" name="file">
      <input type="submit" name="submit" value="Upload">
  </form>
  <hr>

  <?php
  // Include the database configuration file
  include 'configLater.php';

  // Get images from the database
  $query = $con->query("SELECT file_name FROM images where username = '".$uname."' ORDER BY uploaded_on DESC");

  if($query->num_rows > 0)
  {
      while($row = $query->fetch_assoc())
	  {
          $imageURL = 'images/'.$row["file_name"];
		  $file = substr($row["file_name"], (strpos($row["file_name"],"_")+1));
  ?>
	<div class="responsive">
		<div class="gallery">
			<a target="_blank" href="<?= $imageURL; ?>">
      			<img src="<?= $imageURL; ?>" width="600" height="400"/>
			</a>
		
			<div class="description">
				<p><?= $file; ?></p>
			</div>
		</div>
	</div> 
  <?php }
  } ?>
</html>