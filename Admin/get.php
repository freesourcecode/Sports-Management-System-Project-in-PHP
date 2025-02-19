
<?php include 'theme/header.php'; ?>
<!--sidebar area-->
<?php include 'theme/sidebar.php'; ?>

<?php include 'theme/breadcrumbs.php'; 

$update = "UPDATE `messagein` SET `Status` = 'SEEN'  where Id = '".$_GET['id']."' ";
 mysqli_query($db,$update)or die (mysqli_error($db));

$query = "SELECT Id,MessageText,MessageFrom FROM `messagein` where Id = '".$_GET['id']."' ";
               $result = mysqli_query($db,$query);
               
                while($row = mysqli_fetch_array($result)){
                  
                
$fp = fopen("smsResult/".$row["MessageFrom"]."_".$row["Id"].".txt", 'w');
$data = fwrite($fp,$row['MessageText']);


$fileName         =        "";

        	// if there is any file
	      

	        	// reading tmp_file name
$fileName     =        $fp;
	        

			$counter          =        0;	 


			// if file size is not empty
	        if ($fileName > 0) {   

		        $file       =  fopen("smsResult/".$row["MessageFrom"]."_".$row["Id"].".txt", "r");			        
		        
		        // eliminating the first row of CSV file
			      ?>
			      <form method="post" action="#">
			      <div class="card-body">
              <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			    	<thead>
			    		<th> ID </th>
			    		<th> Match Code </th>
			    		<th> Sports Code </th>
			    		<th> Sport Type Code </th>
			    		<th> School Code </th>
			    		<th> Final Score </th>
			    		<th> Position Code </th>
			    		<th> Result Code </th>
			    		<th> Status </th>
			    	</thead>
			    
			    <?php

			    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) { 
			            $counter++;	   
                       
			            // assigning csv column to a variable
	        	 		$mtc      =       $column[0];

	        	 		$sc         	   =       $column[1];
	        	 		
	        	 		$stc             =       $column[2];
	        	 		
	        	 		$shc		   =	   $column[3];
	        	 		
	        	 		$fs    =	   $column[4];

	        	 		
	        	 		$pc           =       $column[5];
	        	 		
	        	 		$rc		   =	   $column[6];

	   if($mtc == '' || $sc == '' || $stc == '' || $shc == '' || $mc == '' || $spm == '' || $pc == '' || $rc == '' ){

	   $update = "UPDATE `messagein` SET `Status` = 'DELETE'  where Id = '".$_GET['id']."' ";
       mysqli_query($db,$update)or die (mysqli_error($db));
	?>
      <script type="text/javascript">
      alert("Message is Not Organized!.");
      window.location = "index.php";
    </script>
    <?php
   
}

	        	 		
?>
	        	 		<tr>
									<td> <?php echo $counter; ?> </td>
									<td> <input type="text" class="form-control" name="mtc" value="<?php echo $mtc; ?>"> </td>
									<td> <input type="text" class="form-control" name="sc" value="<?php echo $sc; ?>"> </td>
									<td> <input type="text" class="form-control" name="stc" value="<?php echo $stc; ?>"> </td>
									<td> <input type="text" class="form-control" name="shc" value="<?php echo $shc; ?>"> </td>
									<td> <input type="text" class="form-control" name="fs" value="<?php echo $fs; ?>"> </td>
									<td> <input type="text" class="form-control" name="pc" value="<?php echo $pc; ?>"> </td>
									<td> <input type="text" class="form-control" name="rc" value="<?php echo $rc; ?>"> </td>
	     							<td> <?php echo "<label class='text-success'>Success </label> " .date('d-m-Y H:i:s');?> </td>
			</tr>
			<?php
if(isset($_POST['submit'])){
	$sql = "INSERT INTO game_result (match_code, sport_code, sport_type_code, school_code,final_score,position_code,game_result_code) VALUES ('$mtc', '$sc', '$stc', '$shc', '$fs', '$pc','$rc') ";

 mysqli_query($db,$sql)or die (mysqli_error($db));

 $update = "UPDATE `messagein` SET `Status` = 'SAVE'  where Id = '".$_GET['id']."' ";
 mysqli_query($db,$update)or die (mysqli_error($db));
  ?>
      <script type="text/javascript">
      alert("Successfully added.");
      window.location = "result.php";
    </script>
    <?php
}
if(isset($_POST['delete'])){
	$update = "UPDATE `messagein` SET `Status` = 'DELETE'  where Id = '".$_GET['id']."' ";
 mysqli_query($db,$update)or die (mysqli_error($db));
  ?>
      <script type="text/javascript">
      alert("Successfully Deleted.");
      window.location = "result.php";
    </script>
    <?php
}
}
}
?>
			</table>		
			</div>
		</div>
				<button type="submit" class="btn btn-lg bg-success" name="submit">Save to Database</a></button>	
				<button type="delete" class="btn btn-lg bg-danger" name="delete">Delete</a></button>	
			</form>
<?php

}
	        	 		fclose($fp);

include 'theme/footer.php'; ?>