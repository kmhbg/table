<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) && $_SESSION["premissions"] !== 'admin'|| $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
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
        <a class="nav-link" href="listingsTable.php">Listningar</a>
      </li>
 
      <li class="nav-item">
        <a class="nav-link" href="reset-password.php">Byt lösenord</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logga ut</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Användare: <?php echo htmlspecialchars($_SESSION["username"]); ?></a>
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


<!-- Formular -->


<form>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Materialnummer</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Materialnummer">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Artikelnummer</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Artnummer">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">GTIN CU</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="GTIN">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">GTIN TU</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="GTIN">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">GTIN Pall</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="GTIN">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-2">
    <label for="inputAddress">Beskrivning SE</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Beskrivning SE">
  </div>
  <div class="form-group col-md-2">
    <label for="inputAddress2">Beskrivning DK</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Beskrivning DK">
  </div>
</div>
  <div class="form-row">
  <div class="form-group col-md-3">
      <label for="inputState">Varumärke</label>
      <select id="inputState" class="form-control">
        <option selected>Välj..</option>
        <option>Melitta</option>
        <option>Toppits</option>
        <option>Swirl</option>
        <option>VCB?</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Produktgrupp</label>
      <select id="inputState" class="form-control">
        <option selected>Välj..</option>
        <option>Kaffe</option>
        <option>Tillbehör</option>
        <option>Glaskannor</option>
        <option>Thermakannor</option>
        <option>Vattenkokare</option>
        <option>Kaffemaskiner</option>
        <option>Kaffebryggare</option>
        <option>Kaffefilter, Oblekta</option>
        <option>Kaffefilter, Vita</option>
        <option>Kaffefilter Premium</option>
        <option>Avkalk. & Rengöring</option>
        <option>Tefilter</option>
        <option>Accessoarer</option>
        <option>Kartong</option>
        <option>Dammsugarpåsar</option>
        <option>Dammsugartillbehör</option>
        <option>Våt och torrdammsugning</option>
        <option>Avfallspåsar</option>
        <option>All & hyllpapper</option>
        <option>Tillbehör danmark</option>
        <option>Promotion Buzzador</option>
        <option>Promotion starterkit</option>
        <option>Aluminiumformar</option>
        <option>Frys & Förvaringspåsar</option>
        <option>Frys & Istärningspåsar</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">Land</label>
      <select id="inputState" class="form-control">
        <option selected>Välj..</option>
        <option>Nordic</option>
        <option>SE</option>
        <option>DK</option>
        <option>NO</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">Status</label>
      <select id="inputState" class="form-control">
        <option selected>Välj..</option>
        <option></option>
        <option>X</option>
        <option>C</option>
        <option>N</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-1">
      <label for="inputEmail4">SP CU</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="SP">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Djup CU</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Djup">
    </div>
    <div class="form-group col-md-1">
      <label for="inputEmail4">Bredd CU</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Bredd">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Höjd CU</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Höjd">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Vikt KG CU</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Vikt">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">CU per TU</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Antal">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">CU 2 Per TU</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Antal">
    </div>
    <div class="form-group col-md-1">
      <label for="inputEmail4">Djup TU</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Djup">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Bredd TU</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Bredd">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Höjd KG TU</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Höjd">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Vikt KG per TU</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Vikt">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Spara</button>
</form>




 

    <!-- </script>  -->
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
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

</script>




</body>
</html>
