<?php
include_once('utilities.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
if( !array_key_exists($id, $alumnos) )
{
  die('No existe dicho alumno.');
}
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Alumno</h3>
          <p>Informacion</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <ul class="pricing-table">
                <li class="title">Detalles del alumno</li>
                <li class="description"><?php echo $alumnos[$id]['Matricula'] ?></li>
                <li class="description"><?php echo $alumnos[$id]['Nombre'] ?></li>
                <li class="description"><?php echo $alumnos[$id]['Carrera'] ?></li>
                <li class="description"><?php echo $alumnos[$id]['Correo'] ?></li>
                <li class="description"><?php echo $alumnos[$id]['Telefono'] ?></li>
              </ul>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>