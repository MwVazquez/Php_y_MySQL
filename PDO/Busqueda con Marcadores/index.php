<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Busca por dos parametros, usando marcadores</h1>
    <h3>Usa la tabla articulos</h3>
    <form action="mostrar.php" method="get">
        <label for="seccion">Seccion</label>
        <input type="text" name="seccion" id="seccion">
        <label for="pais">Pais</label>
        <input type="text" name="pais" id="pais">
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>