<?php
include("connect.php");
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

$wifi = $data['wifi'];
$board = $data['board'];

$sql = "UPDATE tb_device SET wifi = '$wifi', board = '$board'";
$koneksi->query($sql);

sleep(3);

$sql_reset = "UPDATE tb_device SET wifi = 0, board = 0";
$koneksi->query($sql_reset);

$koneksi->close();
?>
