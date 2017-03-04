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
  public function EquipoLocal(){
    return $this->conexion->query("SELECT distinct(equipo_local) FROM partidos  GROUP BY equipo_local ASC");
  }
  public function EquipoVisitante(){
    return $this->conexion->query("SELECT distinct(equipo_visitante) FROM partidos");
  }
  public function Temporada(){
    return $this->conexion->query("SELECT distinct(temporada) FROM partidos");
  }

    public function enfrenta($locselect,$visselect,$tempselect){

         $consulta="SELECT * FROM partidos";

          if (!empty($locselect)) {//si no esta vacia la variable $locselect, realiza la siguiente consulta y almacenala en dicha variable
              $consulta=$consulta." WHERE equipo_local='".$locselect."'";
              if (!empty($visselect)) {
                $consulta=$consulta." AND equipo_visitante='".$visselect."'";
              }
              if (!empty($tempselect)) {
                $consulta=$consulta." AND temporada='".$tempselect."'";
              }
              return $this->conexion->query($consulta);
          }
          elseif (!empty($visselect)) {
            $consulta=$consulta." WHERE equipo_visitante='".$visselect."'";
            if (!empty($tempselect)) {
              $consulta=$consulta." AND temporada='".$tempselect."'";
            }
              return $this->conexion->query($consulta);
          }
          elseif (!empty($tempselect)) {
            $consulta=$consulta." WHERE temporada='".$tempselect."'";
            return $this->conexion->query($consulta);
          }else {
            return $this->conexion->query($consulta);
          }
  }
 }
 ?>
