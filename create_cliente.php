<?php 
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion']; 
    $genero = $_POST['genero'];
    $edad = $_POST['edad'];
    $fecha_registro = date('Y-m-d'); 
    $historial_compras = $_POST['historial_compras'];
    $saldo_pendiente = $_POST['saldo_pendiente'];
    $ultima_compra = $_POST['ultima_compra'];
    $programa_lealtad = $_POST['programa_lealtad'];
    $comentarios = $_POST['comentarios'];
    $estado = $_POST['estado'];

    $query = "INSERT INTO clientes (nombre, email, telefono, direccion, genero, edad, fecha_registro, historial_compras, saldo_pendiente, ultima_compra, programa_lealtad, comentarios, estado) 
              VALUES (:nombre, :email, :telefono, :direccion, :genero, :edad, :fecha_registro, :historial_compras, :saldo_pendiente, :ultima_compra, :programa_lealtad, :comentarios, :estado)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':fecha_registro', $fecha_registro);
    $stmt->bindParam(':historial_compras', $historial_compras);
    $stmt->bindParam(':saldo_pendiente', $saldo_pendiente);
    $stmt->bindParam(':ultima_compra', $ultima_compra);
    $stmt->bindParam(':programa_lealtad', $programa_lealtad);
    $stmt->bindParam(':comentarios', $comentarios);
    $stmt->bindParam(':estado', $estado);

    if ($stmt->execute()) {
        header('Location: clientes.php');
        exit();
    } else {
        echo "Error al insertar el cliente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente - Farmacia Esencia Saludable</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados para un diseño acorde a la farmacia -->
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

        .logo {
            display: block;
            margin: 0 auto 20px auto;
            width: 150px; /* Ajusta el tamaño según sea necesario */
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

        .back-button {
            background-color: #1976d2; /* Azul para el botón de regreso */
            color: white;
            border-radius: 10px;
            padding: 10px 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            text-align: center;
            display: inline-block;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background-color: #1565c0; /* Color más oscuro al pasar el mouse */
            box-shadow: none;
        }

        /* Estilo adicional para las opciones de selección */
        select {
            background: linear-gradient(135deg, #a5d6a7, #81c784); /* Gradiente de verde pastel */
            color: white;
        }

        /* Estilo adicional para el área de comentarios */
        textarea {
            background-color: #e8f5e9; /* Fondo verde muy claro */
        }

        /* Estilo para las opciones de estado */
        option {
            background-color: #fff; /* Fondo blanco para las opciones */
            color: #000; /* Texto negro para opciones */
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo Farmacia Esencia Saludable" class="logo"> <!-- Reemplaza con la URL de tu logo -->
        <h1>Agregar Nuevo Cliente</h1>
        <form action="" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required>

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" required>

            <label for="genero">Género:</label>
            <input type="text" name="genero" required>

            <label for="edad">Edad:</label>
            <input type="number" name="edad" required>

            <label for="historial_compras">Historial de Compras:</label>
            <input type="text" name="historial_compras" required>

            <label for="saldo_pendiente">Saldo Pendiente:</label>
            <input type="number" name="saldo_pendiente" required>

            <label for="ultima_compra">Última Compra:</label>
            <input type="date" name="ultima_compra" required>

            <label for="programa_lealtad">Programa de Lealtad:</label>
            <input type="text" name="programa_lealtad" required>

            <label for="comentarios">Comentarios:</label>
            <textarea name="comentarios"></textarea>

            <label for="estado">Estado:</label>
            <select name="estado" required>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>

            <button type="submit">Guardar Cliente</button>
        </form>

        <!-- Botón para regresar al index -->
        <a href="index.php" class="back-button">Regresar al Inicio</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


