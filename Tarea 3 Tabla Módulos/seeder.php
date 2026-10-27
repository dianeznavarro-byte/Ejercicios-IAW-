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
    $sql1 = "INSERT INTO modulos 
                values (null, 'Programación', 'PROG', 12.00, 8)";
    $sql2 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales) 
                values ('Bases de Datos', 'BBDD', 9.00, 6)";
    $sql3 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales) 
                values ('Lenguajes de Marcas', 'LMSGI', 6.00, 3),
                        ('Entornos de Desarrollo', 'ED', 4.50, 3)";
    $pdo->exec($sql1);
    echo ('insert 1 ok<br>');
    $pdo->exec($sql2);
    echo ('insert 2 ok<br>');
    $pdo->exec($sql3);
    echo ('insert 3 ok<br>');
} catch (\Throwable $error) {
    echo('se ha producido un error, aqui tienes la información: ');
    echo($error->getMessage());
}

