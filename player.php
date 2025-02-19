<?php
include "theme/header.php";
include "theme/body.php";

$queryss = "SELECT m.match_code,p.player_name,s.school_name from match_schedule m,players p,schools s where p.school_code = s.school_code and s.school_code = m.school_code and m.match_id = '".$_GET['id']."' ";

     $resultss = mysqli_query($db,$queryss);
                  
                       
//$query = "SELECT school_name FROM schools  WHERE `school_code` = '".$_GET['id']."' ";

  //   $result = mysqli_query($db,$query);                               
                            
?>

 <div class="container" style="margin-bottom: 25px">
      <div class="card card-register mx-auto mt-5">
        <div class="card-body">
          
        <div class="align-center"><h1>Players of </h1></div>
         
        <div class="card-body">
				<form action="send.php?action=add" method="post">
					<div class="form-group">
            <?php  while ($roww = mysqli_fetch_assoc($resultss)):; ?>
					<input type="text" name="first[]" value="<?php echo $roww['player_name']; ?>" readonly class="form-control" required>
       <?php endwhile; ?>
				    </div>
				    
				</form>
			</div>
		</div>
		<br>
                       </div>
                </div>
                <center>
             <?php include "theme/footer.php"; ?>
           </center>