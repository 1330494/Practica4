<?php
include_once('utilities.php');

// Obtenemos el total de los alumnos si es diferente de null.
if($alumnos!=null)
  $total_alumnos = count($alumnos);
else
  $total_alumnos = 0; // De lo contrario se asigna 0

if($maestros!=null)
  $total_maestros = count($maestros);
else
  $total_maestros = 0; // De lo contrario se asigna 0
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
      <?php // Seccion para mostrar alumnos ?>
      <div class="large-9 columns">
        <h3>Alumnos</h3>
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_alumnos!=0){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">Matricula</th>
                    <th width="250">Nombre</th>
                    <th width="250">Carrera</th>
                    <th width="250">Correo</th>
                    <th width="250">Telefono</th>
                    <th width="250">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $alumnos as $id => $user ){ ?>
                  <tr>
                    <td><?php echo $user['Matricula'] ?></td>
                    <td><?php echo $user['Nombre'] ?></td>
                    <td><?php echo $user['Carrera'] ?></td>
                    <td><?php echo $user['Correo'] ?></td>
                    <td><?php echo $user['Telefono'] ?></td>
                    <td><a href="./alumno.php?id=<?php echo $id; ?>" class="button radius tiny secondary">Ver detalles</a></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_alumnos; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>
    </div>

    <div class="row">
      <?php // Seccion para mostrar maestros ?>
      <div class="large-9 columns">
        <h3>Maestros</h3>
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_maestros!=0){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">No. Empleado</th>
                    <th width="250">Carrera</th>
                    <th width="250">Nombre</th>
                    <th width="250">Telefono</th>
                    <th width="250">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($maestros as $id => $user){ ?>
                  <tr>
                    <td><?php echo $user['No'] ?></td>
                    <td><?php echo $user['Carrera'] ?></td>
                    <td><?php echo $user['Nombre'] ?></td>
                    <td><?php echo $user['Telefono'] ?></td>
                    <td><a href="./maestro.php?id=<?php echo $id; ?>" class="button radius tiny secondary">Ver detalles</a></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_maestros; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>
    </div>
    <?php require_once('footer.php'); ?>