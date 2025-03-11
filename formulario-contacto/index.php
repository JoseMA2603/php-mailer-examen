<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
</head>
<body>
    <h2>Formulario de Contacto</h2>
    <form id="contactForm" action="enviar.php" method="post">
        <label for="asunto">Nombre:</label><br>
        <input type="text" id="nombre" name="asunto" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" required></textarea><br>
        <input type="submit" value="Enviar">
    </form>

    <script src="validacion.js"></script>
</body>
</html>