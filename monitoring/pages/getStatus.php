<?php
include("connect.php");

$result = mysqli_query($koneksi, "SELECT * FROM tb_device");
$row = mysqli_fetch_assoc($result);

$response = array(
    'irrPump' => $row['pumpIrrigation'] == 1 ? "On" : "Off",
    'mistPump' => $row['pumpMist'] == 1 ? "On" : "Off",
    'heater' => $row['heater'] == 1 ? "On" : "Off",
    'lamp' => $row['lamp'] == 1 ? "On" : "Off"
);

echo json_encode($response);
?>
