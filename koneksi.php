<?php
    $conn = new mysqli('localhost', 'root', '', 'data');

    if (!$conn) {
        echo "MySQL Tidak Terhubung";
    }
?>