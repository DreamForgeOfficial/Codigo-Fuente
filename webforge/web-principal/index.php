<?php
    if (isset($_POST['boton']))
    {
        setcookie("User",0,time()-60, "/");
        setcookie("Password",0,time()-60, "/");
        header("Location: ../web-login/index.php");
    }
    if(isset($_COOKIE["User"]) && isset($_COOKIE["Password"]))
    {
        
    }
    else{
        header("Location: ../web-login/index.php");
        exit();
    }
?>
<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width", initial-scale="1">
    <title>Region Arjonia</title>

    <!--CSS LINK-->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--External CSS LINKS-->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.png">
</head>
<body>

    <header>
        <a href="../index.php" class="logo">DREAM FORGE</a>
        <ul class="navlist">
            <li><a href="../web-principal/index.php">PÁGINA PRINCIPAL</a></li>
            <li><a href="../web-quienes-somos/index.php">¿QUIÉNES SOMOS?</a></li>
            <li><a href="../web-pokedex/index.php">POKÉDEX</a></li>
            <li><a href="../web-tabla-tipos/index.php">TABLA DE TIPOS</a></li>
            <li><a href="../web-descargas/index.php">DESCARGAS</a></li>
            <li><a href="../web-ranking/index.php">RANKING</a></li>
            <li><form  method="POST"><button name="boton" class="logoff">CERRAR SESIÓN</button></form></li>
        </ul>

        <div class="bx bx-menu" id="menu-icon"></div>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h4>Página principal de Dream Forge©</h4>
            <p>Bienvenido a la página web de Dream Forge! Aquí podrás obtener información sobre todos nuestros videojuegos, 
                obtener más información acerca de nosotros, buscar y filtrar Pokémon gracias a nuestra Pokédex interactiva, 
                consultar nuestra Tabla de Tipos y descargar nuestros videojuegos en sus diferentes versiones.</p>
            <a href="../web-descargas/index.php">DESCARGA</a>
            <a href="https://youtu.be/BvLujoe-ZTA" class="ctaa" target="_blank"><i class="ri-play-fill"></i>TRAILER</a>
        </div>
        <div class="hero-img">
            <img src="img/main.png">
        </div>

        <div class="icons">
            <a href="#"><i class="ri-instagram-line" target="_blank"></i></a>
            <a href="https://www.youtube.com/channel/UCtyjY0IY76Y_4VSQVkdTBlg" target="_blank"><i class="ri-youtube-line"></i></a>
            <a href="#"><i class="ri-dribbble-line" target="_blank"></i></a>
        </div>

        <div class="scroll-down">
            <a href="index2.php"><i class="ri-arrow-down-s-fill"></i></a>
        </div>
        <div class="page">
            <a href="index2.php"><i class="ri-arrow-down-s-fill"></i></a>
        </div>
    </section>

    <!--Scroll Effect-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--JS LINK-->
    <script src="js/script.js"></script>

</body>
</html>