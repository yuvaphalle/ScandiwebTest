<?php
    require_once('db_connection.php');
    $sku = $_POST['sku'];
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $typev = $_POST['typev'];
    print_r($_POST['typev']);

    $query="SELECT * from products";
    $result = mysqli_query($conn, $query);
    $rowcount=mysqli_num_rows($result);
    if($rowcount<12){
        $query = "INSERT INTO products (sku,name,price,type,typevalue) VALUES ('$sku','$pname','$price','$type','$typev') LIMIT 12"; 
        mysqli_query($conn , $query);
        header("Location: index.php");
        echo "Updated data successfully\n";
    }
    else{
    printf("Result set has %d rows.\n",$rowcount);
    $Message = "Max Limit ";

    header("Location: index.php?Message={$Message}");

    
    }
?>