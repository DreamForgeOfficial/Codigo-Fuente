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
    <title>Pokédex</title>
    <link rel="stylesheet" href="./css/main.css">
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
        
        <nav class="nav">
            <img src="./img/logo.png" alt="Logo Pokédex" class="logo" style="align-self: center;">
            <ul class="nav-list">
                <li class="nav-item"><button class="btn btn-header" id="ver-todos">Ver todos</button></li> 
                <li class="nav-item"><button class="btn btn-header normal" id="normal">Normal</button></li>
                <li class="nav-item"><button class="btn btn-header fire" id="fire">Fuego</button></li>
                <li class="nav-item"><button class="btn btn-header water" id="water">Agua</button></li>
                <li class="nav-item"><button class="btn btn-header grass" id="grass">Planta</button></li>
                <li class="nav-item"><button class="btn btn-header electric" id="electric">Eléctrico</button></li>
                <li class="nav-item"><button class="btn btn-header ice" id="ice">Hielo</button></li>
                <li class="nav-item"><button class="btn btn-header fighting" id="fighting">Lucha</button></li>
                <li class="nav-item"><button class="btn btn-header poison" id="poison">Veneno</button></li>
                <li class="nav-item"><button class="btn btn-header ground" id="ground">Tierra</button></li>
                <li class="nav-item"><button class="btn btn-header flying" id="flying">Volador</button></li>
                <li class="nav-item"><button class="btn btn-header psychic" id="psychic">Psíquico</button></li>
                <li class="nav-item"><button class="btn btn-header bug" id="bug">Bicho</button></li>
                <li class="nav-item"><button class="btn btn-header rock" id="rock">Roca</button></li>
                <li class="nav-item"><button class="btn btn-header ghost" id="ghost">Fantasma</button></li>
                <li class="nav-item"><button class="btn btn-header dark" id="dark">Siniestro</button></li>
                <li class="nav-item"><button class="btn btn-header dragon" id="dragon">Dragón</button></li>
                <li class="nav-item"><button class="btn btn-header steel" id="steel">Acero</button></li>
                <li class="nav-item"><button class="btn btn-header fairy" id="fairy">Hada</button></li>
            </ul>
        </nav>
    </header>
    <main>
        
        <div id="todos">
            <div class="pokemon-todos" id="listaPokemon">
                <!-- <div class="pokemon">
                    <p class="pokemon-id-back">#025</p>
                    <div class="pokemon-imagen">
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/25.png" alt="Pikachu">
                    </div>
                    <div class="pokemon-info">
                        <div class="nombre-contenedor">
                            <p class="pokemon-id">#025</p>
                            <h2 class="pokemon-nombre">Pikachu</h2>
                        </div>
                        <div class="pokemon-tipos">
                            <p class="electric tipo">ELECTRIC</p>
                            <p class="fighting tipo">FIGHTING</p>
                        </div>
                        <div class="pokemon-stats">
                            <p class="stat">4m</p>
                            <p class="stat">60kg</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

    </main>

    <!--JS LINKs-->
    <script src="js/script.js"></script>
    <script src="./js/main.js"></script>

</body>
</html>