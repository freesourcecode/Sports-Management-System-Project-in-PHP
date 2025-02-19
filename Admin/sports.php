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
 <h2 style="font-family: AR BLANCA">List of Sport(s)<a href="#addsport" data-target="#addsport" data-toggle="modal" class="small-box-footer">New</a></h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sports Name</th>
                      <th>Sports Type</th>
                      <th>Type of Game</th>
                      <th>Number of Player</th>
                      <th>Options</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT s.sport_id,s.sport_name,st.sport_type,gt.type_of_game,s.no_of_player from sports s,sports_type st,game_type gt where st.sport_type_code = s.sport_type_code and gt.game_type_code = s.game_type_code';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                              echo '<td>'. $row['sport_name'].'</td>';
                               echo '<td>'. $row['sport_type'].'</td>';
                                echo '<td>'. $row['type_of_game'].'</td>';
                                 echo '<td>'. $row['no_of_player'].'</td>';
                            echo '<td><a  type="button" class="btn btn-sm btn-info fas fa-user-check" href="patientsdetails.php?action=post & id='.$row['sport_id'] . '">Details</a></td> ';
                            echo '</tr>';
                }
            ?> 
                </table>
              </div>
              </div>       
<?php
$query1 = "SELECT * FROM game_type";

$result1 = mysqli_query($db,$query1);

$query2 = "SELECT * FROM sports_type";

$result2 = mysqli_query($db,$query2);

$query4 = "SELECT concat(`auto_desc`,'-',`auto_start`+`auto_end`) as 'sport' FROM auto_number WHERE `auto_desc` = 'SPORT'";

     $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                  
                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                             
                            $code = $row4['sport'];
                        }

?>
              <div id="addsport" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Sport</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" enctype='multipart/form-data'>
               
                <div class="form-group">
          <h5>Code</h5>
            <input type="text" readonly class="form-control" name="code" value="<?php echo $code;?>" required>  
        </div> 
        <div class="form-group">
          <h5>Sport Name</h5>
            <input type="text" class="form-control" name="sname" required>  
        </div>
        <h5>Sport Type</h5>
         <div class="form-group">
                              
                              <select  name="stype" class="form-control">
                                <option>---Select Sport Type---</option>
                              <?php while($row2 = mysqli_fetch_array($result2)):; ?>
                              <option value="<?php echo $row2[1]; ?>"><?php echo $row2[2]; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div> 
        <h5>Game Type</h5>
         <div class="form-group">
                              
                              <select  name="gtype" class="form-control">
                                <option>---Select Game Type---</option>
                              <?php while($row1 = mysqli_fetch_array($result1)):; ?>
                              <option value="<?php echo $row1[4]; ?>"><?php echo $row1[1]; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div>
        <div class="form-group">
          <h5>No. of Player(s)</h5>
            <input type="number" class="form-control" name="nplayer" required>  
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
   $sname = $_POST['sname'];
    $nplayer = $_POST['nplayer'];
     $stype = $_POST['stype'];
     $gtype = $_POST['gtype'];


      mysqli_query($db,"INSERT INTO sports (`sport_name`, `sport_type_code`, `game_type_code`, `no_of_player`, `sport_code`, `is_default`) VALUES ('".$sname."','".$stype."','".$gtype."','".$nplayer."','".$code."','YES')")or die(mysqli_error($db)); 
          
          mysqli_query($db,"UPDATE auto_number set auto_end = auto_end+auto_increment where auto_desc = 'SPORT'") or die(mysqli_error($db));
        ?>
        <script>
                alert("Successfully Added!");
                window.location = "sports.php"; 
                </script>
 <?php
}
?>
<?php include 'theme/footer.php'; ?>