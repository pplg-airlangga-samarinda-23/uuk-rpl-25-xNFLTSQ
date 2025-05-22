<?php
session_start();
include 'config.php';

if ($_SESSION['role'] != 'kader') {
    header('Location: login.php');
}

echo "<h1>Kader Dashboard</h1>";
echo "<a href='logout.php'>Logout</a>";

if (isset($_POST['submit'])) {
    $nama_anak = $_POST['nama_anak'];
    $tempat_tinggal = $_POST['tempat_tinggal'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];

    $sql = "INSERT INTO anak (nama_anak, tempat_tinggal, tanggal_lahir, tinggi_badan, berat_badan)
            VALUES ('$nama_anak', '$tempat_tinggal', '$tanggal_lahir', '$tinggi_badan', '$berat_badan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data anak berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST">
    <label>Nama Anak:</label>
    <input type="text" name="nama_anak" required><br>

    <label>Tempat Tinggal:</label>
    <input type="text" name="tempat_tinggal" required><br>

    <label>Tanggal Lahir:</label>
    <input type="date" name="tanggal_lahir" required><br>

    <label>Tinggi Badan:</label>
    <input type="number" name="tinggi_badan" required><br>

    <label>Berat Badan:</label>
    <input type="number" name="berat_badan" required><br>

    <input type="submit" name="submit" value="Tambah Data">
</form>