 <?php include 'theme/header.php'; ?>
<!--sidebar area-->
<?php include 'theme/sidebar.php'; ?>

<?php include 'theme/breadcrumbs.php'; ?>
        
              
          <?php
          $sql = "SELECT m.match_code,s.sport_name,s.sport_code,m.match_date,m.match_time,m.match_status,f.facilitator_name,sc.school_name,v.place,st.sport_type,st.sport_type_code from match_schedule m,sports s,facilitator f,schools sc,venue v,sports_type st where s.sport_code = m.sport_code and f.facilitator_code = m.facilitator_code and sc.school_code = m.school_code and v.venue_code = m.venue_code and st.sport_type_code = m.sport_type_code and m.sport_type_code = 'TEAMSPORTS' group by m.match_code";
  $r =mysqli_query($db,$sql);
  while ($row = mysqli_fetch_array($r)) {
    ?>

            <div style="margin-top:50px ">                
<center>
  <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header bg-primary"><?php echo '<h4>
    <a style="font-family:arial black;color: black;">'. $row['sport_name'].'<a>
    </header>
    </h4>';?></div>
        <div class="card-body">
                <?php
   echo '<header>
    <h5>
    <a style="color: black;background-color: blue">'.''. $row['match_code'].'<a>
    </h5>';
    echo '<h5>
    <a style="color: black">'.'Date of Match:    '. $row['match_date'].'<a>
    </h5>';
     echo '<h5>
    <a style="color: black">'.'Time:    '. $row['match_time'].'<a>
    </h5>';
     echo '<h5>
    <a style="color: black">'.'Venue:    '. $row['place'].'<a>
    </h5>';
     echo '<h5>
    <a style="color: black">'.'Status:    '. $row['match_status'].'<a>
    </h5>';
     echo '<h5>
    <a style="color: black">'.'Facilitator:    '. $row['facilitator_name'].'<a>
    </h5>
    <br>';
   
    ?>
  <br>
  <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $row['match_code']; ?>" type="button" class="btn btn-sm btn-info fas fa-pencil-alt">Add Game Result</a>
    <div style="margin: 10% 10%;margin-top:-10px;margin-bottom: 30px ">   
              
                                <?php
$sql1 = "SELECT m.match_id,m.match_code,s.sport_name,m.match_date,m.match_time,f.facilitator_name,sc.school_code,sc.school_name from match_schedule m,sports s,facilitator f,schools sc where s.sport_code = m.sport_code and f.facilitator_code = m.facilitator_code and sc.school_code = m.school_code and  m.match_code = '".$row['match_code']."' and s.sport_code ='".$row['sport_code']."'";
  $r1 =mysqli_query($db,$sql1);
  
    ?>
                              <?php      
                              while ($row1 = mysqli_fetch_array($r1)) {
                              }
                                   
                             ?>
                              
                             

                
       <center>
        </div>
</div>
</div>
     
</center>
<br>
   
            <br>
          <!-- Modal -->

            <div id="myModal<?php echo $row['match_code']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="width: 130%">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form method="post" action="transacresult.php?action=add">
                  <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                           <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <?php
$sql3 = "SELECT m.match_id,m.match_code,s.sport_name,m.match_date,m.match_time,sc.school_code,sc.school_name from match_schedule m,sports s,schools sc where s.sport_code = m.sport_code and sc.school_code = m.school_code and  m.match_code = '".$row['match_code']."' and s.sport_code ='".$row['sport_code']."'";
  $r3 =mysqli_query($db,$sql3);
  while ($row3 = mysqli_fetch_array($r3)) {
  }
    ?>
                                <thead class="bg-info">
                                    <tr>
                                        <th>Competing Schools</th> 
                                    </tr>
                                </thead> 
                                  <?php

$sql2 = "SELECT m.match_id,m.match_code,s.sport_name,s.sport_code,m.match_date,m.match_time,sc.school_code,sc.school_name from match_schedule m,sports s,schools sc where s.sport_code = m.sport_code and sc.school_code = m.school_code and  m.match_code = '".$row['match_code']."' and s.sport_code ='".$row['sport_code']."' group by sc.school_code";
  $r2 =mysqli_query($db,$sql2);
  while ($row2 = mysqli_fetch_array($r2)) {
    
                            echo '<tr>';  
                            ?>                  
                            <td><input type="text" class="form-control" placeholder="Score" readonly value="<?php echo $row2["school_name"];?>" name="school"></td>

                            
                          
                            <?php
                         }

                          
                       
                       ?>
                            <?php
                           
                            //echo '<td>'. $row1['position_name'].'</td>';
                           /* echo '<td>  ';
                            echo '<center> <a  type="button" class="btn btn-lg btn-info fas fa-cart-plus" href="addtransacdetail.php?action=edit & id='.$row['transac_id'] . '"></a> </td></center>';*/
                            echo '</tr> ';
                            ?>
<?php
              $querys = "SELECT m.match_code,s.school_code from match_schedule m,schools s where s.school_code = m.school_code and m.match_code = '".$row['match_code']."' order by s.school_code";

                            $resultss = mysqli_query($db,$querys);
                             while ($rowss = mysqli_fetch_array($resultss)) {
                            ?>
                            <input type="text" hidden class="form-control" value="<?php echo $rowss['school_code'] ?>" name="school_code[]" required>
                            <?php
                             }
                            ?>
          
                              </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <?php

                          $query4 = "SELECT concat(`auto_desc`,'-',`auto_start`+`auto_end`) as 'result' FROM auto_number WHERE `auto_desc` = 'RESULT'";

     $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                  
                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                             
                            $code = $row4['result'];
                        }

