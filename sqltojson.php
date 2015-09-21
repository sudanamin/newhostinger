<?php
    //open connection to mysql db
    $connection = mysqli_connect("mysql.hostinger.ae","u314476761_root","rootana","u314476761_image") or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    $sql = "select * from images";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
   // $emparray[] = array("images");
   $i = 0;
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray["images"][$i] = $row;
       $i++;
    }
    print_r ($emparray);
    echo json_encode($emparray);

    $fp = fopen('ima.txt', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp);

    //close the db connection
    mysqli_close($connection);
?>