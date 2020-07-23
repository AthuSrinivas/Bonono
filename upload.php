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
<?php
// Include the database configuration file
include 'configLater.php';
$statusMsg = '';
$backlink = ' <a href="index.php">Go to Gallery</a>';

// File upload path
$targetDir = "images/";
$fileName = $_SESSION['uname']."_".basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if (!file_exists($targetFilePath)) {
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $con->query("INSERT into images (username,file_name, uploaded_on) VALUES ('".$_SESSION['uname']."','".$fileName."', NOW())");
                if($insert){
                    $statusMsg = "The file <b>".$fileName. "</b> has been uploaded successfully." . $backlink;
                }else{
                    $statusMsg = "File upload failed, please try again." . $backlink;
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file." . $backlink;
            }
        }else{
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload." . $backlink;
        }
    }else{
            $statusMsg = "The file <b>".$fileName. "</b> is already exist." . $backlink;
        }
}else{
    $statusMsg = 'Please select a file to upload.' . $backlink;
}

// Display status message
echo $statusMsg;
?>