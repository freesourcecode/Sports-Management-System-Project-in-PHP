<?php 
	
	// including db config file
	include_once './config/db-config.php';

	// including import controller file
	include_once './controllers/import-controller.php';

	// creating object of DBController class
	$db              =    	new DBController();

	// calling connect() function using object
    $conn            =    	$db->connect();

    // creating object of import controller and passing connection object as a parameter
	$importCtrl      =    	new ImportController($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Import CSV in PHP </title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<form method="post" enctype="multipart/form-data">
			<div class="row mt-5">
				<div class="col-md-6 m-auto border shadow">
					<label> Import Data </label>
						<div class="form-group">					
							<input type="file" name="file" class="form-control">
						</div>
						<div class="form-group">
							<button type="submit" name="import" class="btn btn-success"> Import Data </button>
						</div>				
				</div>		
			</div>

			<div class="row mt-4">
				<div class="col-md-10 m-auto">
					<?php

						$importResult   =  $importCtrl->index(); 	
											
					?>
				</div>
			</div>	
		</form>
	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>