<!--header area-->
<?php include 'theme/header.php'; ?>
<!--sidebar area-->
<?php include 'theme/sidebar.php'; ?>
         
   <div id="content-wrapper">

        <div class="container-fluid">
 <!--  <div class="frame1">
            <div class="box">
              <img src="img/Screenshot_2018-09-17-09-46-19_1.jpg" alt="Img" height="130" width="197">
            </div>
          </div> -->
<!--  <div>Patients Table</div> -->
<?php
$id = $_GET['tour'];
$mid = $_GET['id'];

$query = "SELECT tour_name FROM tournament WHERE tour_code = '".$id."' ";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        $row = mysqli_fetch_assoc($result);
                        $tourcode = $row['tour_name'];

$query1 = "SELECT s.sport_name,f.facilitator_name,v.place,m.match_date FROM match_schedule m,sports s,facilitator f,venue v WHERE s.sport_code = m.sport_code and f.facilitator_code = m.facilitator_code and v.venue_code = m.venue_code and m.match_code = '".$mid."' ";
                    $result1 = mysqli_query($db, $query1) or die (mysqli_error($db));
                  
                        $row1 = mysqli_fetch_assoc($result1);
                        $facilitator = $row1['facilitator_name'];
                        $sports = $row1['sport_name'];
                        $venue = $row1['place'];
                        $date = $row1['match_date'];
?>
<a href="resultdetails.php?&id=<?php echo $id; ?>" type="button" class="btn btn-lg btn-add fas fa-arrow-left bg-warning">Back</a><br><br>
 <h2 style="font-family: AR BLANCA;color: green">List of <?php echo " ".$tourcode." " ?> Tournament Competing School(s)</h2> 
 <h3>Sports:<i class="bg-info"><?php echo " ". $sports; ?></i></h3>
 <h3>Venue:<i class="bg-info"><?php echo " ". $venue; ?></i></h3>
 <h3>Facilitator:<i class="bg-info"><?php echo " ". $facilitator; ?></i></h3>
 <h3>Match Date:<i class="bg-info"><?php echo " ". $date; ?></i></h3>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Competing Schools</th>
                      <th>Final Score</th>
                      <th>Rank</th>
                    </tr>
                  </thead>
              <?php

$query = "SELECT r.game_result_code,m.match_code,r.final_score,s.school_name,p.position_name from game_result r, schools s,game_result_position p,match_schedule m where s.school_code = r.school_code and p.position_code = r.position_code and m.match_code = r.match_code and  m.match_code = '".$_GET['id']."' group by r.final_score";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                  
                            echo '<tr>';
                            echo '<td>'. $row['school_name'].'</td>';
                            
                            echo '<td>'. $row['final_score'].'</td>';
                          
                            echo '<td>'. $row['position_name'].'</td>';

                            echo '</tr>';
                          }
                


            ?> 
                </table>
              </div>
              </div>    
    <?php
 include 'theme/footer.php'; ?>