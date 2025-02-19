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
$query = 'SELECT * FROM sports_type';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        $row1 = mysqli_fetch_assoc($result);
?>
 <h2 style="font-family: AR BLANCA">List of Sports Type(s)<a href="#addtype" data-target="#addtype" data-toggle="modal" class="small-box-footer">New</a></h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Sport Type</th>
                      <th>Options</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT * FROM sports_type';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                              echo '<td>'. $row['sport_type_code'].'</td>';
                               echo '<td>'. $row['sport_type'].'</td>';
                               
                            echo '<td><a  type="button" class="btn btn-sm btn-info fas fa-user-check" href="patientsdetails.php?action=post & id='.$row['sport_type_id'] . '">Details</a></td> ';
                            echo '</tr>';
                }
            ?> 
                </table>
              </div>
              </div>   
              <?php
$query4 = "SELECT concat(`auto_desc`,'-',`auto_start`+`auto_end`) as 'type' FROM auto_number WHERE `auto_desc` = 'STYPE'";

     $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                  
                        $row4 = mysqli_fetch_assoc($result4);
                                             
                            $code = $row4['type'];
                        
              ?>
              <div id="addtype" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Sport Type</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" enctype='multipart/form-data'>
               
                <div class="form-group">
          <h5>Code</h5> 
            <input type="text" readonly class="form-control" name="code" value="<?php echo $code;?>" required>  
        </div> 
        <div class="form-group">
          <h5>Sport Type</h5>
            <input type="text" class="form-control" name="name" required>  
          </div>
              <div class="modal-footer">
    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>   
 <?php
if(isset($_POST['submit'])){
  $code = $_POST['code'];
   $name = $_POST['name'];

      mysqli_query($db,"INSERT INTO sports_type (sport_type_code,sport_type) VALUES ('".$code."','".$name."')")or die(mysqli_error($db)); 
          
          mysqli_query($db,"UPDATE auto_number set auto_end = auto_end+auto_increment where auto_desc = 'STYPE'") or die(mysqli_error($db));
        ?>
        <script>
                alert("Successfully Added!");
                window.location = "sporttype.php"; 
                </script>
 <?php
}
?>
<?php include 'theme/footer.php'; ?>