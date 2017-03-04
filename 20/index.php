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

<form class="" action="filtrado.php" method="post">
  <center>
    <h3>Buscador de equipos y temporadas de la NBA</h3>
  </center>

    <fieldset>
    <legend>Escriba para comprobar posibles coincidencias:</legend>
    <form action="filtrado.php" method="post">
      <label>Equipo_local</label><br>
      <input type="text" name="local" value=""><br>

      <label>Equipo_visitante</label><br>
      <input type="text" name="visitante" value=""><br>

      <label>Temporada</label><br>
      <input type="text" name="temporada" value=""><br>
  </fieldset>
<center><input type="submit" name="" value="Enviar"></center>
  <br>


</form>
<form class="" action="filtrado.php" method="post">

  	<fieldset>
  	<legend>Seleccione para comprobar posibles coincidencias:</legend>

<p><select name="local">
		<option value="">Seleccione un Equipo Local</option>
		<?php
    $resultado=$nba->EquipoLocal();
		foreach($resultado as $fila_pais ){
			echo "<option value=".$fila_pais['equipo_local'].">".$fila_pais['equipo_local']."</option>";
		}
		?>
</select>

</p>
<br>

<p><select name="visitante">
  <option value="">Seleccione un Equipo Visitante</option>
  		<?php
        $resultado=$nba->EquipoVisitante();
  		foreach($resultado as $fila_pais ){
  			echo "<option value=".$fila_pais['equipo_visitante'].">".$fila_pais['equipo_visitante']."</option>";
  		}
  		?>
</select>

</p>
<br>

<p><select name="temporada">
  <option value="">Seleccione una Temporada</option>
  		<?php
        $resultado=$nba->Temporada();
  		foreach($resultado as $fila_pais ){
  			echo "<option value=".$fila_pais['temporada'].">".$fila_pais['temporada']."</option>";
  		}
  		?>
</select>

</p>
<br>
</fieldset>
<center><input type="submit" name="" value="Enviar"></center>
</form>
</body>
</html>
