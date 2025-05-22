<?php
session_start();
include 'config.php';

if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM anak WHERE id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (isset($_POST['update'])) {
        $nama_anak = $_POST['nama_anak'];
        $tempat_tinggal = $_POST['tempat_tinggal'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $tinggi_badan = $_POST['tinggi_badan'];
        $berat_badan = $_POST['berat_badan'];

        $update_sql = "UPDATE anak SET 
                        nama_anak = '$nama_anak', 
                        tempat_tinggal = '$tempat_tinggal', 
                        tanggal_lahir = '$tanggal_lahir', 
                        tinggi_badan = '$tinggi_badan', 
                        berat_badan = '$berat_badan' 
                       WHERE id = '$id'";

        if ($conn->query($update_sql) === TRUE) {
            echo "Data anak berhasil diperbarui!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<form method="POST">
    <label>Nama Anak:</label>
    <input type="text" name="nama_anak" value="<?php echo $row['nama_anak']; ?>" required><br>

    <label>Tempat Tinggal:</label>
    <input type="text" name="tempat_tinggal" value="<?php echo $row['tempat_tinggal']; ?>" required><br>

    <label>Tanggal Lahir:</label>
    <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required><br>

    <label>Tinggi Badan:</label>
    <input type="number" name="tinggi_badan" value="<?php echo $row['tinggi_badan']; ?>" required><br>

    <label>Berat Badan:</label>
    <input type="number" name="berat_badan" value="<?php echo $row['berat_badan']; ?>" required><br>

    <input type="submit" name="update" value="Update Data">
</form>