<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'config/db.php';

echo "<h2>Halo, " . $_SESSION['role'] . "</h2>";

if ($_SESSION['role'] === 'suster') {
    echo "<form method='post' action='tambah.php'>
        Nama: <input name='nama'><br>
        Tanggal Lahir: <input type='date' name='tanggal_lahir'><br>
        Alamat: <input name='alamat'><br>
        Tinggi (cm): <input name='tinggi_cm' type='number' step='0.1'><br>
        Berat (kg): <input name='berat_kg' type='number' step='0.1'><br>
        <button type='submit'>Simpan</button>
    </form>";
}

$result = $conn->query("SELECT * FROM anak");
echo "<h3>Data Anak</h3><table border='1'><tr><th>Nama</th><th>Lahir</th><th>Alamat</th><th>Tinggi</th><th>Berat</th>";
if ($_SESSION['role'] === 'admin') echo "<th>Aksi</th>";
echo "</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['nama']}</td>
        <td>{$row['tanggal_lahir']}</td>
        <td>{$row['alamat']}</td>
        <td>{$row['tinggi_cm']}</td>
        <td>{$row['berat_kg']}</td>";
    if ($_SESSION['role'] === 'admin') {
        echo "<td><a href='hapus.php?id={$row['id']}'>Hapus</a></td>";
    }
    echo "</tr>";
}
echo "</table><br><a href='logout.php'>Logout</a>";
?>