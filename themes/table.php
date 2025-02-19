 <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Matches Schedule</div>
           <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sports</th>
                      <th>Facilitator</th>
                      <th>Place</th>
                      <th>Match Date</th>
                      <th>Match Time</th>
                      <th>School Year</th>
                      <th>Sport Type</th>
                      <th>School</th>
                      <th>Position</th>
                      <th>Match Status</th>
                      
                    </tr>
                  </thead>
                  
              <?php

$query = "SELECT s.sport_name,f.facilitator_name,v.place,m.match_date,m.match_time,sc.school_year,st.sport_type,sh.school_name,p.position_name,m.match_status FROM match_schedule m,sports s,facilitator f,venue v,school_year sc,sports_type st,schools sh,team_player_position p where s.sport_code = m.sport_code and f.facilitator_code = m.facilitator_code and v.venue_code = m.venue_code and sc.sy_code = m.sy_code and st.sport_type_code = m.sport_type_code and sh.school_code = m.school_code and p.position_code = m.position_code";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                             echo '<td>'. $row['sport_name'].'</td>';
                             echo '<td>'. $row['facilitator_name'].'</td>';
                              echo '<td>'. $row['place'].'</td>';
                               echo '<td>'. $row['match_date'].'</td>';
                               echo '<td>'. $row['match_time'].'</td>';
                               echo '<td>'. $row['school_year'].'</td>';
                             echo '<td>'. $row['sport_type'].'</td>';
                              echo '<td>'. $row['school_name'].'</td>';
                              echo '<td>'. $row['position_name'].'</td>';
                               echo '<td>'. $row['match_status'].'</td>';
                              
                            echo '</tr> ';
                          }
                        
                        
            ?> 
           
                </table>
              </div>
              </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>