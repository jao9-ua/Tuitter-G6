<?php
session_start();
try{
// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST['submit'])) {

    // Obtener los datos del formulario
    $identificador = $_POST['identificador'];
    $password = $_POST['password'];

    // Conectarse a la base de datos
    $dsn = "mysql:host=localhost;dbname=dss;charset=utf8mb4";
    $usuario = "dss";
    $contraseña = "dss";

    try {
        $conexion = new PDO($dsn, $usuario, $contraseña);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error al conectarse a la base de datos: " . $e->getMessage();
        exit();
    }

    // Verificar las credenciales del usuario
    // Corregir la consulta SQL para que verifique tanto el campo "Nombre" como el campo "email"
    $stmt = $conexion->prepare("SELECT * FROM Usuario WHERE (Nombre = :identificador OR email = :identificador) AND password = :password");
    $stmt->execute(['identificador' => $identificador, 'password' => $password]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        // Establecer una sesión de usuario
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];

        // Redirigir al usuario a la página correspondiente
        header("Location: index.php");
        exit();
    } else {
        // Mostrar un mensaje de error si las credenciales son inválidas
        $mensaje_error = "El nombre de usuario o la contraseña son incorrectos.";
    }
}
} catch (Exception $o) {
    echo "Error al conectarse a la base de datos: " . $e->getMessage();
    exit();
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <style>
    #login-form {
        width: 50%; /* Ancho del formulario */
        margin: 0 auto; /* Centrar en la mitad de la página */
        background-color: #72bb53;
        padding: 20px;
        text-align: center; /* Justificar el texto */
    }
    
    #login-form label, #login-form input {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }

    #login-form button {
        margin-top: 10px;
    }
</style>

</head>
<body>
    <div id="login-form">
        <?php if (isset($mensaje_error)) { ?>
            <p><?php echo $mensaje_error; ?></p>
        <?php } ?>

        <form method="post" action="login.php">
            <label for="identificador">Nombre de usuario o email</label>
            <input type="text" name="identificador" required>

            <label for="password">Contraseña</label>
            <input type="password" name="password" required>

            <button type="submit" name="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
