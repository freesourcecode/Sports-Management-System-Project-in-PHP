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
			    		<th> ID </th>
			    		<th> Match Code </th>
			    		<th> Sports Code </th>
			    		<th> Sport Type Code </th>
			    		<th> School Code </th>
			    		<th> Mode Code </th>
			    		<th> Score Per Mode </th>
			    		<th> Position Code </th>
			    		<th> Result Code </th>
			    	</thead>
			        
		        <?php 
		        	while (($column = fgetcsv($file, 10000, ",")) !== FALSE) { 

			            $counter++;	   

			            // assigning csv column to a variable
	        	 		$mtc      =       $column[0];

	        	 		$sc         	   =       $column[1];
	        	 		
	        	 		$stc             =       $column[2];
	        	 		
	        	 		$shc		   =	   $column[3];
	        	 		
	        	 		$mc    =	   $column[4];

	        	 		$spm        	   =       $column[5];
	        	 		
	        	 		$pc           =       $column[6];
	        	 		
	        	 		$rc		   =	   $column[7];
	        	 		
	        	 		
	                	// inserting values into the table
	                	$sql 				=		"INSERT INTO game_result (match_code, sport_code, sport_type_code, school_code, mode_code,score_per_mode,position_code,game_result_code) VALUES ('$mtc', '$sc', '$stc', '$shc', '$mc', '$spm', '$pc','$rc') ";
	                	$result 			=		$this->conn->query($sql);

	                	if($result == 1): ?>                		
	                    		<tr>
									<td> <?php echo $counter; ?> </td>
									<td> <?php echo $mtc; ?> </td>
									<td> <?php echo $sc; ?> </td>
									<td> <?php echo $stc; ?> </td>
									<td> <?php echo $shc; ?> </td>
									<td> <?php echo $mc; ?> </td>
									<td> <?php echo $spm; ?> </td>
									<td> <?php echo $pc; ?> </td>
									<td> <?php echo $rc; ?> </td>
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