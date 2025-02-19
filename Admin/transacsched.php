 <?php
//include "connection.php";
include "theme/header.php";
            $sports =$_POST['sports'];
            $venue =$_POST['venue'];
            $facilitator = $_POST['facilitator'];
            $date = $_POST['date'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $match_code = $_POST['match_code'];
            $status = $_POST['status'];
            $type = $_POST['type'];
            $tname = $_POST['tname'];
            //$id = $_POST['id'];
        

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
                (type_code,tour_code,sport_code,facilitator_code,venue_code,match_date,match_time,time_end,match_code,sy_code,school_code,sport_type_code,game_type_code,Is_have_result,match_status)
                VALUES ('".$type."','".$tname."','".$sports."','".$facilitator."','".$venue."','".$date."','".$start."','".$end."','".$match_code."','".$sy_code."','".$value."','".$sport_type."','".$game_type."','NO','".$status."')";
                mysqli_query($db,$query2)or die (mysqli_error($db));
            }
            break;
                  
            }

             $q = "UPDATE auto_number set auto_end = auto_end+auto_increment where auto_desc = 'MATCH'";
                mysqli_query($db,$q)or die (mysqli_error($db));

             $v = "UPDATE venue set venue_status = 'Unavailable' where venue_code = '".$venue."'";
                mysqli_query($db,$v)or die (mysqli_error($db));

             $f = "UPDATE facilitator set facilitator_status = 'Unavailable' where facilitator_code = '".$facilitator."'";
                mysqli_query($db,$f)or die (mysqli_error($db));
           
        ?>
      <script type="text/javascript"> 
      alert("Successfully added.");
      window.location = "tournament_details.php?&id=<?php echo $tname;?>";
    </script>
?>