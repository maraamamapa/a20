<?php
include"dbNBA.php";

$nba= new dbNBA();


if ($nba->getErrorConexion()==true) {
         echo "Sin conexion";
        }
        else {
				if (isset($_POST['local']) && (!empty($_POST['local']) ) ) {
          echo "<a href="."index.php".">Comprobar otro resultado</a>";
/*una vez seleccionas los equipos y la temporada que deseas ver, llamamos a la funcion enfrenta para mostrar
dichos resultados*/
$resultado=$nba->enfrenta($_POST["local"],$_POST["visitante"],$_POST["temporada"]);
?>
  <center>
    <table border="1">
      <tr>
        <th>Equipo local</th>
        <th>Equipo Visitante</th>
        <th>Temporada</th>
      </tr>
<?php
      for($i=0;$i<$resultado->num_rows;$i++){//devuelve todas las filas del array
          $fila=$resultado->fetch_assoc();//Aqui almacenamos cada una de las filas.
            echo "<tr>";
  				    echo "<td>".$fila["equipo_local"]."</td>";
  				    echo "<td>".$fila["equipo_visitante"]."</td>";
  				    echo "<td>".$fila["temporada"]."</td>";
            echo "</tr>";
				  }

				}else {
				  header('Location: http://localhost/20/index.php'); // si da error, te redirige de nuevo a la pantalla de inicio (la vista)

				}
}
?>
  </table>
</center>
