<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
   $hostname = "localhost:8889";
   $username = "root";
   $password = "root";
   $databaseName = "master";
   
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
   // get values form input text and number
   
   $matnum = $_POST['matnum'];
   $list = $_POST['list'];
   //$list = mysql_real_escape_string($list);
   $listnum = $_POST['listnum'];

           
   // mysql query to Update data
   //$query = "UPDATE `mast` SET '".$list."' = '".$listnum."' WHERE `New_mat` = '".$matnum."'";
   
   $query = "UPDATE `mast` SET $list= $listnum WHERE `New_mat`='$matnum'";
   //$query = "UPDATE `mast` SET `ICA` = 2222 WHERE `New_mat` = 6765067";
   $result = mysqli_query($connect, $query);
   
   if($result)
   {
       echo 'Listning updaterad';
       

   }else{
       echo 'Ooops! Något gick fel!!!';
       printf("Errormessage: %s\n", mysqli_error($connect));

   
   }
   mysqli_close($connect);
}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP UPDATE DATA </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        <div>
<form action="update.php" method="post">
  <H3>Lägg in listning</H3>
  <div class="form-group">
    <label for="formGroupExampleInput">Vårt material nummer</label>
    <input type="text" class="form-control" name="matnum"id="matnum" placeholder="Materialnummer" >
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Listningsnummer</label>
    <input type="text" class="form-control" name="listnum" id="listnum" placeholder="Listning" >
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
  <button type="submit" name="update" class="btn btn-primary" >Lägg in listning</button>
</form>
</div>
<br>



    </body>


</html>
