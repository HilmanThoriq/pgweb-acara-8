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

// Proses penghapusan
if (isset($_GET['delete_kecamatan'])) {
    $kecamatan = $_GET['delete_kecamatan'];
    $delete_sql = "DELETE FROM data_kecamatan WHERE kecamatan = ?";
    
    // Prepare statement
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("s", $kecamatan); // Ubah "i" ke "s" karena kecamatan mungkin string
    
    // Execute and close statement
    if ($stmt->execute()) {
        // Redirect to the main page after deletion
        header("Location: index.php"); // Ganti dengan nama file utama kamu
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
