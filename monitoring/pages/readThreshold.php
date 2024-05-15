<?php
    include("connect.php");

    $sql = mysqli_query($koneksi, "SELECT * FROM tb_threshold");

    $data = mysqli_fetch_array($sql);
    $thresholds = array(
        'pumpIrrigation' => $data["pumpIrrigation"],
        'pumpMist' => $data["pumpMist"],
        'heater' => $data["heater"],
        'lamp' => $data["lamp"]
    );

    echo json_encode($thresholds);
?>
