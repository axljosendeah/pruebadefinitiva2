<?php
// pago.php

$name = $_GET['n'] ?? '';
$user = $_GET['u'] ?? '';
$pic = $_GET['pic'] ?? '';

// Generar el enlace de pago
$paylink = "https://paypal.me/$user?name=$name&pic=$pic";

// Redirigir al enlace de pago
header("Location: $paylink");
exit();
?>