?>
<strong>Result Code: </strong><input type="text" style="background-color: green" value="<?php echo $code;  ?>" name="result_code" readonly class="form-control bg-danger">
                            <strong>Result Code: </strong><input type="text" style="background-color: green" value="<?php echo $code;  ?>" name="result_code" readonly class="form-control bg-danger">
                            <strong>Match Code: </strong><input type="text" class="form-control bg-info" readonly name="mcode" value="<?php echo $row['match_code']; ?>"><br />
                            <strong>Sports: </strong><input type="text" class="form-control" readonly name="sname" value="<?php echo $row['sport_name']; ?>">
                            <input type="text" hidden class="form-control" readonly name="scode" value="<?php echo $row['sport_code']; ?>"><br />
                            <strong>Sports Type: </strong><input type="text" class="form-control" readonly name="stype" value="<?php echo $row['sport_type_code']; ?>"><br />
                            <strong>Match Status: </strong><input type="text" class="form-control" readonly name="mstat" value="<?php echo $row['match_status']; ?>"><br />
                          
                           <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead class="bg-danger">
                                    <tr>
                                        <th>Competing Schools</th> 
                                        <th>Result Position</th>
                                    </tr>
                                </thead> 
                                  <?php

$sql4 = "SELECT m.match_id,m.match_code,s.sport_name,m.match_date,m.match_time,sc.school_code,sc.school_name from match_schedule m,sports s,schools sc where s.sport_code = m.sport_code and sc.school_code = m.school_code and  m.match_code = '".$row['match_code']."' and s.sport_code ='".$row['sport_code']."' group by sc.school_code";
  $r4 =mysqli_query($db,$sql4);


  while ($row4 = mysqli_fetch_array($r4)) {
    
                            echo '<tr>';                    
                            echo '<td>'. $row4['school_name'].'</td>';
                            
                            ?>
                            <?php
                        $query5 = "SELECT * FROM game_result_position where sport_type_code = 'TEAMSPORTS'";

                        $result5 = mysqli_query($db,$query5);
                            ?>
                             <td><select  name="pos[]" required class="form-control">
                              <?php while($row5 = mysqli_fetch_array($result5)):; ?>
                              <option value = "<?php echo $row5[2]; ?>"><?php echo $row5[1]; ?></option>
                              <?php endwhile; ?>
                              </select>
                           </td>
                            <?php
                           
                            //echo '<td>'. $row1['position_name'].'</td>';
                           /* echo '<td>  ';
                            echo '<center> <a  type="button" class="btn btn-lg btn-info fas fa-cart-plus" href="addtransacdetail.php?action=edit & id='.$row['transac_id'] . '"></a> </td></center>';*/
                            echo '</tr> ';
                          
                         }
              
            ?>    
                              </table>
                            </div>
                        </div>
                        </div>
                      </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                      Close
                      <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                    <input type="submit" value="submit" name="submit"  class="btn btn-success">
                  </div>
                  </form>
                </div>

              </div>
            </div>

            <!-- modal END -->
          <?php
              }//end foreacyh of select all boats
            //
           ?>
<!-- end content -->



<!--<script type="text/javascript">

function bogkot(str){

  var dstntn = $('#dstntn'+str).val();

  var bid = str;
  var tid = '<?php// echo $_SESSION['tourID']; ?>';
  var dstntn = $('#dstntn'+str).val();
  var rdate = $('#rdate'+str).val();
  var hr = $('#hr').val();
  var ampm = $('#ampm').val();


  var datas = "bid="+bid+"&tid="+tid+"&dstntn="+dstntn+"&rdate="+rdate+"&hr="+hr+"&ampm="+ampm;

  $.ajax({
       type: "POST",
       url: "reservedprocess.php",
       data: datas
    }).done(function( data ) {
      $('#info').html(data);
    });

}

// alert("outside");
// .
// $('#bogkot').click(function(){
//    alert("ni gana");
// });

</script>-->
 <?php include 'theme/footer.php'; ?>