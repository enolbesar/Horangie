<?php
include("connect.php");

$sql = mysqli_query($koneksi, "SELECT * FROM tb_sensor ORDER BY id DESC LIMIT 1");


if ($data = mysqli_fetch_array($sql)) {
    $hindex = $data['hindex'];
    $hum = $data['hum'];
    $rain = $data['rain'];
    $soil = $data['soil'];
    $sun = $data['sun'];
    $temp = $data['temp'];

    if ($hindex == "") $hindex = 0;
    if ($hum == "") $hum = 0;
    if ($rain == "") $rain = 0;
    if ($soil == "") $soil = 0;
    if ($sun == "") $sun = 0;
    if ($temp == "") $temp = 0;

    echo $hindex . "|" . $hum . "|" . $rain . "|" . $soil . "|" . $sun . "|" . $temp;
} else {
    echo "Data tidak tersedia";
}
?>
