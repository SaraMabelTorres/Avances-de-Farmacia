<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $posicion = $_POST['posicion'];
    $departamento = $_POST['departamento'];
    $salario = $_POST['salario'];
    $fecha_contratacion = $_POST['fecha_contratacion'];
    $genero = $_POST['genero'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];

    $query = "INSERT INTO empleados (nombre, posicion, departamento, salario, fecha_contratacion, genero, edad, telefono, email, estado) 
              VALUES (:nombre, :posicion, :departamento, :salario, :fecha_contratacion, :genero, :edad, :telefono, :email, :estado)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':posicion', $posicion);
    $stmt->bindParam(':departamento', $departamento);
    $stmt->bindParam(':salario', $salario);
    $stmt->bindParam(':fecha_contratacion', $fecha_contratacion);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':estado', $estado);

    if ($stmt->execute()) {
        header('Location: empleados.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado - Farmacia Esencia Saludable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9; /* Color de fondo verde muy claro */
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 30px;
            background-color: #ffffff; /* Fondo blanco para el contenedor */
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        h1 {
            font-weight: 700;
            text-align: center;
            color: #388e3c; /* Verde vibrante */
            margin-bottom: 30px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
            color: #2e7d32; /* Verde oscuro */
        }

        input, select, textarea {
            margin-bottom: 20px;
            background: #f1f8e9; /* Fondo verde claro para los campos */
            border: 2px solid #66bb6a; /* Bordes verde claro */
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            transition: all 0.3s ease;
        }

        input:focus, select:focus, textarea:focus {
            border: 2px solid #d32f2f; /* Rojo al enfocar */
            outline: none;
            background-color: #ffffff; /* Fondo blanco al enfocar */
        }

        button {
            width: 100%;
            background-color: #4caf50; /* Verde pastel */
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            color: white;
            font-size: 18px;
            font-weight: 600;
            padding: 12px 0;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #388e3c; /* Verde más oscuro al pasar el mouse */
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-regresar {
            background-color: #2196f3; /* Azul claro */
            color: white;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .btn-regresar:hover {
            background-color: #1976d2; /* Azul más oscuro al pasar el mouse */
        }
        
        .logo {
            display: block;
            margin: 0 auto 20px auto; /* Centrar el logo y añadir margen inferior */
            width: 150px; /* Ajusta el tamaño según sea necesario */
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo Farmacia Esencia Saludable" class="logo"> <!-- Cambia "logo.png" por la ruta de tu logo -->
        <a href="index.php" class="btn btn-regresar">Regresar a Inicio</a>
        <h1>Agregar Nuevo Empleado</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="posicion" class="form-label">Posición</label>
                <input type="text" class="form-control" id="posicion" name="posicion" required>
            </div>
            <div class="mb-3">
                <label for="departamento" class="form-label">Departamento</label>
                <input type="text" class="form-control" id="departamento" name="departamento" required>
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salario</label>
                <input type="number" class="form-control" id="salario" name="salario" required>
            </div>
            <div class="mb-3">
                <label for="fecha_contratacion" class="form-label">Fecha de Contratación</label>
                <input type="date" class="form-control" id="fecha_contratacion" name="fecha_contratacion" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select class="form-control" id="genero" name="genero" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Empleado</button>
        </form>
    </div>
</body>
</html>
