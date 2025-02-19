 <?php
//include "connection.php";
include "theme/header.php";
            $mtc =$_POST['mtc'];
            $sc =$_POST['sc'];
            $stc = $_POST['stc'];
            $shc = $_POST['shc'];
            $mc = $_POST['mc'];
            $spm = $_POST['spm'];
            $pc = $_POST['pc'];
            $rc = $_POST['rc'];

                foreach($_POST['mtc'] as $value)
            {
                foreach($_POST['sc'] as $value1)
            {
                foreach($_POST['stc'] as $value2)
            {
                foreach($_POST['shc'] as $value3)
            {
                foreach($_POST['mc'] as $value4)
            {
               foreach($_POST['spm'] as $value5)
            {
                foreach($_POST['pc'] as $value6)
            {
                foreach($_POST['rc'] as $value7)
            {
         
                $query2 = "INSERT INTO game_result (match_code, sport_code, sport_type_code, school_code, mode_code,score_per_mode,position_code,game_result_code) VALUES ('$value', '$value1', '$value2', '$value3', '$value4', '$value5', '$value6','$value7') ";
                mysqli_query($db,$query2)or die (mysqli_error($db));

              }
            }
          }
        }
      }
    }
  }
}
           
        ?>
      <script type="text/javascript">
      alert("Successfully added.");
      window.location = "result.php";
    </script>