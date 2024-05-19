<?php
include ("connect.php");

$sql_device = mysqli_query($koneksi, "SELECT * FROM tb_device");
$data_device = mysqli_fetch_array($sql_device);

$sql_threshold = mysqli_query($koneksi, "SELECT * FROM tb_threshold");
$data_threshold = mysqli_fetch_array($sql_threshold);

$sql_status = mysqli_query($koneksi, "SELECT * FROM tb_status");
$data_status = mysqli_fetch_array($sql_status);

$sql_sensor = mysqli_query($koneksi, "SELECT * FROM tb_logsensor");
$data_sensor = mysqli_fetch_array($sql_sensor);

$mode = $data_device["mode"];
$irrPump = $data_device["pumpIrrigation"];
$mistPump = $data_device["pumpMist"];
$heater = $data_device["heater"];
$lamp = $data_device["lamp"];

$irrPump_threshold = $data_threshold["pumpIrrigation"];
$mistPump_threshold = $data_threshold["pumpMist"];
$heater_threshold = $data_threshold["heater"];
$lamp_threshold = $data_threshold["lamp"];

$statIrr = $data_status["statIrr"];
$statMist = $data_status["statMist"];
$statHeater = $data_status["statHeater"];
$statLamp = $data_status["statLamp"];

$sentime = $data_sensor["timestamp"];
$senrain = $data_sensor["rain"];
$sentemp = $data_sensor["temp"];
$sensoil = $data_sensor["soil"];
$senhum = $data_sensor["hum"];
$senhindex = $data_sensor["hindex"];
$sensun = $data_sensor["sun"];
?>