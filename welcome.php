<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Melitta masterdata</h1>
    </div>
    <div class="container">
  <div class="row">
    <div class="col-sm">
    <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
    </div>
    <div class="col-sm">
     
    </div>
    <div class="col-sm">
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    
    </div>
  </div>
</div>

   


</div>

    <div>
    <h3>Välkommen in till masterdatan. <br> Nu ska vi ta oss vidare och visa <a href="table.php">datan</a>.</h3>


    </div>

</body>
</html>






