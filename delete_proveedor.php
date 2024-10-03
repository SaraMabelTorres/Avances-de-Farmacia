<?php
require 'db.php';

$id = $_GET['id'];

$query = "DELETE FROM proveedores WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header('Location: proveedores.php');
    exit;
} else {
    echo "Error al eliminar el proveedor.";
}
?>
