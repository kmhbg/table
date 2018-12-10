<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }

        #inputfilter {
    background-image: url('/css/searchicon.svg'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="table.php">Masterdata</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php">Startsidan <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="table.php">Masterdata</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newMaterial.php">Nytt material</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reset-password.php">Byt lösenord</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logga ut</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Logga ut</a>
          <a class="dropdown-item" href="#">Byt lösenord</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
  </div>
</nav>
<br>


<?php
if(isset($_POST['update']))
{
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "master";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

    //be sure to validate and clean your variables
    $matnum = $_POST['matnum'];
    $listnum = $_POST['listnum'];
    $list = $_POST['list'];
 
    //then you can use them in a PHP function. 
    // $result = myFunction($val1, $val2);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE `mast` SET $list= $listnum WHERE `New_mat`='$matnum'";


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
    printf("Errormessage: %s\n", mysqli_error($conn));
}

mysqli_close($conn);
}
?>

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Lägg till ny listning i masterdatan
  </button>


<div class="collapse" id="collapseExample">
  <div class="card card-body">
<form action="listingsTable.php" method="post">
  <H3>Lägg in listning</H3>
  <div class="form-group">
    <label for="formGroupExampleInput">Vårt material nummer</label>
    <input type="text" class="form-control" name="matnum" id="matnum" placeholder="Materialnummer" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Listningsnummer</label>
    <input type="text" class="form-control" name="listnum" id="listnum" placeholder="Listning" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Välj kund</label>
    <select class="form-control" name="list" id="list">
      <option>ICA</option>
      <option>EEL</option>
      <option>Mediamarkt</option>
      <option>Bdahl</option>
      <option>Axfood</option>
      <option>Coop</option>
      <option>Expert</option>
      <option>Elkjop</option>
      <!-- SQLkod för uppdatering av lista UPDATE `mast` SET `ICA`='' WHERE `New_mat`='6765067' -->
    </select>
  </div>
  <button type="submit" name="update" class="btn btn-primary">Lägg in listning</button>
</form>
</div>
</div>
<br>

<!-- <a class="btn btn-primary btn-lg" href="welcome.php">Back</a> -->
<input type="text" id="inputfilter"  placeholder="Sök i masterdatan">
<?php
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
header('Content-Type: text/html; charset=UTF-8');

mb_internal_encoding('UTF-8'); 
mb_http_output('UTF-8'); 
mb_http_input('UTF-8'); 
mb_regex_encoding('UTF-8'); 

$host    = "localhost:8889";
$user    = "root";
$pass    = "root";
$db_name = "master";

//create connection
$connection = mysqli_connect($host, $user, $pass, $db_name);

//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}

//get results from database
$result = mysqli_query($connection,"SELECT `Brand`,`New_mat`,`Art_nr`,`Description_SE`,`ICA`, `Coop`, `Bdahl`, `Axfood`, `EEL`, `Elkjop`, `Mediamarkt`, `Expert` FROM `mast`");
$all_property = array();  //declare an array for saving property

//showing property
echo '<div><table id="myTable" class="table table-striped">
        <thead>
        <tr class="header">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    echo '<td>' . $property->name . '</td>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
}
echo '</tr></thead>'; //end tr tag

//showing all data

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    foreach ($all_property as $item) {
        echo '<td>' . $row[$item] . '</td>'; //get items using property value
    }
    echo '</tr>';
}
echo "</table></div>";
?>




<!-- <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#inputfilter").keyup(function(){
		filter = new RegExp($(this).val(),'i');
		$("#myTable tbody tr").filter(function(){
			$(this).each(function(){
				found = false;
				$(this).children().each(function(){
					content = $(this).html();
					if(content.match(filter))
					{
						found = true
					}
				});
				if(!found)
				{
					$(this).hide();
				}
				else
				{
					$(this).show();
				}
			});
		});
	});
});


</script>






</body>
</html>