<?php
include "theme/header.php";
include "theme/body.php";

?>
                       
                  <div class="align-center">
<?php
if (!$db) {
    # code...
    die('server not connected');
  }
  $sql = "SELECT m.match_code,s.sport_name,m.match_date,m.match_time,m.match_status,f.facilitator_name,sc.school_name,v.place from match_schedule m,sports s,facilitator f,schools sc,venue v where s.sport_code = m.sport_code and f.facilitator_code = m.facilitator_code and sc.school_code = m.school_code and v.venue_code = m.venue_code and m.sport_type_code = 'TOURNAMENTSPORTS' group by m.match_code";
  $r =mysqli_query($db,$sql);
  while ($row = mysqli_fetch_array($r)) {
    ?>

            <div style="margin-top:-50px ">                
<center>
  <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header bg-danger"><?php echo '<h4>
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
    ';

    ?>
 <br>
    <div style="margin: 10% 10%;margin-top:-10px;margin-bottom: 30px ">   
             <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Competing Schools</th> 
                                        <th>Details</th> 
                                    </tr>
                                </thead>
                                <?php
$sql1 = "SELECT m.match_id,m.match_code,s.sport_name,m.match_date,m.match_time,f.facilitator_name,sc.school_code,sc.school_name from match_schedule m,sports s,facilitator f,schools sc where s.sport_code = m.sport_code and f.facilitator_code = m.facilitator_code and sc.school_code = m.school_code and  m.match_code = '".$row['match_code']."'";
  $r1 =mysqli_query($db,$sql1);
  
    ?>
                              <?php      
                              while ($row1 = mysqli_fetch_array($r1)) {
                            echo '<tr>';                    
                            echo '<td>'. $row1['school_name'].'</td>';
                            //echo '<td>'. $row1['position_name'].'</td>';
                             echo '<td><a type="button" class="btn btn-sm btn-warning fas fa-search" href="addcheckup.php?action=add & id='.$row1['match_id'] . '">Details</a>';
                            echo " ";
                            echo '<a type="button" class="btn btn-sm btn-success fas fa-users" href="player.php?action=add & id='.$row1['match_id'] . '">Player(s)</a></td>';
                            echo " ";
                           /* echo '<td>  ';
                            echo '<center> <a  type="button" class="btn btn-lg btn-info fas fa-cart-plus" href="addtransacdetail.php?action=edit & id='.$row['transac_id'] . '"></a> </td></center>';*/
                            echo '</tr> ';
                          }
              
            ?>    </table>
                            </div>
                          </div>

                
       <center>
        </div>
</div>
</div>
     
</center>
<br>
   
<?php
}
?>
<center>
<?php
include "theme/footer.php";
?>
</center>