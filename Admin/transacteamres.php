 <?php
//include "connection.php";
include "theme/header.php";
            $mcode =$_POST['mcode'];
            $sname =$_POST['sname'];
            $stype = $_POST['stype'];
           
        

     $query = "SELECT s.sport_id,st.sport_type_code,gt.game_type_code FROM sports s,sports_type st,game_type gt WHERE st.sport_type_code = s.sport_type_code and gt.game_type_code = s.game_type_code and s.sport_code = '".$sports."'";
     $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            $sport_type = $row['sport_type_code'];
                            $game_type = $row['game_type_code'];
                        }

     $query1 = "SELECT sy_code from school_year where is_default = 'YES'";

     $result1 = mysqli_query($db, $query1) or die (mysqli_error($db));
                  
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                             
                            $sy_code = $row1['sy_code'];
                        }
                        
             switch($_GET['action']){
            case 'add':
              foreach($_POST['school'] as $value)
            {
               
                $query2 = "INSERT INTO match_schedule
                (sport_code,facilitator_code,venue_code,match_date,match_time,time_end,match_code,sy_code,school_code,sport_type_code,game_type_code,match_status)
                VALUES ('".$sports."','".$facilitator."','".$venue."','".$date."','".$start."','".$end."','".$match_code."','".$sy_code."','".$value."','".$sport_type."','".$game_type."','".$status."')";
                mysqli_query($db,$query2)or die (mysqli_error($db));

                }
            
            break;
                  
            }

             $q = "UPDATE auto_number set auto_end = auto_end+auto_increment where auto_desc = 'MATCH'";
                mysqli_query($db,$q)or die (mysqli_error($db));
           
        ?>
      <script type="text/javascript">
      alert("Successfully added.");
      window.location = "match.php";
    </script>
?>