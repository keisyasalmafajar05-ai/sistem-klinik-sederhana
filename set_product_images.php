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
$updates = [
    ['Cendera Lutut', 'cendera_lutut.svg'],
    ['Treatment Facet Block', 'treatment_facet_block.svg'],
    ['Terapi Rehabilitasi Lutut', 'terapi_rehabilitasi_lutut.svg'],
];
foreach ($updates as $u) {
    $name = $mysqli->real_escape_string($u[0]);
    $file = $mysqli->real_escape_string($u[1]);
    $sql = "UPDATE produk SET gambar = '$file' WHERE nama_produk = '$name'";
    if ($mysqli->query($sql) === true) {
        echo "Updated image for: $name => $file" . PHP_EOL;
    } else {
        echo "Error updating $name: " . $mysqli->error . PHP_EOL;
    }
}
$mysqli->close();
echo "Done." . PHP_EOL;
