<?php
require 'db.php';

$id = $_GET['id'];

$query = "SELECT * FROM proveedores WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$proveedor = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $producto_principal = $_POST['producto_principal'];
    $categoria_producto = $_POST['categoria_producto'];
    $tipo_empresa = $_POST['tipo_empresa'];
    $metodo_pago_preferido = $_POST['metodo_pago_preferido'];
    $plazo_entrega = $_POST['plazo_entrega'];
    $rfc_nif = $_POST['rfc_nif'];
    $volumen_pedidos = $_POST['volumen_pedidos'];
    $fecha_registro = $_POST['fecha_registro'];
    $sitio_web = $_POST['sitio_web'];
    $calificacion = $_POST['calificacion'];
    $notas = $_POST['notas'];
    $estado = $_POST['estado'];

    $query = "UPDATE proveedores SET nombre = :nombre, contacto = :contacto, telefono = :telefono, 
              email = :email, direccion = :direccion, producto_principal = :producto_principal, 
              categoria_producto = :categoria_producto, tipo_empresa = :tipo_empresa, 
              metodo_pago_preferido = :metodo_pago_preferido, plazo_entrega = :plazo_entrega, 
              rfc_nif = :rfc_nif, volumen_pedidos = :volumen_pedidos, 
              fecha_registro = :fecha_registro, sitio_web = :sitio_web, 
              calificacion = :calificacion, notas = :notas, estado = :estado 
              WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':contacto', $contacto);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':producto_principal', $producto_principal);
    $stmt->bindParam(':categoria_producto', $categoria_producto);
    $stmt->bindParam(':tipo_empresa', $tipo_empresa);
    $stmt->bindParam(':metodo_pago_preferido', $metodo_pago_preferido);
    $stmt->bindParam(':plazo_entrega', $plazo_entrega);
    $stmt->bindParam(':rfc_nif', $rfc_nif);
    $stmt->bindParam(':volumen_pedidos', $volumen_pedidos);
    $stmt->bindParam(':fecha_registro', $fecha_registro);
    $stmt->bindParam(':sitio_web', $sitio_web);
    $stmt->bindParam(':calificacion', $calificacion);
    $stmt->bindParam(':notas', $notas);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: proveedores.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor - Farmacia Esencia Saludable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Proveedor</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $proveedor['nombre'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="contacto" class="form-label">Contacto</label>
                <input type="text" class="form-control" id="contacto" name="contacto" value="<?= $proveedor['contacto'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $proveedor['telefono'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $proveedor['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $proveedor['direccion'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="producto_principal" class="form-label">Producto Principal</label>
                <input type="text" class="form-control" id="producto_principal" name="producto_principal" value="<?= $proveedor['producto_principal'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="categoria_producto" class="form-label">Categoría de Producto</label>
                <input type="text" class="form-control" id="categoria_producto" name="categoria_producto" value="<?= $proveedor['categoria_producto'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tipo_empresa" class="form-label">Tipo de Empresa</label>
                <input type="text" class="form-control" id="tipo_empresa" name="tipo_empresa" value="<?= $proveedor['tipo_empresa'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="metodo_pago_preferido" class="form-label">Método de Pago Preferido</label>
                <input type="text" class="form-control" id="metodo_pago_preferido" name="metodo_pago_preferido" value="<?= $proveedor['metodo_pago_preferido'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="plazo_entrega" class="form-label">Plazo de Entrega</label>
                <input type="text" class="form-control" id="plazo_entrega" name="plazo_entrega" value="<?= $proveedor['plazo_entrega'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="rfc_nif" class="form-label">RFC/NIF</label>
                <input type="text" class="form-control" id="rfc_nif" name="rfc_nif" value="<?= $proveedor['rfc_nif'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="volumen_pedidos" class="form-label">Volumen de Pedidos</label>
                <input type="number" class="form-control" id="volumen_pedidos" name="volumen_pedidos" value="<?= $proveedor['volumen_pedidos'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" value="<?= $proveedor['fecha_registro'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="sitio_web" class="form-label">Sitio Web</label>
                <input type="text" class="form-control" id="sitio_web" name="sitio_web" value="<?= $proveedor['sitio_web'] ?>">
            </div>
            <div class="mb-3">
                <label for="calificacion" class="form-label">Calificación</label>
                <input type="number" class="form-control" id="calificacion" name="calificacion" value="<?= $proveedor['calificacion'] ?>" min="1" max="5">
            </div>
            <div class="mb-3">
                <label for="notas" class="form-label">Notas</label>
                <textarea class="form-control" id="notas" name="notas"><?= $proveedor['notas'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1" <?= $proveedor['estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                    <option value="0" <?= $proveedor['estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Actualizar Proveedor</button>
        </form>
    </div>
</body>
</html>
