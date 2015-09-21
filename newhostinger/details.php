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


  <form action="details.php" id = "detialform" method="POST" enctype="multipart/form-data">
   <input type="submit" name="submit" value="add prouct details!" />
    <p>


          insert new product detail
          <br>
          <br>

          <label for="Title">
          Title
                <input type="text" name="title" id="title">
          <br>
          <br>
          </label>

     <!--     <label for="description">
          Description
          <input type="textarea" rows="5" name="desctiption" id="description">
          <br>
          <br>
          </label>   -->

          <label for="price">
          price
          <input type="text" name="price" id="price">
          <br>
          <br>
          </label>

          <label for="size">
          size
          <input type="text" name="size" id="size">
          <br>
          <br>
          </label>
          <p>

  </p>
   </form>
      <p>
  Desctiption :
      </p>
  <textarea form ="detialform" name="description" id="description" rows = "4" cols="35" wrap="soft"></textarea>

       <br>
       <br>
       <br>
       <br>


  <form action="details.php" method="POST" enctype="multipart/form-data">
    <p>
      insert new product detail images <input type="file" name="file" />


  <input type="submit" name="submit_image" value="Upload!" />
     </p>
   </form>
   <?php



         if(isset($GET['id']))
   {
      $product_id = $GET['id'];
   }
      else {
    $product_id = 8;     }

   ///////////////////////////   submit_image ///////////////////////////////






     if(isset($_POST['submit_image']))
{


    $name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];
 //   $ttitle =$_POST["Title"];
  //  $pprice =  $_POST["Price"];
 //    echo $ttitle. "and ".$pprice;
       require 'functions.php';

    $fileexit = isfileexit($name,"detailimages",$conn);

    if (!$fileexit)
         {


	move_uploaded_file($temp,"details/".$name);
   $url = "http://sudan.besaba.com/details/$name";
   	mysqli_query($conn,"INSERT INTO `detailimages` VALUE ('','$product_id','$name','$url')");

       echo "<br />".$name." has been uploaded";
        header("Location: details.php");
       unset($_POST);

        require_once('detailimagesjson.php');  // update the json file (detailimagesjson.txt)

}
}

/////////////////////////// end of  submit_image /////////////////////////////////


///////////////////////////     submit details title description price size /////////////

 if(isset($_POST['submit']))




{
	$title = $_POST['title'];
   	$description = $_POST['description'];
    $price = $_POST['price'];
    $size = $_POST['size'];

	mysqli_query($conn,"INSERT INTO `details` VALUE ('','$product_id','$title','$description','$price','$size')");

    header("Location: details.php");
       unset($_POST);

        require_once('detailsjson.php');  // update the json file (detailsjson.txt)
}

    //////////////////////////////// end of details submit ///////////////////////////




    ////////////////////////////////////////////////////////////////////////////////////////////////////





/////////////////////////////// detail view ////////////////////////////
  // $product_id = 8;
  $query = mysqli_query($conn,"SELECT * FROM `details` where product_id = $product_id");
    $row = mysqli_fetch_assoc($query);
echo "<table width='160' border='1' align='center'>";

	$id = $row['id'];
	$product_id = $row['product_id'];
    $title = $row['title'];
    $description = $row['description'];
    $price =  $row['price'];
    $size = $row['size'];



echo "<tr>
    <td width='152' height='150'>
     id = $id
     <br>
     <br>
     product_id = $product_id
     <br>
     <br>
     title = $title
     <br>
     <br>
     desctiption =$description
     <br>
     <br>
     price = $price
     <br>
     <br>
     size = $size
     <br>
     <br>
	 </td>";
//////////////////////////  detail view //////////////////////////


/////////////////////detail image view ///////////////////////////


//   if (isset($_GET['id']))
 //  {
    //   $product_id = $_GET['id'];
       $query = mysqli_query($conn,"SELECT * FROM `detailimages` where product_id =$product_id");

echo "<table width='160' border='1' align='center'>";

while($row = mysqli_fetch_assoc($query))
{
	$id = $row['id'];
  	$name = $row['name'];


$url = $row['url'];
echo "<tr>


    <td width='152' height='150'><img src='$url' width='150' height='150' alt='1'/>





<a href='viewdetail.php?id=$id'>$name</a><br />
  <a href='delete_product_detail_images.php?id=$id'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='viewdetail.php?id=$id'> view</a>
	 </td>";

              if($roww = mysqli_fetch_assoc($query))  {
  	$idd = $roww['id'];
     $namee = $roww['name'];

$url  	 = $roww['url'];

echo "
    <td width='152' height='150'><img src='$url' width='150' height='150' alt='1'/>



 <a href='viewdetail.php?id=$idd'>$name</a><br />
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





   ?>


</body>
</html>


