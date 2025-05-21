<?php
session_start();
include 'config/db.php';
if ($_SESSION['role'] !== 'suster') die("Akses ditolak");

$stmt = $conn->prepare("INSERT INTO anak (nama, tanggal_lahir, alamat, tinggi_cm, berat_kg, created_by) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssddi", $_POST['nama'], $_POST['tanggal_lahir'], $_POST['alamat'], $_POST['tinggi_cm'], $_POST['berat_kg'], $_SESSION['user_id']);
$stmt->execute();
header("Location: dashboard.php");
?>