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

<!doctype html>
<html lang = "en">
<head>
<meta charset="utf-8">
<title>Homepage</title>
	
	<link href = "css/style.css" type = "text/css" rel = "stylesheet">
</head>

<body>
	<header>
		<div class = "tint">
			<div class = "container">
	  			<h1></h1>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<input type="file" class="fileUpload" name="file">
					<input type="submit" class="btn" name="submit" value="Upload">
				</form>
		  	</div>
			
			<div class = "Sign_In">
                <a href = "#" onClick="location.href='trending.php'" class = "LogOut2">Trending</a>
                <h2 style="display:inline;">&nbsp&nbsp&nbsp|&nbsp&nbsp</h2>
  				<a href = "#" onClick="location.href='index.php'" class = "User"><?php echo $_SESSION["uname"]; ?></a>
				<h2 style="display:inline;">&nbsp&nbsp&nbsp|&nbsp&nbsp</h2>
				<a href = "#" onClick="location.href='logout.php'" class = "LogOut">Log Out</a>
			</div>
			<div class = "Logo">
				<img src = "Logo/Logo White.png" width="150" height="150" alt = "Bonono" />
			</div>
	  	</div>
	</header>
</body>
</html>