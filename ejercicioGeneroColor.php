<?php
$alumnos = [
    ['Atienza Bermúdez, Alejandro', 'm', 19],
    ['Calderer Sánchez, Lucas', 'm', 20],
    ['Cano Merino, Carlos', 'm', 21],
    ['Chari, Abdelali', 'm', 18],
    ['García Zarco, Francisco José', 'm', 23],
    ['Gómez Pérez, Samuel', 'm', 22],
    ['Iáñez Navarro, Daniel', 'm', 19],
    ['López Lasheras, Alan', 'm', 24],
    ['Maldonado Cabezas, Francisco', 'm', 25],
    ['Martín Arias, Carlos', 'm', 20],
    ['Moreno González, Alexandra', 'f', 21],
    ['Muñoz Moreno, Elisabet', 'f', 18],
    ['Ourhzif, Aymane', 'm', 22],
    ['Sánchez Ortiz, Emilio David', 'm', 19],
    ['Sánchez Rodríguez, Beatriz', 'f', 23],
    ['Torres Gómez, Ignacio', 'm', 20],
    ['Uréndez Jiménez, Alba', 'f', 24],
    ['Uribe Aranda, Francisco', 'm', 21],
    ['Velasco Clavero, Pablo', 'm', 22],
];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <h1>Visualizando el array</h1>

        <table border="1px">
            <tr>
                <td>#</td>
                <td>Alumno</td>
                <td>Género</td>
                <td>Edad</td>
            </tr>

            <?php
            foreach ($alumnos as $indice => $alumno) {
                $colorEdad = ($alumno[2] % 2 === 0) ? 'blue' : 'green';
                ?>
                <tr>
                    <td><?= $indice ?></td>
                    <td><?= $alumno[0] ?></td>
                    <td><?= $alumno[1] ?></td>
                    <td style="color: <?= $colorEdad ?>;"><?= $alumno[2] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

    </body>
</html>
