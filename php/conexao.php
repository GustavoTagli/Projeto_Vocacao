<?php
    $pdo = new PDO("mysql:host=localhost; dbname=vocacao","root","");
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
