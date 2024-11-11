<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_test_terakorp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$search_nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$search_alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';

$sql = "SELECT p.id, p.nama, p.alamat, GROUP_CONCAT(h.hobi SEPARATOR ', ') AS hobi 
        FROM person p 
        LEFT JOIN hobi h ON p.id = h.person_id 
        WHERE (p.nama LIKE '%$search_nama%' AND p.alamat LIKE '%$search_alamat%')
        GROUP BY p.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Listing Data Person dan Hobi</title>
</head>

<body>

    <h2>Daftar Person dan Hobi</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                echo "<td>" . htmlspecialchars($row['hobi']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
        }
        ?>
    </table>

    <h3>Form Pencarian</h3>
    <form method="post" action="">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($search_nama); ?>">
        <br>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($search_alamat); ?>">
        <br>
        <button type="submit">Search</button>
    </form>

</body>

</html>

<?php
$conn->close();
?>