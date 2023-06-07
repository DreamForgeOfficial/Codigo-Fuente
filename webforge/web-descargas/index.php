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
            <script type="text/javascript">
            function showSpoiler(elemId, linkId, hideLink)
            {
                var elem = document.getElementById(elemId);
                var link = document.getElementById(linkId);
                if (elem.style.position == 'absolute')
                {
                elem.style.position = 'static';
                elem.style.visibility = 'visible';
                elem.style.opacity = '1';
                link.innerHTML = link.innerHTML.replace("+", "-");
                }
                else
                {
                elem.style.position = 'absolute';
                elem.style.visibility = 'hidden';
                elem.style.opacity = '0';
                link.innerHTML = link.innerHTML.replace("-", "+");
                }
                if(hideLink)
                link.innerHTML = ("");
            }
            </script>
            
            <h4>Descarga Completa</h4>
            <!-- Version -->
            <table class="downloadTable">
                <tbody>
                    <tr class="downloadLine downloadLineMain">
                        <td class="colFile">RegionArjonia B1.0</td>
                        <td class="colDownload"><a download href="versions/Región Arjonia B1.zip">Download</a></td>
                        <td class="colDownload"><a Download href="documents/changelogB1.txt">Changelog</a></td>
                        <td class="colDate">04.06.2023</td>
                    </tr>
                </tbody>
            </table>
            <br>    
            <!-- Antiguas -->
            <script>
            function showSpoiler(contentId, linkId, preserveLink) {
                var content = document.getElementById(contentId);
                var link = document.getElementById(linkId);
                
                content.style.opacity = 1; 
                
                if (!preserveLink) {
                    link.style.display = 'none'; 
                }
            }
            </script>
            <a class="spoilerLink" id="link985388361" href="javascript:showSpoiler('more985388361', 'link985388361', false);">+ Más</a>
            <div id="more985388361" style="position: absolute; opacity: 0; transition: opacity 0.5s;">        
            <table class="downloadTable">
                <tbody>
                    <tr class="downloadLine downloadLineMain">
                        <td class="colFile">RegionArjonia B0.9</td>
                        <td class="colDownload"><a href="versions/Región Arjonia B0.9.zip">Download</a></td>
                        <td class="colDownload"><a Download href="documents/changelogB0.9.txt">Changelog</a></td>
                        <td class="colDate">01.05.2023</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <br><br>

            <h4>Conexión Remota para PCs con bajos resursos (Beta 1)</h4>
            <!-- Version remote -->
            <table class="downloadTable">
                <tbody>
                    <tr class="downloadLine downloadLineMain">
                        <td class="colFile">RegionArjonia  </td>
                        <td class="colDownload"><a href="https://regionarjonia.ddns.net/RDWeb/Pages/en-US/Default.aspx" target="_blank">Opción 1</a></td>
                        <td class="colDownload"><a href="https://dreamforge.ddns.net/RDWeb/Pages/en-US/Default.aspx" target="_blank">Opción 2</a></td>
                        <td class="colDownload"><a Download href="documents/ReadMe.zip" target="_blank">ReadMe</a></td>
                        <td class="colDate">04.06.2023</td>
                    </tr>
                </tbody>
            </table>
            <br>    
        </div>
        
        <div class="hero-img">
            <img src="img/genesect.png">
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
