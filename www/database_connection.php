<?php

$conn = mysqli_connect("mariadb", "root", "password", "DB_recipes");
mysqli_set_charset($conn, "utf8mb4");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}