<?php
  ob_start();
  if(isset($_COOKIE["User"]) && isset($_COOKIE["Password"]) && $_COOKIE["Acceso"] == True)
  {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "<p>El fichero ya existe.</p>";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "<p>El fichero es demasiado grande.</p>";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "php") {
      echo "<p>Solo se permiten ficheros PHP</p>";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      setcookie("Acceso",0,time()-60, "/");
      ob_end_clean();
      header("Location: ../web-subir-datos/index.php");
      exit("<p>El fichero no se ha subido.</p>");
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "<p>El fichero ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " se ha subido.</p>";
          include "$target_file";
          
      } else {
          setcookie("Acceso",0,time()-60, "/");
          ob_end_clean();
          header("Location: ../web-subir-datos/index.php");
          exit("<p>Ha habido un error subiendo el archivo.</p>");
      }
    }
  }
  else{
    header("Location: ../web-login/index.php");
    exit();
  }
  ob_end_flush();
?>

<!DOCTYPE html> 
<html>
<head>
    <!--Francisco Marchal García y David Tobajas Caballero-->
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
        </ul>

        <div class="bx bx-menu" id="menu-icon"></div>
    </header>

    <section class="hero">
        <div class="hero-text">
          <main>
            <?php
              $mysqli = new mysqli("192.168.0.27:3306", "root", "2030!");
              if ($mysqli->connect_error) {
                  echo "Error al realizar la conexion";
              }
              else
              {
                  echo "<p>Nombre = $Nombre</p>";
                  echo "<p>Medallas = $Medallas</p>";
                  echo "<p>Pokémon vistos = $PokedexVistos</p>";
                  echo "<p>Pokémon capturados = $PokedexCapturados</p>";
                  echo "<p>Dinero = $DineroConseguido</p>";
                  echo "<br>";
                  
                  $mysqli->select_db("Region_Arjonia");

                  $User = $_COOKIE['User'];
                  $Password = $_COOKIE['Password'];
                  if(isset($_POST['checkboxGroup'])) {
                    $image_name = $_POST['checkboxGroup'];
                  }
                  
                  //Check if the user is in the database
                  $sql= "SELECT Nombre FROM Jugador WHERE Jugador IN (SELECT ID_Jugador FROM Credencial WHERE Nombre = '$User' AND Clave = '$Password')";
                  $res=$mysqli->query($sql,MYSQLI_USE_RESULT);
                  if($res) {     
                    $fila=$res->fetch_assoc();
                    $existe = false;

                    if ($fila) {
                      $existe = true;
                    }
              
                    $res->close();
                              
                    if ($existe) {
                      $sql= "UPDATE Jugador SET Nombre = '$Nombre', Medallas = $Medallas, PokedexVistos = $PokedexVistos, PokedexCapturados = $PokedexCapturados, Dinero = $DineroConseguido, Imagen = '$image_name' WHERE Jugador IN (SELECT ID_Jugador FROM Credencial WHERE Nombre = '$User' AND Clave = '$Password')";
                      $res=$mysqli->query($sql,MYSQLI_USE_RESULT);
                      if($res) {  
                        echo "<h4>Actualizado correctamente</h4>";
                      }
                      else{
                          echo "Fallo al actualizar $sql" . mysqli_error($mysqli);;
                      }      
                      if($res instanceof mysqli_result) {
                        $res->close();
                      }
                      
                    } else {
                      $sql= "INSERT INTO Jugador (Jugador, Nombre, Medallas, PokedexVistos, PokedexCapturados, Dinero, Imagen) SELECT ID_Jugador, '$Nombre', $Medallas, $PokedexVistos, $PokedexCapturados, $DineroConseguido, '$image_name' FROM Credencial WHERE Nombre = '$User' AND Clave = '$Password'";
                      $res=$mysqli->query($sql,MYSQLI_USE_RESULT);
                      if($res) {  
                        echo "<h4>Insertado correctamente</h4>";
                      }
                      else{
                          echo "Fallo al insertar" . mysqli_error($mysqli);
                      }  
                      if($res instanceof mysqli_result) {
                        $res->close();
                      }
                      
                    } 
                    
                  }
                  else{
                      echo "Fallo al obtener la lista";
                  }    
                  
              }
              $mysqli->close(); 
              if (file_exists($target_file)) {
                unlink($target_file);
              }
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

  
</body>
</html>