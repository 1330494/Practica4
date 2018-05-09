<?php  

include 'utilities.php';

// Creamos variables temporales
$no_empleado = $nombre = $carrera = $telefono = '';
$no_empleadoErr = $nombreErr = $carreraErr = $telefonoErr = '';

// Si se ejecuto el submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Validamos No. de empleado
	if (empty($_POST["no"])) {// Si esta vacio
        $no_empleadoErr = "Numero de empleado es requerido."; // Creamos error
    } else {
    	//De lo contrario se asigna a la variable.
    	$no_empleado = clean_input($_POST["no"]);
    }

    // Validamos telefono
	if (empty($_POST["telefono"])) { // Si no existe numero
        $telefonoErr = "Telefono es requerido."; // Mandamos error
    } else {
    	// Sino se asigna a la variable telefono.
    	$telefono = $_POST["telefono"];
    }

    // Validamos Nombre
    if (empty($_POST["nombre"])) { //Si no hay nombre
        $nombreErr = "Nombre es requerido."; // Creamos error
    } else {
        // Si el nombre contiene letras y espacios
        if (!preg_match("/^[a-zA-Z ]*$/",clean_input($_POST["nombre"]))) {
        	// Cremos error de nombre
            $nombreErr = "Solo letras y espacios permitidos.";
        }else{
        	// Sino se asigna a la variable nombre.
        	$nombre = clean_input($_POST["nombre"]);
        }
    }

    // Validamos la carrera
    if (empty($_POST["carrera"])) {
        $carreraErr = "Carrera es requerida.";
    } else {
        
        // Si la carrera contiene letras y espacios
        if (!preg_match("/^[a-zA-Z ]*$/",clean_input($_POST["carrera"]))) {
        	// Cremos error de carrera
            $carreraErr = "Solo letras y espacios permitidos.";
        }else{
        	// Sino se asigna a la variable carrera.
        	$carrera = clean_input($_POST["carrera"]);
        }
    }

    // Comprobamos que todos los campos esten completos
    if ($no_empleado!='' && $nombre!='' && $carrera!='' && $telefono!='') 
    {
    	// Se crea una variable llamada maestro con todos los datos
    	$maestro = [
            'No' => $no_empleado,
            'Carrera' => $nombre,
            'Nombre' => $carrera,
            'Telefono' => (int)$telefono
        ];
        // Se manda guardar maestro al archivo maestros.txt
        guardarMaestro($maestro);
        header('Location: index.php'); // Redireccionamos al inicio
    }
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
    	<div class="large-6 columns">
    		<h3>Nuevo Maestro</h3>
    		<section class="section">
    			<div class="content" data-slug="panel1">
    				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		                
		                No. Empleado: <input type="text" name="no" value="<?php echo $no_empleado;?>">
		                <span class="error">* <?php echo $no_empleadoErr;?></span>
		                
		                Carrera: <input type="text" name="carrera" value="<?php echo $carrera;?>">
		                <span class="error">* <?php echo $carreraErr;?></span>
		                
		                Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>">
		                <span class="error">* <?php echo $nombreErr;?></span>	              
		                
		                Telefono: <input type="number" name="telefono" value="<?php echo $telefono;?>">
		                <span class="error">* <?php echo $telefonoErr;?></span>
		                
		                <br>
		                <center><input type="submit" name="submit" value="Guardar"></center>
		            </form>
    			</div>
    		</section>
    	</div>
    </div>
    <?php require_once('footer.php'); ?>