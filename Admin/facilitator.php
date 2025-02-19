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
$query = 'SELECT * FROM facilitator';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        $row1 = mysqli_fetch_assoc($result);
?>
 <h2 style="font-family: AR BLANCA">List of Facilitator(s)<a href="#addfac" data-target="#addfac" data-toggle="modal" class="small-box-footer">New</a></h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Contact</th>
                      <th>Status</th>
                      <th>Options</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT * FROM facilitator';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                              echo '<td>'. $row['facilitator_name'].'</td>';
                               echo '<td>'. $row['facilitator_gender'].'</td>';
                                echo '<td>'. $row['facilitator_address'].'</td>';
                                 echo '<td>'. $row['facilitator_contact'].'</td>';
                                 echo '<td>'. $row['facilitator_status'].'</td>';
                            echo '<td><a  type="button" class="btn btn-sm btn-info fas fa-user-check" href="patientsdetails.php?action=post & id='.$row['facilitator_id'] . '">Details</a></td> ';
                            echo '</tr>';
                }
            ?> 
                </table>
              </div>
              </div>   
              <?php
$query4 = "SELECT concat(`auto_desc`,'-',`auto_start`+`auto_end`) as 'fac' FROM auto_number WHERE `auto_desc` = 'FCLTR'";

     $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                  
                        $row4 = mysqli_fetch_assoc($result4);
                                             
                            $code = $row4['fac'];
                        
              ?>
<div id="addfac" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>New Facilitator</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                    <form method="POST" action="#">
                      <div class="form-group">
          <h5>Code</h5>  
            <input type="text" readonly class="form-control" name="code" value="<?php echo $code;?>" required>  
        </div> 
        <div class="form-group">
          <h5>Name</h5>
          
            <input type="text" class="form-control" name="name" required>  
          </div>
        <div class="form-group">
          <h5>Gender</h5>
            <select class="form-control" name="gender">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>  
          </div>
        <div class="form-group">
          <h5>Address</h5>
            <input type="text" class="form-control" name="add" required>  
          </div>
        <div class="form-group">
          <h5>Contact</h5>
            <input type="text" class="form-control" placeholder="+639" name="contact" required>
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
  $code = $_POST['code'];
   $name = $_POST['name'];
    $gender = $_POST['gender'];
     $add = $_POST['add'];
      $contact = $_POST['contact'];


      mysqli_query($db,"INSERT INTO facilitator (facilitator_name,facilitator_gender,facilitator_address,facilitator_contact,facilitator_status,facilitator_code) VALUES ('".$name."','".$gender."','".$add."','".$contact."','Available','".$code."')")or die(mysqli_error($db)); 
          
          mysqli_query($db,"UPDATE auto_number set auto_end = auto_end+auto_increment where auto_desc = 'FCLTR'") or die(mysqli_error($db));
        ?>
        <script>
                alert("Successfully Added!");
                window.location = "facilitator.php"; 
                </script>
 <?php
}
?>
<?php include 'theme/footer.php'; ?>