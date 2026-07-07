<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'klinik_db';
$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
    echo 'CONNECT_ERROR: ' . $mysqli->connect_error . PHP_EOL;
    exit(1);
}
$res = $mysqli->query("SELECT id, nama_produk, status FROM produk ORDER BY id DESC LIMIT 10");
if (!$res) { echo 'QUERY_ERROR: ' . $mysqli->error . PHP_EOL; exit(1); }
while ($row = $res->fetch_assoc()) {
    echo $row['id'] . ' | ' . $row['nama_produk'] . ' | ' . $row['status'] . PHP_EOL;
}
$mysqli->close();
