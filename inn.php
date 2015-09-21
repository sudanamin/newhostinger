<?php


 $conn = mysqli_connect("mysql.hostinger.ae","u314476761_root","rootana","u314476761_image") or die("Error " . mysqli_error($connection));
//$con = mysqli_connect("localhost","root","root");
//mysqli_select_db($con,"v-u-a-p");

if(isset($_POST['submit']))
{
	$name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];

	move_uploaded_file($temp,"uploaded/".$name);
	$url = "http://sudan.besaba.com/uploaded/$name";
	mysqli_query($conn,"INSERT INTO `images` VALUE ('$name','$url')");
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Video Upload And Playback Tutorial</title>
<style type="text/css">
.galary {
	color: #C0C;
}
</style>
</head>

<body>
<h3><a href="images.php" class="galary">Show Galary</a>
</h3>

  
  <form action="inn.php" method="POST" enctype="multipart/form-data">
    <p>
      <input type="file" name="file" />
    </p>









<label for="Title">
    
  Ttitle
  <input type="text" name="Title" id="Title">
      <br>
      <br>
</label>

  <label for="Price">Price
      <input type="text" name="Price" id="Price">
</label>
<p>
  <input type="submit" name="submit" value="Upload!" />
</p>
   </form>

   <?php

  if(isset($_POST['submit']))
{
	echo "<br />".$name." has been uploaded";
    require_once('sqltojson.php');  // update the json file (ima.txt) 
}

?>


</body>
</html>