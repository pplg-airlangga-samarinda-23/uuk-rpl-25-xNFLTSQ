<?php
session_start();
include 'config/db.php';
if ($_SESSION['role'] !== 'admin') die("Akses ditolak");

$id = $_GET['id'];
$conn->query("DELETE FROM anak WHERE id = $id");
header("Location: dashboard.php");
?>