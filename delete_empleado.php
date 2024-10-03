<?php
require 'db.php';

$id = $_GET['id'];

$query = "DELETE FROM empleados WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: empleados.php');
exit;
?>
