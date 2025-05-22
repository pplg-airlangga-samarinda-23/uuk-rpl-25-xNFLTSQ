<?php
session_start();
include 'config.php';

if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
}

$sql = "SELECT * FROM anak";
$result = $conn->query($sql);

echo "<h1>Admin Dashboard</h1>";
echo "<a href='logout.php'>Logout</a>";
echo "<h2>Data Anak</h2>";
echo "<table border='1'>
        <tr>
            <th>Nama Anak</th>
            <th>Tempat Tinggal</th>
            <th>Tanggal Lahir</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Action</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row['nama_anak'] . "</td>
            <td>" . $row['tempat_tinggal'] . "</td>
            <td>" . $row['tanggal_lahir'] . "</td>
            <td>" . $row['tinggi_badan'] . "</td>
            <td>" . $row['berat_badan'] . "</td>
            <td><a href='edit_anak.php?id=" . $row['id'] . "'>Edit</a></td>
          </tr>";
}

echo "</table>";
?>