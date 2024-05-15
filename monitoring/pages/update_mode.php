<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["mode"])) {
        $modeValue = $_POST["mode"];

        $sql = "UPDATE tb_device SET mode = $modeValue";
        if ($koneksi->query($sql) === TRUE) {
            echo "Nilai mode berhasil disimpan ke database";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    } else {
        echo "Nilai mode tidak diterima";
    }
} else {
    echo "Hanya permintaan POST yang diperbolehkan";
}

$koneksi->close();
?>
