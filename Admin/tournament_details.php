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
$id = $_GET['id'];

$query = 'SELECT tour_name FROM tournament WHERE tour_code = "'.$id.'"';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['tour_name'];
?>
<a href="match.php" type="button" class="btn btn-lg btn-add fas fa-arrow-left bg-warning">Back</a><br><br>
 <h2 style="font-family: AR BLANCA">List of <?php echo " ".$name." "; ?> Game Schedule(s)<a href="addsched.php?&id=<?php echo $id; ?>" type="button" class="btn btn-lg btn-add">New</a></h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tornament Type</th>
                      <th>Sports</th>
                      <th>Facilitator</th>
                      <th>Venue</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Time End</th>
                      <th>Status</th>
                      <th>Options</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT m.match_id,m.tour_code,t.tour_name,m.match_code,tt.type,s.sport_name,m.match_date,m.match_time,m.time_end,m.match_status,f.facilitator_name,v.place from match_schedule m,sports s,facilitator f,venue v,tournament t,tournament_type tt where s.sport_code = m.sport_code and f.facilitator_code = m.facilitator_code and v.venue_code = m.venue_code and t.tour_code = m.tour_code and tt.type_code = m.type_code and m.tour_code = "'.$_GET['id'].'" group by m.match_code ';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['type'].'</td>';
                              echo '<td>'. $row['sport_name'].'</td>';
                               echo '<td>'. $row['facilitator_name'].'</td>';
                                echo '<td>'. $row['place'].'</td>';
                                 echo '<td>'. $row['match_date'].'</td>';
                                  echo '<td>'. $row['match_time'].'</td>';
                                   echo '<td>'. $row['time_end'].'</td>';
                                      echo '<td>'. $row['match_status'].'</td>';
                            echo '<td><a  type="button" class="btn btn-sm btn-success fas fa-trophy" href="competing_schools.php?& id='.$row['match_code'] . '&tour='.$id.'">Competing Schools</a></td> ';
                            echo '</tr>';
                }
            ?> 
                </table>
              </div>
              </div>       
<?php include 'theme/footer.php'; ?>