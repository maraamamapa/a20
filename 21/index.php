<?php
include"dbNBA.php";

$nba= new dbNBA();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    legend{
      font-family: verdana;
    font-size: 17px;
    }
    h3{
    font-size: 25px;
    }
    </style>
  </head>
  <body>

<form class="" action="insertar.php" method="post">
  <center>
    <h3>Buscador de equipos y temporadas de la NBA</h3>
  </center>
    <fieldset>
    <legend>Rellene los campos de busqueda:</legend>
    <form action="insertar.php" method="post">
      <label>Nombre:</label><br>
      <input type="text" name="nombre" value=""><br>

      <label>Ciudad:</label><br>
      <input type="text" name="ciudad" value=""><br>

      <label>Conferencia:</label><br>
      <input type="text" name="conferencia" value=""><br>
      <label>Division:</label><br>
      <input type="text" name="division" value=""><br>
  </fieldset>
<center><input type="submit" name="" value="Enviar"></center>
</form>
</body>
</html>
