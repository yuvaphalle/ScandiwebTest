<?php
require_once ('db_connection.php');
//geting values from post 
$sku = $_POST['sku'];
$pname = $_POST['pname'];
$price = $_POST['price'];
$type = $_POST['type'];
$typev = $_POST['typev'];
//query to get products 
$query = "SELECT * from products";
$result = mysqli_query($conn, $query);
$rowcount = mysqli_num_rows($result);
if ($rowcount < 12) //check if the products are already 12
{
    $query = "INSERT INTO products (sku,name,price,type,typevalue) VALUES ('$sku','$pname','$price','$type','$typev') LIMIT 12";
    mysqli_query($conn, $query);
    header("Location: index.php"); //once the query is executed it redirects 
    
}
else
{
    printf("Result set has %d rows.\n", $rowcount);
    

    header("Location: index.php?Message={$Message}");

}
?>