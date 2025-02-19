<?php 
session_start();
include('includes/connection.php');
	
	$query = mysqli_query($con,"select * from match_schedule group by match_code") or die(mysqli_error($db));

	$category = array();
	//$category['name'];

	$series1 = array();
	$series1['name'] = 'Match Schedule';
$amount =0;
	while($r = mysqli_fetch_array($query)) {
		$school = $r['school_code'];
	    //$count=$r['total'];
	  

}

  $category['name'][] =$r['match_date'];
	    $category['data'][] =$r['match_date'];
	    $series1['data'][] = $school;
	    
$result = array();
array_push($result,$category);
array_push($result,$series1);
//array_push($result,$series2);

print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);

?> 
