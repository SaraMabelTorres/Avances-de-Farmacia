<?php
session_start();
require 'db.php'; // Asegúrate de que este archivo se incluya correctamente

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Cambia $pdo por $conn
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = :correo");
    $stmt->execute(['correo' => $correo]);
    $usuario = $stmt->fetch();

    // Verifica si el usuario existe y la contraseña es correcta
    if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
        $_SESSION['usuario_id'] = $usuario['id']; // Guarda el ID del usuario en la sesión
        header("Location: index.php"); // Redirige a la página principal
        exit;
    } else {
        $error = "Correo o contraseña incorrectos."; // Mensaje de error
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Farmacia Esencia Saludable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Definición de los colores principales de la empresa */
        :root {
            --primary-color: #28a745; /* Verde */
            --secondary-color: #ffffff; /* Blanco */
            --accent-color: #1c4b82; /* Color de acento */
        }

        /* Fondo con degradado suave */
        body {
            background: linear-gradient(135deg, #e0e5ec, #ffffff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        /* Contenedor con estilo Neumorphism */
        .login-container {
            background: #e0e5ec;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 20px 20px 60px #bebebe, -20px -20px 60px #ffffff;
            max-width: 450px;
            width: 100%;
            position: relative;
        }

        /* Logo de la empresa */
        .login-container img {
            display: block;
            margin: 0 auto;
            width: 150px;
            height: auto;
            margin-bottom: 20px;
        }

        /* Título con color verde */
        .login-container h2 {
            text-align: center;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 30px;
        }

        /* Estilo de los campos de entrada */
        .form-control {
            padding: 12px 15px;
            border-radius: 30px;
            border: none;
            box-shadow: inset 5px 5px 10px #bebebe, inset -5px -5px 10px #ffffff;
            margin-bottom: 20px;
        }

        /* Iconos dentro de los campos */
        .form-group {
            position: relative;
        }

        .form-group i {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: #6b6c6f;
        }

        .form-control {
            padding-left: 45px;
        }

        /* Botón de inicio de sesión estilo Neumorphism */
        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 12px 15px;
            border-radius: 30px;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 5px 5px 10px #bebebe, -5px -5px 10px #ffffff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #218838; /* Un verde más oscuro */
            box-shadow: inset 5px 5px 10px #bebebe, inset -5px -5px 10px #ffffff;
        }

        /* Enlaces debajo del formulario */
        .extra-links {
            margin-top: 20px;
            text-align: center;
        }

        .extra-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }
        
        /* Alertas con estilo Neumorphism */
        .alert-danger {
            border-radius: 15px;
            padding: 10px;
            box-shadow: 5px 5px 10px #bebebe, -5px -5px 10px #ffffff;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
    <img src="logo.png" alt="Logo Farmacia Esencia Saludable">

        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="POST">
            <!-- Campo de correo electrónico -->
            <div class="form-group">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>

            <!-- Campo de contraseña -->
            <div class="form-group">
                <label for="contrasena" class="form-label">Contraseña</label>
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>

            <!-- Botón de inicio de sesión -->
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>

        <!-- Enlaces adicionales -->
        <div class="extra-links">
            <a href="#">¿Olvidaste tu contraseña?</a>
            <br>
            <a href="#">Crear una cuenta</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


