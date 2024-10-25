<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PGWEB Acara 8 | Koneksi PHP dengan Basis Data</title>
  <style>
    /* Reset CSS */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    
    body {
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      max-width: 800px;
      margin: 20px;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
      font-size: 24px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      padding: 12px;
      text-align: center;
      border-bottom: 1px solid #dddddd;
    }

    th {
      background-color: #458CCC;
      color: white;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }

    a {
      color: #d9534f;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Data Kecamatan</h1>
    
    <?php
    // Sesuaikan dengan setting MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pgweb_acara8";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM data_kecamatan";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table><tr>
        <th>Kecamatan</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Luas</th>
        <th>Jumlah Penduduk</th>
        <th>Aksi</th>";
        
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row["kecamatan"]."</td>
                <td>".$row["latitude"]."</td>
                <td>".$row["longitude"]."</td>
                <td>".$row["luas"]."</td>
                <td>".$row["jml_penduduk"]."</td>
                <td>
                    <a href='delete.php?delete_kecamatan=".$row["kecamatan"]."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>Tidak ada data yang ditemukan.</p>";
    }
    $conn->close();
    ?>
  </div>
</body>
</html>
