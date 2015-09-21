<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<?php
  $conn = mysqli_connect("mysql.hostinger.ae","u314476761_root","rootana","u314476761_image") or die("Error " . mysqli_error($connection));
//$conn = mysqli_connect("127.0.0.1","root","root");
//mysqli_select_db($conn,"v-u-a-p");

?>





<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>




<?php

$query = mysqli_query($conn,"SELECT * FROM `images`");

echo "<table width='160' border='1' align='center'>";
while($row = mysqli_fetch_assoc($query))
{
	$id = $row['id'];
	$name = $row['name'];


$url = "http://sudan.besaba.com/uploaded/".$name; 
echo "<tr>
    <td width='152' height='150'><img src='$url' width='150' height='150' alt='1'/>


<a href='watch.php?id=$id'>$name</a><br />
  <a href='delete.php?id=$id'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='view.php?id=$id'> view</a>
	 </td>";

              if($roww = mysqli_fetch_assoc($query))  {
  	$idd = $roww['id'];
	$namee = $roww['name'];

$url = "http://sudan.besaba.com/uploaded/".$namee;

echo "
    <td width='152' height='150'><img src='$url' width='150' height='150' alt='1' />

 <a href='watch.php?id=$idd'>$namee</a><br />
  <a href='delete.php?id=$idd'>delete</a>
     <a style='text-decoration:none;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </a>
     <a href='view.php?id=$idd'> view</a>
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













