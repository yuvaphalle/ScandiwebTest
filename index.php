<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Junior Developer Test Task</title>
	<link rel="shortcut icon" href="assets/logo.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<style>
	.modal {
		overflow-y: auto;
	}
	</style>
</head>

<body>
	<form name="index" method="post" action="">
		<!-- nav bar-->
		<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-1 bg-white border-bottom shadow-sm fixed-top">
			<p class="h2 my-0 me-md-auto fw-normal"><b>Product List</b></p>
			<nav class="navbar navbar-expand-lg navbar-light  ">
				<div class="container-fluid ">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<br>
						<a href="addproduct.php">
							<button class="btn btn-outline-success " type="button"><b>ADD</b></button>
						</a> &nbsp;&nbsp;
						<script>
						$(document).ready(function() {
							$('#myCheckbox').click(function() {
								$('#delete').prop("disabled", !$("#myCheckbox").prop("checked"));
							})
						});
						</script>
						<button class="btn btn-outline-danger " type="delete" id="delete" name="save"><b>MASS DELETE</b></button>&nbsp;&nbsp; </div>
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				
				</div>
			</nav>
		</header>
		<!-- nav bar ends here-->
		<br>
		<br>
		<br>
		<br>
		<br>
		<main class="container ">
			<!-- main body cards-->
			<div class="row row-cols-1 row-cols-md-4 mb-3 text-center ">
				<?php 
			
			

            require_once("getproduct.php");
			getproduct();

            if(isset($_POST['save'])){
                global $conn;
                require_once('db_connection.php');
                $checkbox = $_POST['check'];
                for($i=0;$i<count($checkbox);$i++){
                $del_id = $checkbox[$i]; 
                $query = "DELETE FROM products  WHERE id='".$del_id."'";
                mysqli_query($conn,$query);
                echo "<script> location.href = 'index.php';</script>";
            }
            }
         ?>
			</div>
			<!-- Disable Delete Button-->
			<script>
			$('#delete').prop("disabled", true);
			$('input:checkbox').click(function() {
				if($(this).is(':checked')) {
					$('#delete').prop("disabled", false);
				} else {
					if($('.checks').filter(':checked').length < 1) {
						$('#delete').attr('disabled', true);
					}
				}
			});
			</script>
	</form>
	<!-- main body cards end here-->
	<br>
	<footer class="pt-4 my-md-5 pt-md-4 border-top fixed-bottom ">
		<center><b>Scandiweb Test assignment</b></center>
	</footer>
	</main>
</body>

</html>