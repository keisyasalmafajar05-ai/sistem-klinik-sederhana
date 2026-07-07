<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'klinik_db';
$port = 3306;

$mysqli = new mysqli($host, $user, $pass, $db, $port);
if ($mysqli->connect_error) {
    echo "CONNECT_ERROR: " . $mysqli->connect_error . PHP_EOL;
    exit(1);
}

$updates = [
    ['Cendera Lutut', 500000000],
    ['Treatment Facet Block', 1000000],
    ['Terapi Rehabilitasi Lutut', 700000000],
];

foreach ($updates as $u) {
    $name = $mysqli->real_escape_string($u[0]);
    $harga = (int) $u[1];
    $sql = "UPDATE produk SET harga = $harga WHERE nama_produk = '$name'";
    if ($mysqli->query($sql) === true) {
        echo "Updated: $name => $harga" . PHP_EOL;
    } else {
        echo "Error updating $name: " . $mysqli->error . PHP_EOL;
    }
}

$mysqli->close();
echo "Done." . PHP_EOL;
