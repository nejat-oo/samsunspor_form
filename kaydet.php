<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $ad = $_POST['name'];
    $soyad = $_POST['surname'];
    $phone = $_POST['phone'];

   
    $sql = "INSERT INTO bilgiler (`name`, `surname`, `phone_number`) VALUES (:ad, :soyad, :phone)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':ad', $ad);
    $stmt->bindParam(':soyad', $soyad);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();

    echo "Veriler başarıyla kaydedildi";
} catch(PDOException $e) {
    echo "Veritabanı hatası: " . $e->getMessage();
}
?>
