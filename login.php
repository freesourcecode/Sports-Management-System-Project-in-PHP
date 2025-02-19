<?php
session_start();
?>
<?php
include "includes/connection.php";
if(isset($_SESSION["name"]) && $_SESSION['user_type']=='Admin'){
 header("Location: Admin/index.php");
}else if(isset($_SESSION['name']) && $_SESSION['user_type']=='Encoder'){
  header("Location: Facilitator/index.php");
}else{
?>
<?php
}
// define variables and set to empty values

$Message = $Erroremail = $Errorpass = "";
if(isset($_POST['login'])){
?>
<style type="text/css">
#cssload-pgloading {}

#cssload-pgloading:after {
    content: "";
    z-index: -1;
    position: absolute;
    top: 0; right: 0; bottom: 0; left: 0;
}
#cssload-pgloading .cssload-loadingwrap {position:absolute;top:45%;bottom:45%;left:25%;right:25%;}
#cssload-pgloading .cssload-bokeh {
    font-size: 163px;
    width: 2em;
    height: 2em;
    position: relative;
    margin: 0 auto;
    list-style: none;
    padding:0;
    border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
}

#cssload-pgloading .cssload-bokeh li {
    position: absolute;
    width: .3em;
    height: .3em;
    border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
}

#cssload-pgloading .cssload-bokeh li:nth-child(1) {
    left: 50%;
    top: 0;
    margin: 0 0 0 -.2em;
    background: rgb(0,193,118);
    transform-origin: 50% 250%;
    -o-transform-origin: 50% 250%;
    -ms-transform-origin: 50% 250%;
    -webkit-transform-origin: 50% 250%;
    -moz-transform-origin: 50% 250%;
    animation: 
        cssload-rota 1.3s linear infinite,
        cssload-opa 4.22s ease-in-out infinite alternate;
    -o-animation: 
        cssload-rota 1.3s linear infinite,
        cssload-opa 4.22s ease-in-out infinite alternate;
    -ms-animation: 
        cssload-rota 1.3s linear infinite,
        cssload-opa 4.22s ease-in-out infinite alternate;
    -webkit-animation: 
        cssload-rota 1.3s linear infinite,
        cssload-opa 4.22s ease-in-out infinite alternate;
    -moz-animation: 
        cssload-rota 1.3s linear infinite,
        cssload-opa 4.22s ease-in-out infinite alternate;
}

#cssload-pgloading .cssload-bokeh li:nth-child(2) {
    top: 50%; 
    right: 0;
    margin: -.2em 0 0 0;
    background: rgb(255,0,60);
    transform-origin: -150% 50%;
    -o-transform-origin: -150% 50%;
    -ms-transform-origin: -150% 50%;
    -webkit-transform-origin: -150% 50%;
    -moz-transform-origin: -150% 50%;
    animation: 
        cssload-rota 2.14s linear infinite,
        cssload-opa 4.93s ease-in-out infinite alternate;
    -o-animation: 
        cssload-rota 2.14s linear infinite,
        cssload-opa 4.93s ease-in-out infinite alternate;
    -ms-animation: 
        cssload-rota 2.14s linear infinite,
        cssload-opa 4.93s ease-in-out infinite alternate;
    -webkit-animation: 
        cssload-rota 2.14s linear infinite,
        cssload-opa 4.93s ease-in-out infinite alternate;
    -moz-animation: 
        cssload-rota 2.14s linear infinite,
        cssload-opa 4.93s ease-in-out infinite alternate;
}

#cssload-pgloading .cssload-bokeh li:nth-child(3) {
    left: 50%; 
    bottom: 0;
    margin: 0 0 0 -.2em;
    background: rgb(250,190,40);
    transform-origin: 50% -150%;
    -o-transform-origin: 50% -150%;
    -ms-transform-origin: 50% -150%;
    -webkit-transform-origin: 50% -150%;
    -moz-transform-origin: 50% -150%;
    animation: 
        cssload-rota 1.67s linear infinite,
        cssload-opa 5.89s ease-in-out infinite alternate;
    -o-animation: 
        cssload-rota 1.67s linear infinite,
        cssload-opa 5.89s ease-in-out infinite alternate;
    -ms-animation: 
        cssload-rota 1.67s linear infinite,
        cssload-opa 5.89s ease-in-out infinite alternate;
    -webkit-animation: 
        cssload-rota 1.67s linear infinite,
        cssload-opa 5.89s ease-in-out infinite alternate;
    -moz-animation: 
        cssload-rota 1.67s linear infinite,
        cssload-opa 5.89s ease-in-out infinite alternate;
}

#cssload-pgloading .cssload-bokeh li:nth-child(4) {
    top: 50%; 
    left: 0;
    margin: -.2em 0 0 0;
    background: rgb(136,193,0);
    transform-origin: 250% 50%;
    -o-transform-origin: 250% 50%;
    -ms-transform-origin: 250% 50%;
    -webkit-transform-origin: 250% 50%;
    -moz-transform-origin: 250% 50%;
    animation: 
        cssload-rota 1.98s linear infinite,
        cssload-opa 6.04s ease-in-out infinite alternate;
    -o-animation: 
        cssload-rota 1.98s linear infinite,
        cssload-opa 6.04s ease-in-out infinite alternate;
    -ms-animation: 
        cssload-rota 1.98s linear infinite,
        cssload-opa 6.04s ease-in-out infinite alternate;
    -webkit-animation: 
        cssload-rota 1.98s linear infinite,
        cssload-opa 6.04s ease-in-out infinite alternate;
    -moz-animation: 
        cssload-rota 1.98s linear infinite,
        cssload-opa 6.04s ease-in-out infinite alternate;
}







