<?php
require 'database.php';

$id = null;
$data = [
    'id' => '--------',
    'name' => '--------',
    'gender' => '--------',
    'email' => '--------',
    'mobile' => '--------'
];

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM table_nodemcu_rfidrc522_mysql WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();

    if (!$data || !is_array($data) || empty($data['name'])) {
        // Jika data tidak ditemukan, kirimkan pesan error
        $data['error'] = true;
    }
}

// Mengembalikan data sebagai JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
