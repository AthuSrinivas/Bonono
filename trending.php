<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Guest Mode</title>
	<link href="index.css" rel="stylesheet" type="text/css" media="screen">
</head>

  <?php
  // Include the database configuration file
  include 'configLater.php';
    
  // Get images from the database
  $query = $con->query("SELECT file_name FROM images ORDER BY no_time_opened");
    
  if($query->num_rows > 0)
  {
      while($row = $query->fetch_assoc())
	  {
          $filename = $row["file_name"];
          //print($row["file_name"]);
          $imageURL = 'images/'.$row["file_name"];
		  $file = substr($row["file_name"], (strpos($row["file_name"],"_")+1));
          
  ?>
	<div id= "<?= $x; ?>" class="responsive" >
		<div class="gallery">
		    <a target="_blank" href="pagee.php?name= <?= $imageURL ?>">
      			<img src="<?= $imageURL; ?>" width="600" height="400" />   
			</a>
		
			<div class="description">
				<p><?= $file; ?></p>
			</div>
		</div>
	</div> 
  <?php
      }
  } 
    ?>
</body>
</html>