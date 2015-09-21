<?php

require 'data_base_conn.php';


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
  //	$query = mysqli_query($conn,"SELECT * FROM `videos` WHERE id='$id'");

//   mysqli_select_db($conn,"v-u-a-p");
  if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}



//$sql = "DELETE FROM 'videos' WHERE id=$id";

    $query = mysqli_query($conn, "SELECT * FROM brands WHERE id=$id");
    $row = mysqli_fetch_assoc($query);
 	$name = $row['name'];

$retval = mysqli_query( $conn,"DELETE FROM brands WHERE id=$id" );
if(! $retval )
{
  die('Could not delete data: ' . mysql_error());
}
 unlink("uploaded/".$name);

echo $name." Deleted  successfully\n";
mysqli_close($conn);   

}




/*	while($row = mysqli_fetch_assoc($query))
	{
		$name = $row['name'];
		$url = $row['url'];
	}

	echo "You are watching ".$name."<br />";
	echo "<embed src='$url' width='560' height='315'></embed>";
}
else
{
	echo "Error!";
} */

  ?>
</body>
</html>