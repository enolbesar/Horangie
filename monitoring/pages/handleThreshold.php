<?php
    include("connect.php");
    
    $device = $_GET["device"];
    $pos = $_GET["pos"];

    if ($device == "irrigation") {
        $column = "pumpIrrigation";
    } elseif ($device == "misting") {
        $column = "pumpMist";
    } elseif ($device == "heater") {
        $column = "heater";
    } elseif ($device == "lamp") {
        $column = "lamp";
    } else {
        echo "Error: Unknown device type.";
        exit();
    }

        mysqli_query($koneksi, "UPDATE tb_threshold SET $column = $pos");
        echo $pos;
?>
