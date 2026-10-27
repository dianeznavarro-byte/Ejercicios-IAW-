<?php
/*CREATE USER 'sigauser'@'%' IDENTIFIED WITH sha256_password BY 'sigapassword';
GRANT USAGE ON *.* TO 'sigauser'@'%';
ALTER USER 'sigauser'@'%' REQUIRE NONE 
    WITH MAX_QUERIES_PER_HOUR 0 
         MAX_CONNECTIONS_PER_HOUR 0 
         MAX_UPDATES_PER_HOUR 0 
         MAX_USER_CONNECTIONS 0;

GRANT ALL PRIVILEGES ON `siga`.* TO 'sigauser'@'%';
*/
/*
CREATE TABLE modulos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    abreviatura VARCHAR(5) NOT NULL UNIQUE,
    creditos DECIMAL(4,2) NOT NULL,
    horassemanales SMALLINT
);
*/
/*variables de conexion*/
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

/*si la ejecución falla, se llama al bloque del catch y se le pasa la información del error (php) */
try {
    $pdo = new PDO($dsn, $user, $password, $options);
    echo('conexion establecida con exito.<br>');

    $sql = "CREATE TABLE IF NOT EXISTS modulos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL unique,
        abreviatura VARCHAR(5) NOT NULL unique,
        creditos decimal(4, 2) NOT NULL,
        horassemanales smallint
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    //3. Ejecutar la sentencia en el servidor
    $pdo->exec($sql);
    echo('tabla creada con exito.<br>');

} catch (\Throwable $error) {
    echo('se ha producido un error, aqui tienes la información: ');
    echo ('<pre>' . var_export($error, true) . '</pre>');
    echo($error->getMessage());
}