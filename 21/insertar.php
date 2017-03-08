<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <a class="active" href="Index.php">Inicio</a>
      <?php
      include"dbNBA.php";
      $nba= new dbNBA();
      if ($nba->getErrorConexion()==true) {
               echo "No hay conexion";
              }
              else {
                if ((isset($_POST["nombre"]))&&(!empty($_POST["nombre"]))&&(empty($_POST["ciudad"]))&&(empty($_POST["conferencia"]))
                      &&(empty($_POST["division"]))) {
                  $muestra=$nba->mostrarEquipo($_POST["nombre"]);
                  ?>
                      <table border="1">
                        <tr>
                          <th>Nombre</th>
                          <th>Ciudad</th>
                          <th>Conferencia</th>
                          <th>Division</th>
                        </tr>
                  <?php
                  while ($fila=$muestra->fetch_assoc()) {
                    echo "<tr>";
                      echo "<td>".$fila["Nombre"]."</td>";
                      echo "<td>".$fila["Ciudad"]."</td>";
                      echo "<td>".$fila["Conferencia"]."</td>";
                      echo "<td>".$fila["Division"]."</td>";
                    echo "</tr>";
                    }


                //Crea si no existe
                }elseif(isset($_POST) && (!empty($_POST))){
	$insertar=$nba->InsertarEquipos($_POST["nombre"],$_POST["ciudad"],$_POST["conferencia"],$_POST["division"]);
                    ?>
                        <table border="1">
                          <tr>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Conferencia</th>
                            <th>Division</th>
                          </tr>
                    <?php
                    while ($fila=$insertar->fetch_assoc()) {
                      echo "<tr>";
                        echo "<td>".$fila["Nombre"]."</td>";
                        echo "<td>".$fila["Ciudad"]."</td>";
                        echo "<td>".$fila["Conferencia"]."</td>";
                        echo "<td>".$fila["Division"]."</td>";
                      echo "</tr>";
                      }
                      echo "Se ha añadido correctamente a la Base de Datos:";
                    }
                }
      ?>
  </body>
</html>
