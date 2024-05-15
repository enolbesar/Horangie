<?php
    include("connect.php");
    
    $device = $_GET["device"];
    $stat = $_GET["stat"];

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

    if ($stat == "On") {
        mysqli_query($koneksi, "UPDATE tb_device SET $column = 1");
        echo "On";
    } else {
        mysqli_query($koneksi, "UPDATE tb_device SET $column = 0");
        echo "Off";
    }
?>
