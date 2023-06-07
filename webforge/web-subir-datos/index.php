<?php
if (isset($_POST['boton']))
{
    setcookie("User",0,time()-60, "/");
    setcookie("Password",0,time()-60, "/");
    header("Location: ../web-login/index.php");
}
if(isset($_COOKIE["User"]) && isset($_COOKIE["Password"]))
{
    $Acceso = "True";
    setcookie("Acceso", $Acceso, time()+60*60*24, "/");
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
  <div class="container">
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
          <main>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
              <p><input type="file" name="fileToUpload" id="fileToUpload"></p>

              <?php
              echo "<br>";
              echo "<h4>Selecciona una imagen<h4>";

              echo "<ul>";
              $images = array('1.jpeg', '2.jpeg', '3.jpg', '4.jpeg', '5.jpeg');
              $index = 0;
              foreach($images as $image) {
              echo "<li><input type='radio' id='myCheckbox".$index."' name='checkboxGroup' style='display: none;' value='".$image."'></input>";
              echo "<label for='myCheckbox".$index."'><img  src='./img/".$image."'></img></label></li>";
              $index++;
              }
              echo "</ul>";

              echo '<button name="boton">Aceptar</button></form>';
              ?>
          </main>

        </div>

        <div class="icons">
            <a href="#"><i class="ri-instagram-line"></i></a>
            <a href="https://www.youtube.com/channel/UCtyjY0IY76Y_4VSQVkdTBlg" target="_blank"><i class="ri-youtube-line"></i></a>
            <a href="#"><i class="ri-dribbble-line"></i></a>
        </div>

    </section>

    <!--Scroll Effect-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--JS LINK-->
    <script src="js/script.js"></script>
  
</div>
</body>

</html>