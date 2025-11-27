<?php
    $conn = new mysqli("localhost", "root", "", "mydatainfo");

    if ($conn->connect_error) {
        die("เชื่อมต่อฐานข้อมูลไม่ได้: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // ป้องกันค่าว่าง
    if (empty($username) || empty($password)) {
        die("กรุณากรอกข้อมูลให้ครบ!");
    }

    // SQL
    $sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";

    if ($conn->query($sql));

    $conn->close();
?>
