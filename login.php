<?php
$koneksi = new mysqli("localhost", "root", "", "data_daftar");

if ($koneksi->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Koneksi gagal']));
}

$username = $_POST['username'];
$password = $_POST['password'];

$username = $koneksi->real_escape_string($username);
$password = $koneksi->real_escape_string($password);

// Cek langsung username dan password
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $koneksi->query($sql);

if ($result && $result->num_rows > 0) {
    echo json_encode(['success' => true, 'username' => $username]);
} else {
    echo json_encode(['success' => false, 'message' => 'Username atau password salah']);
}
?>
