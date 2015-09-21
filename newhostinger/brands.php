<?php

require 'data_base_conn.php';



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

<!--
<h3><a href="ima.php" class="galary">Show Galary</a>
</h3>  -->


  <form action="brands.php" method="POST" enctype="multipart/form-data">
    <p>
      insert new brand <input type="file" name="file" />



<label for="Title">

  Ttitle
  <input type="text" name="Title" id="Title">
      <br>
      <br>
</label>



  <input type="submit" name="submit" value="Upload!" />
     </p>
   </form>

   <?php

  if(isset($_POST['submit']))
{


    $name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];
    $ttitle =$_POST["Title"];
  //  $pprice =  $_POST["Price"];

    require 'functions.php';

    $fileexit = isfileexit($name,"brands",$conn);

    if (!$fileexit)
         {
        	move_uploaded_file($temp,"brands/".$name);




        	$url = "http://sudan.besaba.com/brands/$name";
         	mysqli_query($conn,"INSERT INTO `brands` VALUE ('','$name','$url','$ttitle')");

            echo "<br />".$name." has been uploaded";
            header("Location: brands.php");
            unset($_POST);

             require_once('brandsjson.php');  // update the json file (brandsjson.txt)

         }
}
 $query = mysqli_query($conn,"SELECT * FROM `brands`");

echo "<table width='160' border='1' align='center'>";
while($row = mysqli_fetch_assoc($query))
{
	$id = $row['id'];
	$name = $row['name'];


$url = "http://sudan.besaba.com/brands/$name";
echo "<tr>
    <td width='152' height='150'>



      <a href='products.php?id=$id'>
               <img src='$url' width='150' height='150' alt='1' />
         </a>

<a href='viewbrand.php?id=$id'>$name</a><br />
  <a href='deletebrand.php?id=$id'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewbrand.php?id=$id'> view</a>
	 </td>";

              if($roww = mysqli_fetch_assoc($query))  {
  	$idd = $roww['id'];
	$namee = $roww['name'];

$url = "http://sudan.besaba.com/brands/$namee";

echo "
    <td width='152' height='150'>

      <a href='products.php?id=$idd'>
               <img src='$url' width='150' height='150' alt='1' />
         </a>

 <a href='watch.php?id=$idd'>$namee</a><br />
  <a href='deletebrand.php?id=$idd'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewbrand.php?id=$idd'> view</a>
    </td>";


    }

  echo "</tr>";
  echo "<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
}
echo "</table>";
?>


</body>
</html>