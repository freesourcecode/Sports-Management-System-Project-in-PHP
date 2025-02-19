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
$query = 'SELECT * FROM game_type';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        $row1 = mysqli_fetch_assoc($result);
?>
 <h2 style="font-family: AR BLANCA">List of Game Type(s)<a href="#addtype" data-target="#addtype" data-toggle="modal">New</a></h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Type of Game</th>
                      <th>Sport Type</th>
                      <th>Number of Scoring</th>
                      <th>Options</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT g.game_type_id,g.game_type_code,g.type_of_game,s.sport_type,g.number_of_scoring FROM game_type g,sports_type s where s.sport_type_code = g.sport_type_code';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                              echo '<td>'. $row['game_type_code'].'</td>';
                               echo '<td>'. $row['type_of_game'].'</td>';
                                echo '<td>'. $row['sport_type'].'</td>';
                                 echo '<td>'. $row['number_of_scoring'].'</td>';
                            echo '<td><a  type="button" class="btn btn-sm btn-info fas fa-user-check" href="patientsdetails.php?action=post & id='.$row['game_type_id'] . '">Details</a></td> ';
                            echo '</tr>';
                }
            ?> 
                </table>
              </div>
              </div>   
              <?php
$query4 = "SELECT concat(`auto_desc`,'-',`auto_start`+`auto_end`) as 'type' FROM auto_number WHERE `auto_desc` = 'TYPE'";

     $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                  
                        $row4 = mysqli_fetch_assoc($result4);
                                             
                            $code = $row4['type'];
                        
              
$query5 = "SELECT * FROM sports_type";

     $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));
                  
                      
              ?>
 <div id="addtype" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header"><h3>New Game Type</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      
                        
                    <form method="POST" action="#">
                      <div class="form-group">
          <h5>Code</h5>  
            <input type="text" readonly class="form-control" name="code" value="<?php echo $code;?>" required>  
          </div> 
        <div class="form-group">
          <h5>Type of Game</h5>
            <input type="text" class="form-control" name="tgame" required>
          </div>
        <div class="form-group">
          <h5>Sport Type</h5>
            <select class="form-control" name="stype">
              <?php
while ($row5 =  mysqli_fetch_assoc($result5)) {
              ?>
              <option value="<?php echo $row5['sport_type_code']; ?>"><?php echo $row5['sport_type']; ?></option>
              <?php
}
              ?>
            </select>  
          </div>
        <div class="form-group">
          <h5>Number of Scoring</h5>
            <input type="number" class="form-control" name="num" required>  
          </div>
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
   $tgame = $_POST['tgame'];
    $stype = $_POST['stype'];
     $num = $_POST['num'];


      mysqli_query($db,"INSERT INTO game_type (type_of_game,sport_type_code,number_of_scoring,game_type_code) VALUES ('".$tgame."','".$stype."','".$num."','".$code."')")or die(mysqli_error($db)); 
          
          mysqli_query($db,"UPDATE auto_number set auto_end = auto_end+auto_increment where auto_desc = 'TYPE'") or die(mysqli_error($db));
        ?>
        <script>
                alert("Successfully Added!");
                window.location = "gametype.php"; 
                </script>
 <?php
}
?>
<?php include 'theme/footer.php'; ?>