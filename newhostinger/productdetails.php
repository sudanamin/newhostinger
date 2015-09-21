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


  <form action="productdetails.php" method="POST" enctype="multipart/form-data">
    <p>
      insert new product detail images <input type="file" name="file" />


  <input type="submit" name="submit" value="Upload!" />
     </p>
   </form>

   <?php




  if(isset($_POST['submit']))
{


    $name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];
    $ttitle =$_POST["Title"];
    $pprice =  $_POST["Price"];
     echo $ttitle. "and ".$pprice;
	move_uploaded_file($temp,"details/".$name);
	$url = "http://localhost/details/$name";
   	mysqli_query($conn,"INSERT INTO `detailimages` VALUE ('','$name','$url')");

       echo "<br />".$name." has been uploaded";
        header("Location: productdetails.php");
       unset($_POST);

}

    if (isset($_GET['id']))
   {
       $product_id = $_GET['id'];
       $query = mysqli_query($conn,"SELECT * FROM `detailimages` where product_id =$product_id");

echo "<table width='160' border='1' align='center'>";
while($row = mysqli_fetch_assoc($query))
{
	$id = $row['id'];
	$name = $row['name'];


$url = "http://localhost/details/".$name;
echo "<tr>
    <td width='152' height='150'>





<a href='viewdetail.php?id=$id'>$name</a><br />
  <a href='delete_product_detail_images.php?id=$id'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewdetail.php?id=$id'> view</a>
	 </td>";

              if($roww = mysqli_fetch_assoc($query))  {
  	$idd = $roww['id'];
	$namee = $roww['name'];

$url = "http://localhost/details/".$namee;

echo "
    <td width='152' height='150'>



 <a href='viewdetail.php?id=$idd'>$namee</a><br />
  <a href='delete_product_detail_images.php?id=$idd'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewdetail.php?id=$idd'> view</a>
    </td>";


    }

  echo "</tr>";
  echo "<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
}
echo "</table>";
   }
   else {
 $query = mysqli_query($conn,"SELECT * FROM `detailimages`");

echo "<table width='160' border='1' align='center'>";
while($row = mysqli_fetch_assoc($query))
{
	$id = $row['id'];
	$name = $row['name'];


$url = "http://localhost/details/".$name;
echo "<tr>
    <td width='152' height='150'>





<a href='viewdetail.php?id=$id'>$name</a><br />
  <a href='delete_product_detail_images.php?id=$id'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewdetail.php?id=$id'> view</a>
	 </td>";

              if($roww = mysqli_fetch_assoc($query))  {
  	$idd = $roww['id'];
	$namee = $roww['name'];

$url = "http://localhost/details/".$namee;

echo "
    <td width='152' height='150'>



 <a href='viewdetail.php?id=$idd'>$namee</a><br />
  <a href='delete_product_detail_images.php?id=$idd'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewdetail.php?id=$idd'> view</a>
    </td>";


    }

  echo "</tr>";
  echo "<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
}
echo "</table>";
}

?>

<?php
    if(isset($_POST['submit_details']))
   {
      $ttitle =$_POST["Title"];
    $pprice =  $_POST["Price"];
       $size =$_POST["size"];
    $pprice =  $_POST["desctiption"];


     echo $ttitle. "and ".$pprice;

   	mysqli_query($conn,"INSERT INTO `details` VALUE ('','$Title','$Price','$size','$desctiption')");

       echo "<br />".$name." has been uploaded";
        header("Location: productdetails.php");
       unset($_POST);
   }
?>


      <form action="<?php $_PHP_SELF ?>" method="POST">
         title: <input type="text" name="title" />
         price: <input type="text" name="price" />
           size: <input type="text" name="size" />
         Description: <input type="textarea" name="desctiption" />
         <input type="submit name=submit_details" />
      </form>




</body>
</html>