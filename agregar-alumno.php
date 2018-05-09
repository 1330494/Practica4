<?php  
include 'utilities.php';

// Creamos variables temporales
$matricula = $nombre = $carrera = $email = $telefono = '';
$matriculaErr = $nombreErr = $carreraErr = $emailErr = $telefonoErr = '';

// Si se ejecuta el submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Validamos matricula
	if (empty($_POST["matricula"])) {// Si esta vacia
        $matriculaErr = "Matricula es requerida."; // Creamos error
    } else {
    	//De lo contrario se asigna a la variable.
    	$matricula = clean_input($_POST["matricula"]);
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

    // Validamos el correo
    if (empty($_POST["email"])) {
        $emailErr = "Email es requerido.";
    } else {
        // Si el e-mail esta bien no escrito 
        if (!filter_var(clean_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        	// Creamos error de email
            $emailErr = "Invalid email format";
        }else{
        	//Sino se asigna a la variable email.
        	$email = clean_input($_POST["email"]);
        }
    }

    // Comprobamos que todos los campos esten completos
    if ($matricula!='' && $nombre!='' && $carrera!='' && $email!='' && $telefono!='') 
    {
    	// Se crea una variable llamada alumno con todos los datos
    	$alumno = [
            'Matricula' => $matricula,
            'Nombre' => $nombre,
            'Carrera' => $carrera,
            'Correo' => $email,
            'Telefono' => (int)$telefono
        ];
        // Se manda guardar alumno al archivo alumnos.txt
        guardarAlumno($alumno);
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
    		<h3>Nuevo Alumno</h3>
    		<section class="section">
    			<div class="content" data-slug="panel1">
    				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		                
		                Matricula: <input type="text" name="matricula" value="<?php echo $matricula;?>">
		                <span class="error">* <?php echo $matriculaErr;?></span>
		                
		                Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>">
		                <span class="error">* <?php echo $nombreErr;?></span>
		                
		                Carrera: <input type="text" name="carrera" value="<?php echo $carrera;?>">
		                <span class="error">* <?php echo $carreraErr;?></span>	              
		                
		                E-mail: <input type="text" name="email" value="<?php echo $email;?>">
		                <span class="error">* <?php echo $emailErr;?></span>
		                
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