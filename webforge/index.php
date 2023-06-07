<?php
if(isset($_COOKIE["User"]) && isset($_COOKIE["Password"]))
{
    
}
else{
    header("Location: web-login/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!--Francisco Marchal García y David Tobajas Caballero-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="js/main.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de imágenes</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            background-color: #1f223b;
        }
        
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100%;
        }
        
        .main-scroll-div {
            width: 90%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* border: 2px solid red; */
        }
        
        .cover {
            position: relative;
            width: 90%;
            height: 65%;
        }
        
        .cover::before {
            position: absolute;
            content: "";
            left: 0;
            top: 0;
            z-index: 99;
            height: 200%;
            width: 150px;
            background-image: linear-gradient(90deg, #1f223b, transparent);
        }
        
        .cover::after {
            position: absolute;
            content: "";
            right: 0;
            top: 0;
            z-index: 99;
            height: 200%;
            width: 150px;
            background-image: linear-gradient(-90deg, #1f223b, transparent);
        }
        
        .scroll-images { 
            width: 100%;
            height: auto;
            display: flex;
            justify-content: left;
            align-items: center;
            overflow: auto;
            position: relative;
            scroll-behavior: smooth;
        }
        
        .child {
            min-width: 600px;
            height: 580px;
            margin: 1px 10px;
            overflow: hidden;
        }
        
        .scroll-images::-webkit-scrollbar {
            -webkit-appearance: none;
        }
        
        .child-img {
            width: 100%;
        }
        
        .icon {
            color: #5fff9b;
            background-color: #1f223b;
            font-size: 50px;
            outline: none;
            border: none;
            padding: opx 20px;
            cursor: pointer;
        }
        
        .icon:hover {
            color: rgb(235, 228, 222);
        }
        @media (max-width: 680px){
            .child {
                min-width: 300px;
                height: 280px;
                margin-top: 40px;
            }
            .icon {
                margin-bottom: 90px;
                font-size: 20px;
            }
        }
    </style>
    <link rel="icon" href="images/anvil.png">
</head>

<body>

    <div class="main-scroll-div">
        <div>
            <button class="icon" onclick="scrolll()"> <i class="fas fa-angle-double-left"></i></button>
        </div>
        <div class="cover">
            <div class="scroll-images">
                <div class="child"><img class="child-img" src="images/logo.jpg"></div>
                <a href="https://www.youtube.com/watch?v=BvLujoe-ZTA" target="_blank" style="z-index: 1001;"><div class="child"><img class="child-img" src="images/video.jpg"></div></a>
                <div class="child"><img class="child-img" src="images/1.jpeg"></div>
                <div class="child"><img class="child-img" src="images/2.jpeg"></div>
                <div class="child"><img class="child-img" src="images/3.jpeg"></div>
                <div class="child"><img class="child-img" src="images/4.jpeg"></div>
                <a href="web-principal/index.php" style="z-index: 1001;"><div class="child"><img class="child-img" src="images/5.png"></div></a>
            </div>
        </div>
        <div>
            <button class="icon" onclick="scrollr()"> <i class="fas fa-angle-double-right"></i></button>
        </div>
    </div>
</body>
<script>
    function scrolll() {
        var left = document.querySelector(".scroll-images");
        left.scrollBy(-320, 0)
    }

    function scrollr() {
        var right = document.querySelector(".scroll-images");
        right.scrollBy(320, 0)
    }
</script>

</html>
<!-- <i class="fas fa-angle-double-left"></i> -->