<?php
    $conn = new mysqli("localhost", "root", "", "mydatainfo");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";
    $conn->($sql);

    $conn->close();
?>