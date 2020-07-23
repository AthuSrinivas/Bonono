<?php
include "config.php";

if(isset($_GET['submit']))
{

    $uname = mysqli_real_escape_string($con,$_GET['username']);
    $password = mysqli_real_escape_string($con,$_GET['password']);

    if ($uname != "" && $password != "")
	{
        $sql_query = "select count(*) as cntUser from login where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('location: ProfilePage.php');
        }else{
            echo '<span style="color:#F00;">Invalid Username or Password!</span>';
        }
    }
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="singin.css" rel="stylesheet" type="text/css" media="screen">
<link href="singin.js" rel="stylesheet" type="text/javascript" media="screen">

</head>
<body>
	<div class="tint">
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login</div>
      <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <lineargradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </lineargradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <div class="form">
		<form action = "https://localhost/Bonono/SignIn.php" method = "$GET">
        <label for="UserName">User Name</label>
        <input type="username" name = "username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" name="submit" value="Submit">
		</form>
      </div>
    </div>
  </div>
</div>
</div>
	</body>
</html>