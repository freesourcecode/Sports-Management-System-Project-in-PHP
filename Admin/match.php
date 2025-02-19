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
 <h2 style="font-family: AR BLANCA">List of Tournament(s)<a href="#" data-toggle="modal" data-target="#addtournament" type="button" class="btn btn-lg btn-add">New</a></h2> 
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
                            echo '<td><a  type="button" class="btn btn-sm btn-info fas fa-trophy" href="tournament_details.php?& id='.$row['tour_code'] . '">Tournament Details</a></td> ';
                            echo '</tr>';
                }

                $query4 = "SELECT concat(`auto_desc`,'-',`auto_start`+`auto_end`) as 'tour' FROM auto_number WHERE `auto_desc` = 'TOUR'";

     $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                  
                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                             
                            $code = $row4['tour'];
                        }
            ?> 
                </table>
              </div>
              </div>  
              <div id="addtournament" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>New Tournament</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                    <form method="POST" action="#">
                      <div class="form-group">
                              <h3>Code:<h1 style="color: green;"><?php echo $code;?></h1></h3>
                            </div>
                            <div class="form-group">
                              <input type="text" hidden value="<?php echo $code; ?>" class="form-control" name="code">
                               <input type="text" placeholder="Tournament Name" class="form-control" name="name">
                            </div> 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                      Close
                      <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                    <input type="submit" name="submit" value="Save" class="btn btn-success">
                  </div>
                  </form>
                 
</div>
</div>
              </div>
            </div>     
<?php
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $code = $_POST['code'];


  $queryt = "INSERT INTO tournament(tour_name,tour_code)
                VALUES ('".$name."','".$code."')";
                mysqli_query($db,$queryt)or die (mysqli_error($db));

                 $q = "UPDATE auto_number set auto_end = auto_end+auto_increment where auto_desc = 'TOUR'";
                mysqli_query($db,$q)or die (mysqli_error($db));
                ?>
                <script type="text/javascript">
      alert("New Tournament Has Been Added Successfully!.");
      <?php
      echo 'window.location ="match.php"';
      ?>
    </script>
    <?php
}
 include 'theme/footer.php'; ?>