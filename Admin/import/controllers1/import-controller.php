<?php

	class ImportController {

		// getting connection in constructor
		function __construct($conn) {

			$this->conn 		 =		 $conn;

		}


		// function for reading csv file
		public function index() {

        	$fileName         =        "";

        	// if there is any file
	        if(isset($_FILES['file'])){

	        	// reading tmp_file name
	    		$fileName     =        $_FILES["file"]["tmp_name"];
	        }

			$counter          =        0;	 


			// if file size is not empty
	        if (isset($_FILES["file"]) && $_FILES["file"]["size"] > 0) {   

		        $file       =  fopen($fileName, "r");			        
		        
		        // eliminating the first row of CSV file
			    fgetcsv($file);  ?>

			    <table class="table">
			    	<thead>
			    		<th> Sl </th>
			    		<th> Name </th>
			    		<th> Age </th>
			    		<th> Course </th>
			    		<th> Address </th>
			    		<th> Gender </th>
			    		<th> School Code </th>
			    		<th> Sport Code </th>
			    		<th> contact </th>
			    		<th> Player Code </th>
			    		<th> Response </th>
			    	</thead>
			        
		        <?php 
		        	while (($column = fgetcsv($file, 10000, ",")) !== FALSE) { 

			            $counter++;	   

			            // assigning csv column to a variable
	        	 		$name      =       $column[0];

	        	 		$age         	   =       $column[1];
	        	 		
	        	 		$course             =       $column[2];
	        	 		
	        	 		$address		   =	   $column[3];
	        	 		
	        	 		$gender    =	   $column[4];

	        	 		$school      =       $column[5];

	        	 		$sport        	   =       $column[6];
	        	 		
	        	 		$contact            =       $column[7];
	        	 		
	        	 		$player		   =	   $column[8];
	        	 		
	                

	                	// inserting values into the table
	                	$sql 				=		"INSERT INTO players (player_name,player_age,player_course,player_address,player_gender,school_code,sport_code,contact,player_code) VALUES ('$name', '$age', '$course', '$address', '$gender','$school','$sport','$contact','$player') ";
	                	$result 			=		$this->conn->query($sql);

	                	if($result == 1): ?>                		
	                    		<tr>
									<td> <?php echo $counter; ?> </td>
									<td> <?php echo $name ?> </td>
									<td> <?php echo $age; ?> </td>
									<td> <?php echo $course; ?> </td>
									<td> <?php echo $address; ?> </td>
									<td> <?php echo $gender; ?> </td>
									<td> <?php echo $school; ?> </td>
									<td> <?php echo $sport; ?> </td>
									<td> <?php echo $contact; ?> </td>
									<td> <?php echo $player; ?> </td>
	     							<td> <?php echo "<label class='text-success'>Success </label> " .date('d-m-Y H:i:s');?> </td>
								</tr>
	                	<?php endif;
				}
				 ?>
				</table>

				<?php
			}

		else{
		}
	}	

}

?>