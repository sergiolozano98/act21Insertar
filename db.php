<?php
/**
 * Permitir la conexion contra la base de datos
 */
class db
{
  //Atributos necesarios para la conexion
  private $host="localhost";
  private $user="root";
  private $pass="";
  private $db_name="nba";

  //Conector
  private $conexion;

  //Propiedades para controlar errores
  private $error=false;

  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  //Funcion para saber si hay error en la conexion
  function hayError(){
    return $this->error;
  }

  //Funciones para la devolucion de resultados
  public function devolverEquipos($equipo){
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT * FROM partidos where equipo_local=".$equipo);
      return $resultado;
    }else{
      return null;
    }
  }


  public function devolverEquiposConf(){
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT nombre,conferencia FROM equipos");
      return $resultado;
    }else{
      return null;
    }
  }


  function insertarEquipos($nombre,$ciudad,$conferencia,$division){

  $sqlinsert="INSERT INTO equipos(Nombre,Ciudad,Conferencia,Division) VALUES ('".$nombre."','".$ciudad."','".$conferencia."','".$division."')";
  if (!$this->conexion->query($sqlinsert)) {
   echo "Fallo en la creacion de la tabla:".$this->conexion->connect_errno;
   return False;
  }
  }

  public function buscarEquipo($equipo){
    if($this->error==false){
      $resultado3 = $this->conexion->query("SELECT * FROM equipos where Nombre='".$equipo."'");
      return $resultado3;
    }else{
      return null;
    }
  }
}





 ?>
