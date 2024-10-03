<?php
require 'db.php';

$id = $_GET['id'];

$query = "SELECT * FROM clientes WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$cliente = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $genero = $_POST['genero'];
    $edad = $_POST['edad'];
    $fecha_registro = $_POST['fecha_registro'];
    $historial_compras = $_POST['historial_compras'];
    $saldo_pendiente = $_POST['saldo_pendiente'];
    $ultima_compra = $_POST['ultima_compra'];
    $programa_lealtad = $_POST['programa_lealtad'];
    $comentarios = $_POST['comentarios'];
    $estado = $_POST['estado'];

    $query = "UPDATE clientes SET nombre = :nombre, email = :email, telefono = :telefono, 
              direccion = :direccion, genero = :genero, edad = :edad, fecha_registro = :fecha_registro, 
              historial_compras = :historial_compras, saldo_pendiente = :saldo_pendiente, 
              ultima_compra = :ultima_compra, programa_lealtad = :programa_lealtad, 
              comentarios = :comentarios, estado = :estado 
              WHERE id = :id";
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
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: clientes.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente - Farmacia Esencia Saludable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Cliente</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $cliente['nombre'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $cliente['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $cliente['telefono'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $cliente['direccion'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select class="form-control" id="genero" name="genero" required>
                    <option value="Masculino" <?= $cliente['genero'] == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                    <option value="Femenino" <?= $cliente['genero'] == 'Femenino' ? 'selected' : '' ?>>Femenino</option>
                    <option value="Otro" <?= $cliente['genero'] == 'Otro' ? 'selected' : '' ?>>Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?= $cliente['edad'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" value="<?= $cliente['fecha_registro'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="historial_compras" class="form-label">Historial de Compras</label>
                <textarea class="form-control" id="historial_compras" name="historial_compras"><?= $cliente['historial_compras'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="saldo_pendiente" class="form-label">Saldo Pendiente</label>
                <input type="number" class="form-control" id="saldo_pendiente" name="saldo_pendiente" value="<?= $cliente['saldo_pendiente'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="ultima_compra" class="form-label">Última Compra</label>
                <input type="date" class="form-control" id="ultima_compra" name="ultima_compra" value="<?= $cliente['ultima_compra'] ?>">
            </div>
            <div class="mb-3">
                <label for="programa_lealtad" class="form-label">Programa de Lealtad</label>
                <input type="text" class="form-control" id="programa_lealtad" name="programa_lealtad" value="<?= $cliente['programa_lealtad'] ?>">
            </div>
            <div class="mb-3">
                <label for="comentarios" class="form-label">Comentarios</label>
                <textarea class="form-control" id="comentarios" name="comentarios"><?= $cliente['comentarios'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1" <?= $cliente['estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                    <option value="0" <?= $cliente['estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>

