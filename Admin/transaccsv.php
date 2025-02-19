<?php  
 include 'includes/connection.php';
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $item1 = mysqli_real_escape_string($db, $data[0]);  
    $item2 = mysqli_real_escape_string($db, $data[1]);
    $item3 = mysqli_real_escape_string($db, $data[2]);  
    $item4 = mysqli_real_escape_string($db, $data[3]);
    $item5 = mysqli_real_escape_string($db, $data[4]);  
    $item6 = mysqli_real_escape_string($db, $data[5]);
    $item7 = mysqli_real_escape_string($db, $data[6]);  
    $item8 = mysqli_real_escape_string($db, $data[7]);
    $item9 = mysqli_real_escape_string($db, $data[8]);  

                mysqli_query($db,"INSERT into `players` (`player_name`, `player_age`, `player_course`, `player_address`, `player_gender`, `school_code`, `sport_code`, `contact`, `player_code`) values('".$item1."','".$item2."','".$item3."','".$item4."','".$item5."','".$item6."','".$item7."','".$item8."','".$item9."')")or die(mysqli_error($db));
              
   }
   fclose($handle);
   echo "<script>alert('Importing Multiple Players Done!');</script>";
  }
 }
}
?>  