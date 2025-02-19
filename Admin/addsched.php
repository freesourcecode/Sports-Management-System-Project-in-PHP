<?php include 'theme/header.php'; ?>
<!--sidebar area-->
<?php include 'theme/sidebar.php'; ?>



<?php
$query = "SELECT * FROM schools";

$result = mysqli_query($db,$query);

$query1 = "SELECT * FROM sports";

$result1 = mysqli_query($db,$query1);

$query2 = "SELECT * FROM venue where venue_status = 'Available'";

$result2 = mysqli_query($db,$query2);

$query3 = "SELECT * FROM facilitator where facilitator_status = 'Available'";

$result3 = mysqli_query($db,$query3);

$query5 = "SELECT * FROM tournament_type";

$result5 = mysqli_query($db,$query5);

$query4 = "SELECT concat(`auto_desc`,'-',`auto_start`+`auto_end`) as 'match' FROM auto_number WHERE `auto_desc` = 'MATCH'";

     $result4 = mysqli_query($db, $query4) or die (mysqli_error($db));
                  
                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                             
                            $code = $row4['match'];
                        }
$id = $_GET['id'];
?>
<div class="container">
  <a href="tournament_details.php?&id=<?php echo $id; ?>" type="button" class="btn btn-lg btn-add fas fa-arrow-left bg-warning">Back</a><br><br>
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Schedule</div>
        <div class="card-body">
          <form method="POST" action="transacsched.php?action=add">
            <div class="form-group">
                            <div class="form-row">
                            <div class="col-md-6">
                               <h3>Match Code:</h3>
                            <div class="form-group">
                              <h1 style="color: green"><?php echo $code; ?></h1>
                              <input type="text" hidden name="id" value="<?php echo $id; ?>">
                              <input type="text" hidden style="background-color: green" value="<?php echo $code;  ?>" name="match_code" readonly class="form-control">
                            </div>
                            </div>
                            <div class="col-md-6">
                              <h3>Tournament Code:</h3>
                            <div class="form-group">
                              <h1 style="color: yellow"><?php echo $_GET['id']; ?></h1>
                              <input type="text area" hidden value="<?php echo $_GET['id']; ?>" readonly name="tname" class="form-control" required>
                            </div> 
                            </div>
                            </div>
                            </div> 
                            <div class="form-group">
                            <div class="form-row">
                            <div class="col-md-6">
                              <h3>Tournament Type:</h3>
                            <div class="form-group">
                              
                              <select  name="type" class="form-control">
                                <option>---Select Tournament Type---</option>
                              <?php while($row5 = mysqli_fetch_array($result5)):; ?>
                              <option value="<?php echo $row5['type_code']; ?>"><?php echo $row5['type']; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                              <h3>Sports:</h3>
                            <div class="form-group">
                              <select  name="sports" class="form-control">
                              <option>---Select Sports---</option>
                              <?php while($row1 = mysqli_fetch_array($result1)):; ?>
                              <option value="<?php echo $row1['sport_code']; ?>"><?php echo $row1['sport_name']; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div>
                          </div>
                          </div>
                         </div>
                            <div class="form-group">
                            <div class="form-row">
                            <div class="col-md-6">
                              <h3>Venue:</h3>
                            <div class="form-group">
                              <select  name="venue" class="form-control">
                                <option>---Select Venue---</option>
                              <?php while($row2 = mysqli_fetch_array($result2)):; ?>
                              <option value="<?php echo $row2['venue_code']; ?>"><?php echo $row2['place']; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div>
                            </div>  
                            <div class="col-md-6">
                              <h3>Facilitator:</h3>
                            <div class="form-group">
                              <select  name="facilitator" class="form-control">
                                <option>---Select Facilitator---</option>
                              <?php while($row3 = mysqli_fetch_array($result3)):; ?>
                              <option value="<?php echo $row3['facilitator_code']; ?>"><?php echo $row3['facilitator_name']; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div> 
                            </div>
                            </div>
                            </div> 
            <div class="form-group">
              <h3>Schoool Participant:</h3>
                    <?php while($row = mysqli_fetch_array($result)):; ?>
                     
                    <input type="checkbox" id="name" value="<?php echo $row['school_code']; ?>" name="school[]" autofocus="autofocus"><?php echo $row['school_name']; ?><br>
                  
                   <?php endwhile; ?>

                </div>
                 <div class="form-group">
                  <div class="form-row">
                  <div class="col-md-6">
                    <h3>Match Date:</h3>
                  <div class="form-group">
                              <input type="text" placeholder="Date" class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd" maxlength="10" style="border: 3px double #CCCCCC;width: 100%;height: 40px" required/>
                            </div> 
                          </div>
                              <div class="col-md-6">
                                <h3>Game Status:</h3>
                            <div class="form-group">
                            <select class="form-control" name="status" required>
                              <option>---Select Game Status---</option>
                              <option value="Normal Game">Normal Game</option>
                              <option value="Winner By Winner">Winner By Winner</option>
                               <option value="Losser By Losser">Losser By Losser</option>
                                <option value="Championship">Championship</option>
                                <option value="Elimination">Elimination</option>
                           </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                  <div class="form-row">
                  <div class="col-md-6">
                    <h3>Time Start:</h3>
                             <div class="form-group">
                              <input type="time" class="form-control" placeholder="Time Start" name="start" required>
                            </div> 
                          </div>
                            <div class="col-md-6">
                              <h3>Time End:</h3>
                            <div class="form-group">
                              <input type="time" class="form-control" placeholder="Time End" name="end" required>
                            </div> 
                          </div>
                        </div>
                      </div>
                <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
           </form>
         </div>
       </div>
     </div>
    <?php include 'theme/footer.php'; ?>