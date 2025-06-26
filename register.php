<?php
$koneksi = new mysqli("localhost", "root", "", "data_daftar");

if ($koneksi->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Koneksi gagal']));
}

$username = $_POST['username'];
$password = $_POST['password'];

$username = $koneksi->real_escape_string($username);
$password = $koneksi->real_escape_string($password);

// Simpan langsung (tanpa hash)
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($koneksi->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal daftar: ' . $koneksi->error]);
}
?>
