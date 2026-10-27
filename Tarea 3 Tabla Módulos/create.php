<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de alta de módulos</h1>
     <form action="store.php" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="" placeholder="Introduce el nombre del módulo" required minlength="2" maxlength="100">
        <br>
        <label for="abbreviation">Abreviatura:</label>
        <input type="text" name="abbreviation" id="abbreviation" value="" placeholder="Introduce la abreviatura del módulo" required minlength="1" maxlength="5">
        <br>
        <label for="credits">Créditos:</label>
        <input type="number" name="credits" id="credits" value="" placeholder="Créditos" min="0" max="99.99" step="0.01" required>
        <br>
        <label for="weeklyhours">Horas semanales:</label>
        <input type="number" name="weeklyhours" id="weeklyhours" value="" placeholder="Horas semanales" min="0" max="40" step="1" required>
        <br>
        <button type="submit">Alta Módulo</button>
    </form>
</body>
</html>
