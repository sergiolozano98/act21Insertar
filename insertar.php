<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>NBA</title>
  </head>
  <body>
<?php
if (isset($_POST["nombre"])&&!empty($_POST['nombre'])&&(isset($_POST["ciudad"]))&&!empty($_POST['ciudad'])&&(isset($_POST["conferencia"]))&&(!empty($_POST['conferencia'])&&(isset($_POST["division"])&&(!empty($_POST['division']))))) {
include 'db.php';
echo "Se ha insetado correctamente:";
$equipo=new db();


$equipo->insertarEquipos($_POST["nombre"],$_POST["ciudad"],$_POST["conferencia"],$_POST["division"]);
$devolver = $equipo->buscarEquipo($_POST["nombre"]);
while ($fila = $devolver->fetch_assoc()){
  echo $fila["Nombre"];
}

}
 ?>
  </body>
</html>