@keyframes cssload-rota {
    from { }
    to { transform: rotate(360deg); }
}

@-o-keyframes cssload-rota {
    from { }
    to { -o-transform: rotate(360deg); }
}

@-ms-keyframes cssload-rota {
    from { }
    to { -ms-transform: rotate(360deg); }
}

@-webkit-keyframes cssload-rota {
    from { }
    to { -webkit-transform: rotate(360deg); }
}

@-moz-keyframes cssload-rota {
    from { }
    to { -moz-transform: rotate(360deg); }
}

@keyframes cssload-opa {
    0% { }
    12.0% { opacity: 0.80; }
    19.5% { opacity: 0.88; }
    37.2% { opacity: 0.64; }
    40.5% { opacity: 0.52; }
    52.7% { opacity: 0.69; }
    60.2% { opacity: 0.60; }
    66.6% { opacity: 0.52; }
    70.0% { opacity: 0.63; }
    79.9% { opacity: 0.60; }
    84.2% { opacity: 0.75; }
    91.0% { opacity: 0.87; }
}

@-o-keyframes cssload-opa {
    0% { }
    12.0% { opacity: 0.80; }
    19.5% { opacity: 0.88; }
    37.2% { opacity: 0.64; }
    40.5% { opacity: 0.52; }
    52.7% { opacity: 0.69; }
    60.2% { opacity: 0.60; }
    66.6% { opacity: 0.52; }
    70.0% { opacity: 0.63; }
    79.9% { opacity: 0.60; }
    84.2% { opacity: 0.75; }
    91.0% { opacity: 0.87; }
}

@-ms-keyframes cssload-opa {
    0% { }
    12.0% { opacity: 0.80; }
    19.5% { opacity: 0.88; }
    37.2% { opacity: 0.64; }
    40.5% { opacity: 0.52; }
    52.7% { opacity: 0.69; }
    60.2% { opacity: 0.60; }
    66.6% { opacity: 0.52; }
    70.0% { opacity: 0.63; }
    79.9% { opacity: 0.60; }
    84.2% { opacity: 0.75; }
    91.0% { opacity: 0.87; }
}

@-webkit-keyframes cssload-opa {
    0% { }
    12.0% { opacity: 0.80; }
    19.5% { opacity: 0.88; }
    37.2% { opacity: 0.64; }
    40.5% { opacity: 0.52; }
    52.7% { opacity: 0.69; }
    60.2% { opacity: 0.60; }
    66.6% { opacity: 0.52; }
    70.0% { opacity: 0.63; }
    79.9% { opacity: 0.60; }
    84.2% { opacity: 0.75; }
    91.0% { opacity: 0.87; }
}

@-moz-keyframes cssload-opa {
    0% { }
    12.0% { opacity: 0.80; }
    19.5% { opacity: 0.88; }
    37.2% { opacity: 0.64; }
    40.5% { opacity: 0.52; }
    52.7% { opacity: 0.69; }
    60.2% { opacity: 0.60; }
    66.6% { opacity: 0.52; }
    70.0% { opacity: 0.63; }
    79.9% { opacity: 0.60; }
    84.2% { opacity: 0.75; }
    91.0% { opacity: 0.87; }
}
</style>
<body>
<div id="cssload-pgloading">
    <div class="cssload-loadingwrap">
      <ul class="cssload-bokeh">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
  </div>

</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = check_input($_POST["user"]);
  
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$email)) {
      $Erroremail = ""; 
    }
  else{
    $femail=$email;
  }
 
  $fpass = check_input($_POST["pass"]);

  if ($Erroremail!=""){
  $Message = "Login failed! Errors found";

  }
  else{
  include "includes/connection.php";

  
  $query=mysqli_query($db,"select * from `user` where username='$email' && password=sha1('$fpass')");
  $num_rows=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
    $_SESSION["name"]=$row['name'];
    $_SESSION["user_type"]=$row['user_type'];
    $_SESSION["id"]=$row['user_id'];
   }
  
  if ($num_rows>0){
    $Message = "Login Successful!";
    if ($_SESSION['user_type']=='Encoder') {
      # code...
      ?>
  <script>
   window.location = "Facilitator/index.php";
 </script>
   <?php
    }else if($_SESSION['user_type']=='Admin'){
    ?>
  <script>
   window.location = "Admin/index.php";
 </script>
   <?php
 }
  }
  else{
  $Message = "Login Failed! User not found";
  $_SESSION['message']=$Message;
  unset($_SESSION['name']);
  session_destroy();
  ?>
  <script>
  alert("Wrong Password/User!");
   window.location = "login.php";
 </script>
   <?php
  }
  
  }
}


function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
  if ($Message=="Login Successful!"){
  }
  else{
    echo $Message;

  }
//unset($_SESSION['active']);
//session_destroy();
//header("Location: login.php");
echo '<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header bg-info">Login</div>
        <div class="card-body">
           <form method="POST" action="#">
                                <fieldset>
                                    <div class="form-group">
                                       
                                        <input class="form-control" placeholder="E-mail Address" id="email" name="user" type="text"  required>
                                      </div>
                                    <div class="form-group">
                                          
                                        <input class="form-control" placeholder="Password" id="pass" name="pass" type="password" value="" required>
                                    </div>
                                    <hr/>
                                    <center>
                                        <button type = "submit" name="login" value="login" class="btn btn-info btn-custom">LOGIN<i class="glyphicon glyphicon-log-in fas fa-sign-in-alt fa-fw"></i></button>
                                    </center>
                                </fieldset>
                            </form>                   
        </div>
        </div>
      </div>
    </div>';
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>