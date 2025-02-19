<!--header area-->
<?php include 'theme/header.php'; ?>
<!--sidebar area-->
<?php include 'theme/sidebar.php'; ?>

<?php include 'theme/breadcrumbs.php'; ?>
         
   <div id="content-wrapper">

        <div class="container-fluid">
 <!--  <div class="frame1">
            <div class="box">
              <img src="img/Screenshot_2018-09-17-09-46-19_1.jpg" alt="Img" height="130" width="197">
            </div>
          </div> -->
<!--  <div>Patients Table</div> -->
 

 <?php

$querys = "SELECT m.match_id,m.match_code,s.sport_name,s.sport_type_code,s.sport_code,m.match_date,m.match_time,m.Is_have_result,sc.school_code,sc.school_name from match_schedule m,sports s,schools sc where s.sport_code = m.sport_code and sc.school_code = m.school_code and  m.match_id = '".$_GET['id']."'";
                    $results = mysqli_query($db, $querys) or die (mysqli_error($db));
                  
                        $rows = mysqli_fetch_assoc($results);

                        $query1 = "SELECT * FROM game_result_position";

                        $result1 = mysqli_query($db,$query1);

                        $query4 = "SELECT concat(`auto_desc`,'-',`auto_start`+`auto_end`) as 'result' FROM auto_number WHERE `auto_desc` = 'RESULT'";

                        $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                  
                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                             
                            $code = $row4['result'];
                        }
                          ?>
                <!-- Modal content-->
               
                  
                      <div class="container">
                        <a href="competing_schools.php?&id=<?php echo $_GET['code']; ?>&tour=<?php echo $_GET['tour']; ?>" type="button" class="btn btn-lg btn-add fas fa-arrow-left bg-warning">Back</a><br><br>
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Score</div>
        <div class="card-body">
                        
                          <form method="POST" action="#">
                            <div class="form-group">
                              <label>Code:<h1 style="color: green;"><?php echo $code;?></h1></label>
                            </div>
                            <input type="text" hidden value="<?php echo $rows['match_id']?>" name="matchid">
                            <input type="text" hidden value="<?php echo $code?>" name="rescode">
                            <input type="text" hidden value="<?php echo $rows['match_code']  ?>" name="mcode">
                            <input type="text" hidden value="<?php echo $rows['sport_code']  ?>" name="scode">
                            <input type="text" hidden value="<?php echo $rows['sport_type_code']  ?>" name="stcode">
                            <input type="text" hidden value="<?php echo $rows['school_code']  ?>" name="sccode">
                            <div class="form-group">
                            <div class="form-row">
                            <div class="col-md-6">
                            <div class="form-label-group">
                            <select  name="position" class="form-control">
                              <option>---Select Rank Position---</option>
                              <?php while($row1 = mysqli_fetch_array($result1)):; ?>
                              <option value="<?php echo $row1[2]; ?>"><?php echo $row1[1]; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Final Score" name="score" required>
                            
                            </div>
                            </div>
                            </div>
                            </div>
                         
                            
                            
                          
                 
                                     <button type="button" class="btn btn-default" data-dismiss="modal">
                      Close
                      <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                    <input type="submit" name="submit" value="Save" class="btn btn-success">
                  </form>
                 
</div>
</div>
</div>
</div>
</div>

<?php
if(isset($_POST['submit'])){
  $rescode = $_POST['rescode'];
  $mcode = $_POST['mcode'];
  $scode = $_POST['scode'];
  $stcode = $_POST['stcode'];
  $sccode = $_POST['sccode'];
  $position = $_POST['position'];
  $score = $_POST['score'];
  $matchid = $_POST['matchid'];


  $queryt = "INSERT INTO game_result( `match_code`, `sport_code`, `sport_type_code`, `school_code`, `final_score`, `position_code`, `game_result_code`)
                VALUES ('".$mcode."','".$scode."','".$stcode."','".$sccode."','".$score."','".$position."','".$rescode."')";
                mysqli_query($db,$queryt)or die (mysqli_error($db));

                 $q = "UPDATE auto_number set auto_end = auto_end+auto_increment where auto_desc = 'RESULT'";
                mysqli_query($db,$q)or die (mysqli_error($db));

                 $q1 = "UPDATE match_schedule SET Is_have_result = 'YES' where match_id = '".$_GET['id']."'";
                mysqli_query($db,$q1)or die (mysqli_error($db));

                ?>
                <script type="text/javascript">
      alert("Score Has Been Added Successfully!.");
      <?php
      echo 'window.location ="competing_schools.php?id='.$_GET['code'].'&tour='.$_GET['tour'].'"';
      ?>
    </script>
    <?php
}
 include 'theme/footer.php'; ?>