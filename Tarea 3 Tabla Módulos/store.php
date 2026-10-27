<?php

//esta pagina recibe los datos de un módulo nuevo los lee y los utiliza para insertarlo en la tabla de la base de datos 
//a esta pagina se llega con POST


$host     = 'mysql';
$db       = 'siga';
$user     = 'sigauser';
$password = 'sigapassword';
$charset  = 'utf8mb4';

// Definición del Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de configuración de PDO para manejo de errores y seguridad
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    //sentencia preparada -> evitar inyecciones sql
    if(!isset($_POST['name']) || !isset($_POST['abbreviation']) || !isset($_POST['credits']) || !isset($_POST['weeklyhours'])){
        header('Location: error.php');
        exit();
    }
    $nombre = $_POST['name'];
    $abreviatura = $_POST['abbreviation'];
    $creditos = $_POST['credits'];
    $horassemanales = $_POST['weeklyhours'];
    $pdo->exec("TRUNCATE TABLE modulos"); //limpiar la tabla antes de insertar
    $sql = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales) 
                values (:nombre, :abreviatura, :creditos, :horassemanales)";

    $sentencia_preparada = $pdo->prepare($sql);
    $datos = [
        ':nombre' => $nombre,
        ':abreviatura' => $abreviatura,
        ':creditos' => $creditos,
        ':horassemanales' => $horassemanales
    ];
    $sentencia_preparada->execute($datos);
    //redireccionar a la pagina de exito
    //echo ('insert ok<br>');
    header('Location: exito.php');
    exit();
} catch (\Throwable $error) {
    //echo('se ha producido un error, aqui tienes la información: ');
    //echo($error->getMessage());
    //redireccionar a la pagina de error
    echo "<h1>Error de base de datos</h1>";
    echo "<pre>" . $error->getMessage() . "</pre>";
    header('Location: error.php');
    exit();
}

