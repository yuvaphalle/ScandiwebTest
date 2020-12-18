<?php
function getproduct()
{

    include ('db_connection.php');
    $query = "SELECT   *  from products";
    global $conn; 
    $result = mysqli_query($conn, $query);
    //displaying products avaiable
    if ($result->num_rows > 0)
    {
        // output data of each row
        while ($row = $result->fetch_assoc())
        {
            if ($row != 0)
            {
                echo '
    <div class="col">
        <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <div class="form-check">
                <input type="checkbox" class="form-check-input checks" id="checkItem"  name="check[]" value="' . $row['id'] . '"> 
            </div>
        </div>
        <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
            <li><b>' . $row['SKU'] . '</b></li>
            <li><b>' . $row['name'] . '</b></li>
            <li><b>' . $row['price'] . ' $ </b></li>
            <li><b>' . $row['type'] . ': ' . $row['typevalue'] . '</b></li>
            </ul>
        
        </div>
        </div>
    </div>
            ';

            }
        }

    }
    else
    {   
        //if no products
        echo "<centre> 0 Products </centre>";
    }

}
?>