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
 <h2>List of Game Result(s)<a href="addsingleresult.php" type="button" class="btn btn-lg btn-add fas fa-plus"></a></h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Match Code</th>
                      <th>Status</th>
                      <th>Sports</th>
                      <th>Schools Competing</th>
                      <th>Score per Mode</th>
                      <th>Options</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT r.game_result_code,m.match_code,m.match_status,s.sport_name,sc.school_name,concat(md.mode_name ," ", r.score_per_mode) as "SCORE",st.sport_type from game_result r,match_schedule m,sports s,schools sc,game_type_mode md,sports_type st where m.match_code = r.match_code and s.sport_code = r.sport_code and sc.school_code = r.school_code and md.mode_code = r.mode_code and st.sport_type_code = r.sport_type_code and st.sport_type = "SINGLE" group by r.score_per_mode';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                              echo '<td>'. $row['match_code'].'</td>';
                               echo '<td>'. $row['match_status'].'</td>';
                                echo '<td>'. $row['sport_name'].'</td>';
                                 echo '<td>'. $row['school_name'].'</td>';
                                  echo '<td>'. $row['SCORE'].'</td>';
                            echo '<td><a  type="button" class="btn btn-sm btn-info fas fa-user-check" href="patientsdetails.php?action=post & id='.$row['game_result_code'] . '">Details</a></td> ';
                            echo '</tr>';
                }
            ?> 
                </table>
              </div>
              </div>       
<?php include 'theme/footer.php'; ?>