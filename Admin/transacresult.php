<?php
include "includes/connection.php";
  $match_code = $_POST['mcode'];
  $sport_code = $_POST['scode'];
  $sport_type_code = $_POST['stype'];
  $school_code = $_POST['school_code'];
  $mode_code = $_POST['mode_code'];
  $score_per_mode = $_POST['score'];
  $position_code = $_POST['pos'];
  $game_result_code = $_POST['result_code'];

foreach($score_per_mode as $score)
{
       foreach($school_code as $school)
      {

     $q1 = "UPDATE game_result set school_code = '$school', score_per_mode = '$score'";
                mysqli_query($db,$q1)or die (mysqli_error($db));
    }
    }
   
                
          
      $q = "UPDATE auto_number set auto_end = auto_end+auto_increment where auto_desc = 'RESULT'";
                mysqli_query($db,$q)or die (mysqli_error($db));
           
        ?>
      <script type="text/javascript">
      alert("Successfully added.");
      //window.location = "team.php";
    </script>
    <?php
  
?>