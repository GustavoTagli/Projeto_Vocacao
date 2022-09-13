<?php
session_start();
unset($_SESSION["instituicao"]);

header('location: ../index.php');
?>