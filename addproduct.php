    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Junior Developer Test Task</title>
        <link rel="shortcut icon" href="assets/logo.png">
        
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/d3js/6.2.0/d3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body >
       
        
        <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-1 bg-white border-bottom shadow-sm fixed-top">
            <p class="h2 my-0 me-md-auto fw-normal"><b>Product Add</b></p>
            <?php
                require_once('db_connection.php');
                global $conn;
                $query="SELECT * from products";
                $result = mysqli_query($conn, $query);
                $rowcount=mysqli_num_rows($result); 
                if ($rowcount >= 12) {
                echo
                '<div class="alert alert-danger mb-0" role="alert">
                        Max Limit!! Please Delete Some Old Products To Add New
                </div>';
                }
            ?>
            <nav class="navbar navbar-expand-lg navbar-light  ">
                <div class="container-fluid ">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <br>
                        <!-- Button Validation to avoid entries more than!-->
                        <button class="btn btn-outline-success " type="submit" 
                        <?php  
                            require_once('db_connection.php');
                            $query="SELECT * from products";
                            $result = mysqli_query($conn, $query);
                            $rowcount=mysqli_num_rows($result); 
                            if ($rowcount >= 12) { ?> disabled <?php   }  ?> 
                            form="addproduct" ><b>Save</b></button> &nbsp;&nbsp;
                        <!-- Cancel Button!-->
                        <button class="btn btn-outline-danger "  onclick="window.location.href='index.php'"><b>Cancel</b></button>&nbsp;&nbsp;
                    </div>
                    
            </div>
            </nav>
            
        </header>
    <br><br><br><br><br><br>
    <main class="container " >

    <form id="addproduct" method="post" action="addproducts.php">
    <div class="form-group row">
        <label  class="col-sm-2 col-form-label"><b>SKU</b></label>
        <div class="col-sm-3">
        <input type="text" class="form-control mb-4" id="sku" name="sku" placeholder="SKU" required>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><b>Name</b></label>
        <div class="col-sm-3">
        <input type="text" class="form-control mb-4" id="name" name="pname" placeholder="Name" required>
        </div>
    </div>

    <div class="form-group row">
        <label  class="col-sm-2 col-form-label"><b>Price ($)</b></label>
        <div class="col-sm-3">
        <input type="number" class="form-control mb-4" id="price" name="price" placeholder="Price ($)" required step="0.1" min="0.1" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189"">
        </div>
    </div>

    <div class="form-group row">
        <label  class="col-sm-2 col-form-label"><b>Type Switcher</b></label>
        <div class="col-sm-4">
            
            <select class="form-group" id = "type" name="type" required >
                <option disabled selected value><b>Type Switcher</b></option>
                <option value="Size" id ="Size"><b>Size (MB)</b></option>
            
                <option value="Dimension" id="Dimension"><b>Dimension (CM)</b></option>
                <option value="Weight" id="Weight"><b>Weight (KG)</b></option>
            </select>
        </div>
    </div>

    <script>
        $(document).ready(function(){ //script for on select option 
            $("select").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){ 
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                        $(".rem").not("." + optionValue).removeAttr('required').val(""); //removes required attribute from the feilds which are hidden
                    }
                    else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
        </script>
    <br>

    <div class="form-group row Size box">
        <label  class="col-sm-2 col-form-label"><b>Size (MB)</b></label>
        <div class="col-sm-3">
        <input type="number" class="form-control mb-4 Size rem" id="size" name="size" placeholder="Size in MB" required step="0.1" min="0.1"  onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189"">
        <center><small><i>**Please provide size in MB format**</i></small></center>  
        </div>
    </div>
  
    <div class="form-group row Dimension box">
        <label  class="col-sm-2 col-form-label"><b>Height (CM)</b></label>
        <div class="col-sm-3">
        <input type="number" class="form-control mb-4 Dimension rem" id="height" name="height" placeholder="Height in (CM)" required step="0.1" min="0.1" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189"">
        </div>
    </div>
    <div class="form-group row Dimension box">
        <label  class="col-sm-2 col-form-label"><b>Width (CM)</b></label>
        <div class="col-sm-3">
        <input type="number" class="form-control mb-4 Dimension rem" id="width" name="width" placeholder="Width in (CM)" required step="0.1" min="0.1"  onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189"">
        </div>
    </div>
    <div class="form-group row Dimension box">
        <label  class="col-sm-2 col-form-label"><b>Length (CM)</b></label>
        <div class="col-sm-3">
        <input type="number" class="form-control mb-4 Dimension rem" id="length" name="length" placeholder="Length in (CM)" required step="0.1" min="0.1" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189">
        <center><small><i>**Please provide dimensions in  H x W x L format**</i></small></center>
        </div>
    </div>
    <div class="form-group row Weight box">
        <label  class="col-sm-2 col-form-label"><b>Weight (KG)</b></label>
        <div class="col-sm-3">
        <input type="number" class="form-control mb-4 Weight rem" id="weight" name="weight" placeholder="Weight in (KG)" required step="0.1" min="0.1" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189">
        <center><small><i>**Please provide weight in  KG format**</i></small></center>
        </div>
    </div>

   
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  
        //if type is size
        $("#size").on("keyup", function(){
            $("#typev").val($("#size").val() + " MB");    
        });

        //if type is dimentions
        $("#height, #width , #length").on("keyup", function(){
            $("#typev").val($("#height").val() + "x" + $("#width").val()+ "x" + $("#length").val()+ $("#size").val()+ $("#width").val());
        });

        //if type is weight
        $("#typev").on("keyup", function(){
            $("#typev").val($("#weight").val() + "KG" );
        });

</script>


    <input type="text" class="form-control mb-4 " id="typev"   hidden name="typev"  >

</div>  
    </form>
    </div>

    </<br>
            <footer class="pt-4 my-md-5 pt-md-4 border-top fixed-bottom " >
                <center><b>Scandiweb Test assignment</b></center>
            </footer>




        </main>
    </body>
    </html>
