<?php

require 'data_base_conn.php';
$connn = mysqli_connect("mysql.hostinger.ae","u314476761_aminn","rootana","u314476761_babym") or die("Error " . mysqli_error($connection));


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
      <?php

   if(isset($_GET['id']))
   {
      $brand_id = $_GET['id'];
 }
 ?>
  //     else {
  //  $brand_id = 8;    }

    // echo $brand_id;
  <form action="products.php?id=<?php echo htmlspecialchars($brand_id);?>" method="POST" enctype="multipart/form-data">
    <p>
      insert new product <input type="file" name="file" />



<label for="Title">

  Ttitle
  <input type="text" name="Title" id="Title">
      <br>
      <br>
</label>

  <label for="Price">Price
      <input type="text" name="Price" id="Price">
</label>

  <input type="submit" name="submit" value="Upload!" />
     </p>
   </form>

   <?php

//   if(isset($_GET['id']))
  // {
  //   $brand_id = $_GET['id'];
//   }
  //     else {
  //  $brand_id = 8;    }

  if(isset($_POST['submit']))
{


    $name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];
    $ttitle =$_POST["Title"];
    $pprice =  $_POST["Price"];
     echo $ttitle. "and ".$pprice;

       require 'functions.php';

    $fileexit = isfileexit($name,"products",$conn);

   // if (!$fileexit)
   if(true)
         {

	move_uploaded_file($temp,"products/".$name);
   $url = "http://sudan.besaba.com/products/$name";
   	mysqli_query($conn,"INSERT INTO `products` VALUE ('',$brand_id,'$name','$url','$ttitle','$pprice')");

       echo "<br />".$name." has been uploaded";
  //      header("Location: products.php");
    //    unset($_POST);

        require_once('productsjson.php');  // update the json file (productsjson.txt)

}
}

    ////////   if come from brand ////////////////////
if(isset($_GET['id']))
{

  $brand_id = $_GET["id"];
  echo "come from brand brand id = ".$brand_id;
  $query = mysqli_query($connn,"SELECT * FROM `products` where brands_id = $brand_id");

echo "<table width='160' border='1' align='center'>";
while($row = mysqli_fetch_assoc($query))
{
	$id = $row['id'];
	$name = $row['name'];
    $brand_id = $row['brand_id'];


 $url = 'http://sudan.besaba.com/products/'.$name;
echo "<tr>
    <td width='152' height='150'>



      <a href='details.php?id=$id'>
               <img src='$url' width='150' height='150' alt='1' />
         </a>

<a href='viewproduct.php?id=$id'>$name</a><br />
  <a href='deleteproduct.php?id=$id'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewproduct.php?id=$id'> view</a>
	 </td>";

              if($roww = mysqli_fetch_assoc($query))  {
  	$idd = $roww['id'];
	$namee = $roww['name'];
     $brand_id = $row['brand_id'];

$url = 'http://sudan.besaba.com/products/'.$namee;

echo "
    <td width='152' height='150'>

   <a href='details.php?id=$idd'>
               <img src='$url' width='150' height='150' alt='1' />
         </a>

 <a href='viewproduct.php?id=$idd'>$namee</a><br />
  <a href='deleteproduct.php?id=$idd'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewproduct.php?id=$idd'> view</a>
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
                  //////////// if not come from brand //////////////////

else {
 $query = mysqli_query($connn,"SELECT * FROM `products`");

echo "<table width='160' border='1' align='center'>";
 /*if(empty(mysqli_query($conn,$query)))
{
     echo "can not execute query"; // can use anything as a friendly error
}  */

while($row = mysqli_fetch_assoc($query))
{
	$id = $row['id'];
     $brand_id = $row['brand_id'];
	$name = $row['name'];



$url = "http://sudan.besaba.com/products/$name";
echo "<tr>
    <td width='152' height='150'>



      <a href='productdetails.php?id=$id'>
               <img src='$url' width='150' height='150' alt='1' />
         </a>

<a href='viewproduct.php?id=$id'>$name</a><br />
  <a href='deleteproduct.php?id=$id'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewproduct.php?id=$id'> view</a>
	 </td>";

              if($roww = mysqli_fetch_assoc($query))  {
  	$idd = $roww['id'];
	$namee = $roww['name'];
     $brand_id = $row['brand_id'];

$url = "http://sudan.besaba.com/products/$namee";

echo "
    <td width='152' height='150'>

   <a href='productdetails.php?id=$idd'>
               <img src='$url' width='150' height='150' alt='1' />
         </a>

 <a href='viewproduct.php?id=$idd'>$namee</a><br />
  <a href='deleteproduct.php?id=$idd'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewproduct.php?id=$idd'> view</a>
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

 //mysqli_close($conn);
  // unset($conn);
?>


</body>
</html>