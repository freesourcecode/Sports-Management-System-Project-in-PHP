<?php include '../theme/header.php'; ?>
<!--sidebar area-->
<?php include '../theme/sidebar.php'; ?>

<?php include '../theme/breadcrumbs.php'; ?>
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
	<?php include '../theme/footer.php'; ?>