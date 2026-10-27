<?php
//hazme la migracion de la tabla de modulos hazme el seeder de la tabla modulos hazme el create de el store 
$sql = "CREATE TABLE IF NOT EXISTS modulos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL unique,
        abreviatura VARCHAR(5) NOT NULL unique,
        creditos decimal(4, 2) NOT NULL,
        horassemanales smallint
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";