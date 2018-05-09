<?php
//Array que guardara los alumnos leidos del archivo txt.
$alumnos = null; // Inicializamos en nulo
$file = fopen('alumnos.txt', 'a+'); // Abrimos el archivo
// Sino existe se crear nuevo archivo.
while (!feof($file)) {
    // Obtenemos linea por linea del archivo
    $linea = fgets($file, 4096);
    if ($linea) {
        // Si no esta vacia la linea
        // Se crea un array de la linea separada por comas cada registro.
        $datos = explode(',', $linea);
        // Se asina cada dato leido.
        $alumnos[] = [
            'Matricula' => $datos[0],
            'Nombre' => $datos[1],
            'Carrera' => $datos[2],
            'Correo' => $datos[3],
            'Telefono' => $datos[4]
        ];
    }
    
}
fclose ($file); // Cerramos el archivo

//Array que guardara los maestros leidos del archivo txt.
$maestros = null;  // Inicializamos en nulo
$file = fopen('maestros.txt', 'a+'); // Abrimos el archivo
// Sino existe se crear nuevo archivo.
while (!feof($file)) {
    // Obtenemos linea por linea del archivo
    $linea = fgets($file, 4096);
    if ($linea) {
        // Si no esta vacia la linea
        // Se crea un array de la linea separada por comas cada registro.
        $datos = explode(',', $linea);
        // Se asina cada dato leido.
        $maestros[] = [
            'No' => $datos[0],
            'Carrera' => $datos[1],
            'Nombre' => $datos[2],
            'Telefono' => $datos[3]
        ];
    }
    
}
fclose ($file); // Cerramos el archivo de maestros.txt

// Funcion que permite guardar un alumno dentro del archivo de texto
function guardarAlumno($datos)
{
    $file = fopen('alumnos.txt', 'a+'); // Abrimos el archivo
    $linea = $datos['Matricula'].','.$datos['Nombre'].','.$datos['Carrera'].','.$datos['Correo'].','.$datos['Telefono']."\n";
    fwrite($file, $linea); // Escribimos linea al final del archivo
    fclose($file); // Se cierra el archivo.
}

// Funcion que permite guardar un maestro dentro del archivo de texto
function guardarMaestro($datos)
{
    $file = fopen('maestros.txt', 'a+'); // Abrimos el archivo
    $linea = $datos['No'].','.$datos['Carrera'].','.$datos['Nombre'].','.$datos['Telefono']."\n";
    fwrite($file, $linea); // Escribimos linea al final del archivo
    fclose($file); // Se cierra el archivo.
}

// Metodo para limpiar un string que contenga caracteres especiales
function clean_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
