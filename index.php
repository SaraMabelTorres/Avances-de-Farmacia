<?php
// Conexión a la base de datos
require 'db.php';
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redirigir al login si no está autenticado
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia Esencia Saludable</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom right, #e0f7fa, #f0f8ff);
        }
        .navbar {
            background-color: #1c4b82;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: bold;
            color: #ffffff;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            height: 45px;
            margin-right: 10px;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
            font-size: 1.1rem;
            margin-left: 15px;
        }
        .navbar-nav .nav-link:hover {
            color: #cce1ff;
            transition: 0.3s;
        }
        .header-content {
            text-align: center;
            padding: 100px 20px;
            color: #1c4b82;
            background: url('image (1).png') no-repeat center center;
            background-size: cover;
            color: rgb(178, 255, 188);
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.3);
        }
        .header-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            margin-bottom: 30px;
            font-weight: 700;
        }
        .header-content p {
            font-size: 1.4rem;
            margin-top: 20px;
        }
        .btn {
            width: 250px;
            margin: 15px;
            padding: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #1c4b82;
            border: none;
            color: white;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: white;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }
        .btn-primary:hover {
            background-color: #163c67;
        }
        footer {
            background-color: #1c4b82;
            color: white;
            padding: 40px 0;
            text-align: center;
        }
        footer a {
            color: #cce1ff;
            text-decoration: none;
        }
        footer a:hover {
            color: #ffffff;
        }
        .contact-info {
            margin-top: 30px;
            font-size: 1.1rem;
        }
        .social-icons a {
            color: #ffffff;
            margin: 0 10px;
            font-size: 1.5rem;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            color: #cce1ff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="Logo Farmacia">
                Farmacia Esencia Saludable
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="proveedores.php">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="empleados.php">Empleados</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="header-content">
        <h1>Bienvenido a Esencia Saludable</h1>
        <p>Medicinas y mucho más, con el mejor cuidado para tu salud. Explora nuestros servicios y recursos.</p>
    </header>
    
    <div class="container text-center mt-5">
        <a href="clientes.php" class="btn btn-primary">
            <i class="fas fa-users"></i> Registro de Clientes
        </a>
        <a href="proveedores.php" class="btn btn-primary">
            <i class="fas fa-truck"></i> Registro de Proveedores
        </a>
        <a href="empleados.php" class="btn btn-primary">
            <i class="fas fa-user-tie"></i> Registro de Empleados
        </a>
    </div>

    <footer>
        <p>&copy; 2024 Farmacia Esencia Saludable</p>
        <p class="contact-info">Contacto: +1 234 567 890 | contacto@esenciasaludable.com</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
