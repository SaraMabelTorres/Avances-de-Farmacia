<?php
require 'db.php';

$id = $_GET['id'];

$query = "DELETE FROM clientes WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: clientes.php');
exit;
?>
