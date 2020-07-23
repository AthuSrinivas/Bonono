<?php

session_start();// Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_GET['submit'])) 
{
	if (empty($_GET['username']) || empty($_GET['password'])) 
	{
		$error = "Username or Password is invalid";
	}
	else
	{
		// Define $username and $password
		$username = $_GET['username'];
		$password = $_GET['password'];
		$email = $_GET['email'];
		$name = $_GET['name'];
		echo $username;
		// mysqli_connect() function opens a new connection to the MySQL server.
		$conn = mysqli_connect("localhost", "pma", "", "bonono");
		if($conn == false)
		{
    		//try to reconnect
			print("Connection Failed!!!");
		}

		if (mysqli_connect_errno())
  		{
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
		
		// SQL query to fetch information of registerd users and finds user match.		
		$query = "INSERT INTO login(username,password,email,name) VALUES (?,?,?,?)";
		// To protect MySQL injection for Security purpose
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssss", $username, $password, $email, $name);
		$stmt->execute();
		$stmt->bind_result($username,$password,$email,$name);
		$stmt->store_result();
		if($stmt->fetch()) //fetching the contents of the row {
			$_SESSION['login_user'] = $username; // Initializing Session
		//header("location: profile.php"); // Redirecting To Profile Page
	}
	mysqli_close($conn); // Closing Connection
	header("location: singin.html");
	exit;
}

?>