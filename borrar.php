<?php
include 'funciones.php';
include 'conexion.php';

$resultado = [
  'error' => false,
  'mensaje' => ''
];

try {
  $conexion = new conexion();
  $conexion = $conexion->obtenerConexion();
    
  $id = $_GET['id'];
  $consultaSQL = "DELETE FROM alumnos WHERE id =" . $id;

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  header('Location: /index.php');

} catch(PDOException $error) {
  $resultado['error'] = true;
  $resultado['mensaje'] = $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>

<div class="container mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger" role="alert">
        <?= $resultado['mensaje'] ?>
      </div>
    </div>
  </div>
</div>

<?php require "templates/footer.php"; ?>