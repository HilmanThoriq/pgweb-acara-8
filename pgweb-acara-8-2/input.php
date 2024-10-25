<?php
// Mengambil data dari form POST
$kecamatan = $_POST['kecamatan'];
$long = $_POST['long'];
$lat = $_POST['lat'];
$luas = $_POST['luas'];
$jumlah_penduduk = $_POST['jml_penduduk'];

// Konfigurasi koneksi database MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgweb_acara8";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk menyimpan data ke tabel data_kecamatan
$sql = "INSERT INTO data_kecamatan (kecamatan, longitude, latitude, luas, jml_penduduk)
VALUES ('$kecamatan', $long, $lat, $luas, $jumlah_penduduk)";

// Menyimpan data dan memeriksa apakah berhasil
if ($conn->query($sql) === TRUE) {
    $message = "Rekord berhasil ditambahkan!";
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rekord Berhasil Ditambahkan</title>
  <style>
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
      background-color: #ffffff;
      padding: 30px;
      max-width: 500px;
      text-align: center;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    h1 {
      color: #4CAF50;
      margin-bottom: 20px;
    }

    p {
      font-size: 18px;
      color: #333;
    }

    a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      font-size: 16px;
    }

    a:hover {
      background-color: #45a049;
    }

    .success-icon {
      font-size: 50px;
      color: #4CAF50;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="success-icon">✔️</div>
    <h1><?php echo $message; ?></h1>
    <p>Data yang Anda masukkan telah berhasil disimpan ke dalam basis data.</p>
    <a href="index.html">Kembali ke Form</a>
  </div>
</body>
</html>
