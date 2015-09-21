<?php
    //open connection to mysql db
  require 'data_base_conn.php';

    //fetch table rows from mysql db
   if(isset($_GET['id']))
   {
     $brand_id =$_GET['id']  ;
   }
   else {$brand_id = 7;}
    $sql = "select * from products where brands_id = $brand_id";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

    //create an array
   // $emparray[] = array("images");
   $i = 0;
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray["products"][$i] = $row;
       $i++;
    }
//   print_r ($emparray);
    echo json_encode($emparray);

    $fp = fopen('productsjson.txt', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp);

    //close the db connection
    mysqli_close($conn);
?>