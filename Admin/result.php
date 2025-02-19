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
 <h2 style="font-family: AR BLANCA">List of Tournament(s)</h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tornament Name</th>
                      <th>Options</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT * from tournament';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['tour_name'].'</td>';
                            echo '<td><a  type="button" class="btn btn-sm btn-info fas fa-trophy" href="resultdetails.php?& id='.$row['tour_code'] . '">Tournament Details</a></td> ';
                            echo '</tr>';
                }
            ?> 
                </table>
              </div>
              </div>  
            <?php
 include 'theme/footer.php'; ?>