<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "todos";

try {
    // الاتصال بدون قاعدة بيانات
    $conn = new PDO("mysql:host=$host", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // إنشاء قاعدة البيانات لو مش موجودة
    $conn->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");

    // إعادة الاتصال بالقاعدة بعد إنشائها
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // إنشاء جدول tasks لو مش موجود
    $conn->exec("CREATE TABLE IF NOT EXISTS tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    )");

    // echo "Database and table ready!";
} catch(PDOException $e) {
    echo "Error is: " . $e->getMessage();
}
