<?php
include("connect.php");

// Get the latest sensor data
$sql = mysqli_query($koneksi, "SELECT * FROM tb_sensor ORDER BY id DESC LIMIT 1");

if ($data = mysqli_fetch_array($sql)) {
    $hindex = $data['hindex'];
    $hum = $data['hum'];
    $rain = $data['rain'];
    $soil = $data['soil'];
    $sun = $data['sun'];
    $temp = $data['temp'];
    $last_updated = $data['last_updated'];

    // Handle empty values if necessary
    if ($hindex == "") $hindex = 0;
    if ($hum == "") $hum = 0;
    if ($rain == "") $rain = 0;
    if ($soil == "") $soil = 0;
    if ($sun == "") $sun = 0;
    if ($temp == "") $temp = 0;

    // Calculate current server time
    $current_time = time();

    // Check if ESP32 is online based on last update time
    $status = "Offline";  // Default status
    if (!empty($last_updated)) {
        // Calculate time difference in seconds
        $time_difference = $current_time - strtotime($last_updated);
        
        // Compare time difference with 5 seconds
        if ($time_difference < -17995) {
            $status = "Online";
        }
    }

    // Output data as a delimited string
    echo $hindex . "|" . $hum . "|" . $rain . "|" . $soil . "|" . $sun . "|" . $temp . "|" . $last_updated . "|" . $status;
} else {
    echo "Data tidak tersedia";
}
?>
