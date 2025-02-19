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
$code = $_GET['id'];
$school = $_GET['school'];
$querys = "SELECT r.`game_result_id`,r.`match_code`, s.`sport_name`, sc.`school_name`, r.`final_score`, p.`position_name`, r.`game_result_code` FROM `game_result` r,sports s,schools sc,game_result_position p WHERE s.sport_code = r.sport_code and sc.school_code = r.school_code and p.position_code = r.position_code and r.match_code = '$code' and sc.school_code = '$school'";
                    $results = mysqli_query($db, $querys) or die (mysqli_error($db));
                  
                        $rows = mysqli_fetch_assoc($results);
                          ?>
                <!-- Modal content-->
               
                  
                      <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">View Score</div>
        <div class="card-body">
                        
                          <form method="POST" action="#">
                            <div class="form-group">
                              <h3>Match Code:<h1 style="color: green;"><?php echo $rows['match_code'];?></h1></h3>
                            </div>
                            <div class="form-group">
                            <div class="form-row">
                            <div class="col-md-6">
                              <h3>Sports</h3>
                            <div class="form-group">
                            <input type="text" readonly class="form-control" value="<?php echo $rows['sport_name'];?>" name="score" required>
                            </div>
                            </div>
                            <div class="col-md-6">
                              <h3>School</h3>
                            <div class="form-group">
                              <input type="text" readonly class="form-control" value="<?php echo $rows['school_name'];?>" name="score" required>                            
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-row">
                            <div class="col-md-6">
                            <div class="form-group">
                              <h3>Final Score</h3>
                            <input type="text" readonly class="form-control" value="<?php echo $rows['final_score'];?>" name="score" required>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <h3>Rank</h3>
                              <?php
if($rows['position_name']=='Winner'){
                              ?>
                              <input type="text" readonly class="form-control bg-success" value="<?php echo $rows['position_name'];?>" name="score" required>
                            <?php
}else if($rows['position_name']=='Losser'){
                            ?>
                          <input type="text" readonly class="form-control bg-danger" value="<?php echo $rows['position_name'];?>" name="score" required>
                            <?php

}else{
                            ?>
                          <input type="text" readonly class="form-control bg-warning" value="<?php echo $rows['position_name'];?>" name="score" required>
                            <?php
}
                            ?>
                            </div>
                            </div>
                            </div>
                            </div>
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
      echo 'window.location ="competing_schools.php?id='.$_GET['code'].'"';
      ?>
    </script>
    <?php
}
 include 'theme/footer.php'; ?>