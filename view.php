<?php

 $conn = mysqli_connect("mysql.hostinger.ae","u314476761_root","rootana","u314476761_image") or die("Error " . mysqli_error($connection));

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>image delete from mysql</title>
</head>

<body>

<?php

if(isset($_GET['id']))
{
	$id = $_GET['id'];

 //  mysqli_select_db($conn,"v-u-a-p");
  if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$query = mysqli_query($conn, "SELECT * FROM images WHERE id=$id");

//while($row = mysqli_fetch_assoc($query))

//{

    $row = mysqli_fetch_assoc($query);
	$id = $row['id'];
	$name = $row['name'];
    $url =  $row['url'];


	echo "<img src='$url'  alt='1'/>";
//}

echo "<p> $id  <p> ";
echo "<p> $name <p> ";
echo "<p> $url <p> ";
mysqli_close($conn);

}

  ?>
</body>
</html>