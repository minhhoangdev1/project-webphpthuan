<?php
    header("Content-type: text/html; charset=utf-8");
    $mysqli = new mysqli("localhost","root","","web_phpthuan");
    mysqli_set_charset($mysqli, 'UTF8');
    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
?>
