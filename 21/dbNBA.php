<?php

class dbNBA{
//variables para identificar la base de datos
  private $IP="localhost";
  private $USUARIO="root";
  private $CONTRASEÑA="";
  private $DB="nba";

  private $conexion;
  private $error=false;


  function __construct(){
    $this->conexion = new mysqli($this->IP, $this->USUARIO, $this->CONTRASEÑA, $this->DB);
    if ($this->conexion->connect_errno){
      $this->error=true;
    }
  }
  //funciones
  public function getErrorConexion(){
    return $this->error;
  }
    public function InsertarEquipos($nombre,$ciudad,$conferencia,$division){
     $insert="INSERT INTO equipos(nombre,ciudad,conferencia,division) VALUES('".$nombre."','".$ciudad."','".$conferencia."','".$division."')";
     $this->conexion->query($insert);
     return $this->conexion->query("SELECT * FROM equipos WHERE nombre='".$nombre."' AND ciudad='".$ciudad."' AND conferencia='".$conferencia."' AND division='".$division."'");

   }
   public function mostrarEquipo($nombre){
    return $this->conexion->query("SELECT * FROM equipos WHERE nombre='".$nombre."'");
  }


 }
 ?>
