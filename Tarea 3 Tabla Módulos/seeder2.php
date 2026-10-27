<?php

//seeder: para poblar las tablas de mi aplicacion para disponer de datos iniciales

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
    $nombre = 'Sistemas Informáticos';
    $abreviatura = 'SI';
    $creditos = 9.50;
    $horassemanales = 6;
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
    echo ('insert ok<br>');
} catch (\Throwable $error) {
    echo('se ha producido un error, aqui tienes la información: ');
    echo($error->getMessage());
}

