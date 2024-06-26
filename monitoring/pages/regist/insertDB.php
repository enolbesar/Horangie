<?php
     
require 'database.php';

if (!empty($_POST)) {
    // keep track post values
    $name = $_POST['name'];
    $id = $_POST['id'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    
    // Check if the record with the same id already exists
    $pdo = Database::connect();
    $existingRecord = $pdo->prepare("SELECT id FROM table_nodemcu_rfidrc522_mysql WHERE id = ?");
    $existingRecord->execute(array($id));
    $row = $existingRecord->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // Handle duplicate record (e.g., display an error message, redirect back to form)
        echo "Error: Record with ID $id already exists!";
        // You can choose what to do here, like redirecting back to the form
    } else {
        // Proceed with the insertion
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO table_nodemcu_rfidrc522_mysql (name, id, gender, email, mobile) VALUES (?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name, $id, $gender, $email, $mobile));
            header("Location: ../userData.php");
        } catch (PDOException $e) {
            echo "Error inserting record: " . $e->getMessage();
        }
    }
    Database::disconnect();
}
?>