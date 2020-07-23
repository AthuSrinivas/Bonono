<?php   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Image</title>
    <!--<link href = "css/style2css.css" type = "text/css" rel = "stylesheet">-->

    <?php
    include 'configLater.php';
    include 'guestmode.php';
    $sjsj=$_GET['name'];
    $imageURL2=$_GET['name'];
    #header('Location: '.$sjsj);
    #$imageURL2 = 'images/'.$imagename;
    ?>
    <a>
    <img src="<?= $imageURL2; ?>" width=50% height=50% />
    </a>
    <?php
    $sjsj=str_replace("images/","",$sjsj);
    $len=strlen($sjsj);
    
    $sjsj=substr($sjsj,1,$len);
    $imagename=$sjsj;
    //$query = $con->query("  SELECT no_time_opened FROM `images` WHERE `file_name` =  '".$imagename."'");
    $query = $con->query("SELECT no_time_opened FROM `images` WHERE file_name= '".$sjsj."' ");
    $result = $query->fetch_assoc();
    print($result['no_time_opened']);
    #print($imageURL);
    //$result = $query->fetch_assoc();
    //$array[] = $result['no_time_opened'];

    //print($array[0]);
    //print($row['no_time_opened']);
    $nu = $result['no_time_opened'];
    $nu = $nu + 1;
    $insert = $con->query("UPDATE images SET no_time_opened=".$nu." where file_name='".$imagename."'");
    ?>
</head>
</html>