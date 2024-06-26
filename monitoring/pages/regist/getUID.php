<?php
// Koneksi ke database
require_once('database.php');
$db = Database::connect();

// Cek apakah ada permintaan REGISTER dari halaman Registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Kirim pesan "REGISTER" ke ESP32
    echo "REGISTER";
} else {
    // Ambil UIDresult dari POST jika ada
    $UIDresult = isset($_POST["UIDresult"]) ? $_POST["UIDresult"] : null;

    // Query untuk memeriksa apakah UIDresult ada di database
    $sql = "SELECT * FROM table_nodemcu_rfidrc522_mysql WHERE id = :UIDresult";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':UIDresult', $UIDresult);
    $stmt->execute();
    $count = $stmt->rowCount();

    // Jika UIDresult ada di database, kirim respons "EXIST" ke ESP32
    if ($count > 0) {
        echo "EXIST";
        $Write = "<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
        file_put_contents('UIDContainer.php', $Write);
    } else {
        // Jika UIDresult tidak ada di database, tambahkan kode untuk menyimpan UIDresult ke file UIDContainer.php
        $Write = "<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
        file_put_contents('UIDContainer.php', $Write);
    }
}

// Tutup koneksi database
Database::disconnect();
?>
