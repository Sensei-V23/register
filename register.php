<?php
    // เชื่อมฐานข้อมูล
    $conn = new mysqli("localhost", "root", "", "mydatainfo");

    // เช็คว่าฐานข้อมูลเชื่อมได้ไหม
    if ($conn->connect_error) {
        die("เชื่อมต่อฐานข้อมูลไม่ได้: " . $conn->connect_error);
    }

    // รับค่าจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];

    // เช็คค่าว่าง
    if (empty($username) || empty($password)) {
        die("กรุณากรอกข้อมูลให้ครบ!");
    }

    // ป้องกัน SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // บันทึกลงฐานข้อมูล
    $sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // สำเร็จ → กลับไปหน้า login หรือหน้าไหนก็ได้
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
?>
