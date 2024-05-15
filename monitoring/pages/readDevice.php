<?php
    include("connect.php");

    $sql = mysqli_query($koneksi, "SELECT * FROM tb_device");

    $data = mysqli_fetch_array($sql);
    $deviceStat = array(
        'mode' => $data["mode"],
        'pumpIrrigationStat' => $data["pumpIrrigation"],
        'pumpMistStat' => $data["pumpMist"],
        'heaterStat' => $data["heater"],
        'lampStat' => $data["lamp"],
        'wifi' => $data["wifi"],
        'board' => $data["board"]
    );

    
    $mode = $data["mode"];
    echo json_encode($deviceStat);
?>
