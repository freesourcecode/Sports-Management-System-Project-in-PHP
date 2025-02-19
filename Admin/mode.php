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
$query = 'SELECT * FROM game_type_mode';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        $row1 = mysqli_fetch_assoc($result);
?>
 <h2 style="font-family: AR BLANCA">List of Game Mode(s)<a href="#addmode" data-target="#addmode" data-toggle="modal" class="small-box-footer">New</a></h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Type of Game</th>
                      <th>Mode Name</th>
                      <th>Options</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT m.mode_id,m.mode_code,g.type_of_game,m.mode_name from game_type_mode m, game_type g where g.game_type_code = m.game_type_code';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                              echo '<td>'. $row['mode_code'].'</td>';
                               echo '<td>'. $row['type_of_game'].'</td>';
                                echo '<td>'. $row['mode_name'].'</td>';
                            echo '<td><a  type="button" class="btn btn-sm btn-info fas fa-user-check" href="patientsdetails.php?action=post & id='.$row['mode_id'] . '">Details</a></td> ';
                            echo '</tr>';
                }
            ?> 
                </table>
              </div>
              </div>   
              <?php
$query4 = "SELECT concat(`auto_desc`,'-',`auto_start`+`auto_end`) as 'mode' FROM auto_number WHERE `auto_desc` = 'MODE'";

     $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                  
                        $row4 = mysqli_fetch_assoc($result4);
                                             
                            $code = $row4['mode'];



$query5 = "SELECT * FROM game_type";

     $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));
                  
                        
              ?>
              <div id="addmode" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Game Mode</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" enctype='multipart/form-data'>
               
                <div class="form-group">
          <h5>Code</h5>  
            <input type="text" readonly class="form-control" name="code" value="<?php echo $code;?>" required>  
          </div>
        <div class="form-group">
          <h5>Type of Game</h5>
           <select class="form-control" name="type">
             <?php
             while ($row5 =  mysqli_fetch_assoc($result5)) {
              ?>
              <option value="<?php echo $row5['game_type_code']; ?>"><?php echo $row5['type_of_game']; ?></option>
              <?php
}
              ?>
           </select>
          </div>
        <div class="form-group">
          <h5>Mode Name</h5>
           <input type="text" class="form-control" name="name" required> 
          </div>
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
    $type = $_POST['type'];
     


      mysqli_query($db,"INSERT INTO game_type_mode (game_type_code,mode_name,mode_code) VALUES ('".$type."','".$name."','".$code."')")or die(mysqli_error($db)); 
          
          mysqli_query($db,"UPDATE auto_number set auto_end = auto_end+auto_increment where auto_desc = 'MODE'") or die(mysqli_error($db));
        ?>
        <script>
                alert("Successfully Added!");
                window.location = "mode.php"; 
                </script>
 <?php
}
?>
<?php include 'theme/footer.php'; ?>