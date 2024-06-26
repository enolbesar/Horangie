<?php
include("connect.php");
date_default_timezone_set('Asia/Jakarta');

$rain = isset($_GET["rain"]) ? round($_GET["rain"], 1) : null;
$temp = isset($_GET["temp"]) ? round($_GET["temp"], 1) : null;
$soil = isset($_GET["soil"]) ? round($_GET["soil"], 1) : null;
$hum = isset($_GET["hum"]) ? round($_GET["hum"], 1) : null;
$hindex = isset($_GET["hindex"]) ? round($_GET["hindex"], 1) : null;
$sun = isset($_GET["sun"]) ? round($_GET["sun"], 1) : null;

$timestamp = date("Y-m-d H:i:s");
$currentMinute = intval(date("i"));
$currentSecond = intval(date("s"));

$result_update = mysqli_query($koneksi, "UPDATE tb_sensor SET rain='$rain', temp='$temp', soil='$soil', hum='$hum', hindex='$hindex', sun='$sun'");

if ($result_update) {
    echo "Data updated successfully";
    if ($currentMinute % 5 == 0 && $currentSecond == 0) {
        mysqli_query($koneksi, "ALTER TABLE tb_logsensor AUTO_INCREMENT=1");
        sleep(1);
        $result_insert_log = mysqli_query($koneksi, "INSERT INTO tb_logsensor (rain, temp, soil, hum, hindex, sun, timestamp) VALUES ('$rain', '$temp', '$soil', '$hum', '$hindex', '$sun', '$timestamp')");
        if ($result_insert_log) {
            echo "Data inserted into logSensor successfully";
        } else {
            echo "Error inserting data into logSensor: " . mysqli_error($koneksi);
        }
    }
} else {
    echo "Error updating data: " . mysqli_error($koneksi);
}
?>
