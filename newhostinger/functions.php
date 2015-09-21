    ////// chech file exits  ////////
    <?php
 function isfileexit($file_name,$tablename,$conn)
 {
    $isfileexit = FALSE;

    $con = $conn;
    $query = mysqli_query($con,"SELECT * FROM `$tablename`");
    while($row = mysqli_fetch_assoc($query))
    {
	$id = $row['id'];
	if($file_name == $row['name'])
         {
       $isfileexit = ture;
       echo "file name already exist ";
         }
    }

    return  $isfileexit;
}

   ?>