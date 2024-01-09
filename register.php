<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_id'], $_POST['username'], $_POST['password'])) {
    // Dapatkan data dari body permintaan
    $adminId = $_POST['admin_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi atau manipulasi data lain jika diperlukan

    // Lakukan koneksi ke database (gantilah dengan koneksi yang sesuai)
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "flutter_db";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lakukan query INSERT
    $query = "INSERT INTO admin (admin_id, username, password) VALUES ('$adminId', '$username', '$password')";

    if ($conn->query($query) === TRUE) {
        // Registrasi berhasil
        echo json_encode(['status' => 'success', 'message' => 'Registration successful.']);
    } else {
        // Registrasi gagal
        echo json_encode(['status' => 'error', 'message' => 'Registration failed.']);
    }

    // Tutup koneksi ke database
    $conn->close();
} else {
    // Permintaan tidak valid
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
