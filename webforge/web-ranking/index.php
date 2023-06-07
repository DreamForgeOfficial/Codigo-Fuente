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
<html lang="es">
<head>
    <!--Francisco Marchal García y David Tobajas Caballero-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="img/icon.png">

    <!--External CSS LINKS-->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
     
</head>
<body>
    <header>
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

    <main>
      <div class="podium">
        <ul style="color: rgb(130, 107, 145);">

        <?php
        $mysqli = new mysqli("192.168.0.27:3306", "root", "2030!");
        $i = 1;
        if ($mysqli->connect_error) {
            echo "Error al realizar la conexion";
        }
        else
        {
            $mysqli->select_db("Region_Arjonia");
            
                $sql= "SELECT c.Nombre, j.PokedexCapturados, j.Imagen FROM Credencial c INNER JOIN Jugador j ON c.ID_Jugador = j.Jugador ORDER BY j.PokedexCapturados DESC LIMIT 3";
                $res=$mysqli->query($sql,MYSQLI_USE_RESULT);
                if($res) {
                    $fila=$res->fetch_assoc();
                    while($fila){
                        echo '<li>';
                        echo "<span style='color: white;'>$i</span>";
                        echo '<img id="crown" src="./assets/crown.svg" alt="coroa"/>';
                        echo "<img src='./assets/{$fila["Imagen"]}'/>"; 
                        echo "<p data-name-podium style='color: white;'>{$fila["Nombre"]}</p>";
                        echo "<span data-revenue-podium class='revenue'>{$fila["PokedexCapturados"]}</span>";
                        $fila=$res->fetch_assoc();          
                        $i++;
                        echo "</li>";  
                    }
                    $res->close(); 
                }
                else{
                    echo "Fallo al obtener la lista";
                }    
                
        }
        $mysqli->close(); 
        ?>
        </ul>
      </div>
    </main>

    <section>
    <span style="font-weight: bold;">RANKING DE LOS JUGADORES CON MÁS POKÉMON</span>
    <h4>Haz click <a class="link" href="../web-subir-datos/index.php">aquí</a> para subir tus datos</h4><br>
      <ul data-aos="fade-right">

        <?php
        $mysqli = new mysqli("192.168.0.27:3306", "root", "2030!");
        $i = 1;
        if ($mysqli->connect_error) {
            echo "Error al realizar la conexion";
        }
        else
        {
            $mysqli->select_db("Region_Arjonia");
            
                $sql= "SELECT c.Nombre, j.PokedexCapturados, j.Imagen FROM Credencial c INNER JOIN Jugador j ON c.ID_Jugador = j.Jugador ORDER BY j.PokedexCapturados DESC";
                $res=$mysqli->query($sql,MYSQLI_USE_RESULT);
                if($res) {
                    $fila=$res->fetch_assoc();
                    while($fila){
                        echo '<li>';
                        echo "<span>$i</span>";
                        echo "<img src='./assets/{$fila["Imagen"]}'/>"; 
                        echo "<p data-name>{$fila["Nombre"]}</p>";
                        echo "<span data-revenue class='revenue'>{$fila["PokedexCapturados"]}</span>";
                        $fila=$res->fetch_assoc();          
                        $i++;
                        echo "</li>";  
                    }
                    $res->close(); 
                }
                else{
                    echo "Fallo al obtener la lista";
                }    
                
        }
        $mysqli->close(); 
        ?>
      </ul>
    </section>
  </div>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init(
      {
        duration: 1000,
        once: true,
      });
  </script>
  
  <!--JS LINKs-->
  <script src="js/script.js"></script>
</body>

</html>