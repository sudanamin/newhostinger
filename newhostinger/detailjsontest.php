<?php
    //open connection to mysql db
  require 'data_base_conn.php';

    //fetch table rows from mysql db
   if(isset($_GET['id']))
   {
     $product_id =$_GET['id']  ;
   }
   else {$product_id = 8;}
    $sql = "select * from detailimages where product_id = $product_id";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

    //create an array
   // $emparray[] = array("images");
   $i = 0;
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray["detailimages"][$i] = $row;
       $i++;
    }
//   print_r ($emparray);
    echo json_encode($emparray);

  /*  $fp = fopen('productsjson.txt', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp); */

    //close the db connection
    mysqli_close($conn);
?>