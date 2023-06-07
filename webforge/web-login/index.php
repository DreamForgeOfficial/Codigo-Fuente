<?php 
ob_start(); // Turn on output buffering

if(isset($_COOKIE["User"]) && isset($_COOKIE["Password"]))
{
    header("Location: ../index.php");
    exit();
}

if (isset($_POST['boton']))
{
    $User = $_POST['user'];
    $Password =  $_POST['password'];
    $mysqli = new mysqli("192.168.0.27:3306", "root", "2030!");
    if ($mysqli->connect_error) {
        echo "Error al realizar la conexion";
    }
    else
    {
        $mysqli->select_db("Region_Arjonia");
        
            $sql= "SELECT Nombre, Clave FROM Credencial";
            $res=$mysqli->query($sql,MYSQLI_USE_RESULT);
            if($res) {     
                $existe = false;
                while ($fila = $res->fetch_assoc()) {
                    if ($User == $fila["Nombre"] && $Password == $fila["Clave"]) {
                        $existe = true;
                        break;
                    }
                }
            
                if ($existe) {
                    setcookie("User", $User, time()+60*60*24, "/");
                    setcookie("Password", $Password, time()+60*60*24, "/");
                    $file = "tracking/log.txt";
                    $handle = fopen($file, 'a');
                    $currentDate = date('Y-m-d');
                    $currentTime = date('H:i:s');
                    $data = "El usuario $User ha iniciado sesión el $currentDate a las $currentTime\n\n";
                    if ($handle) {
                        fwrite($handle, $data);
                        fclose($handle);
                        echo "Data saved successfully.";
                    } else {
                        echo "Unable to open the file.";
                    }
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<h3 style='color:red;'>El usuario o la clave son incorrectos</h3>";
                }
            
                $res->close();
            }
            else{
                echo "<h3 style='color:red;'>Fallo al obtener la lista</h3>";
            }    
                                    
    }
    $mysqli->close(); 
}

if (isset($_POST['boton2']))
{
    $contador = 0;
    $RegUser = $_POST['reguser'];
    $RegPassword =  $_POST['regpassword'];
    $RegPassword2 =  $_POST['regpassword2'];

    if ($RegPassword != $RegPassword2)
    {
        echo "<h3 style='color:red;'>Las contraseñas no coinciden</h3>";
    }
    else
    {
        $contador++;
    }

    $mysqli = new mysqli("192.168.0.27:3306", "root", "2030!");
    if ($mysqli->connect_error) {
        echo "Error al realizar la conexion";
    }
    else
    {
        $mysqli->select_db("Region_Arjonia");
        
        $sql= "SELECT Nombre FROM Credencial";
        $res=$mysqli->query($sql,MYSQLI_USE_RESULT);
        if($res) {     
            $fila=$res->fetch_assoc();
            $existe2 = false;
            while ($fila = $res->fetch_assoc()) {
                if ($RegUser == $fila["Nombre"]) {
                    $existe2 = true;
                    break;
                }
            }
        
            if ($existe2) {
                echo "<h3 style='color:red;'>El nombre de usuario ya existe</h3>";
            } else {
                $contador++;
            } 
            $res->close(); 
        }
        else{
            echo "<h3 style='color:red;'>Fallo al obtener la lista</h3>";
        }    
                                    
    }
    $mysqli->close(); 
    

    if ($contador == 2)
    {
        $mysqli = new mysqli("192.168.0.27:3306", "root", "2030!");
        if ($mysqli->connect_error) {
            echo "<h3 style='color:red;'>Error al realizar la conexion</h3>";
        }
        else
        {
            $mysqli->select_db("Region_Arjonia");
            
                $sql= "INSERT INTO Credencial (Nombre, Clave) VALUES ('$RegUser', '$RegPassword')";
                $res=$mysqli->query($sql,MYSQLI_USE_RESULT);
                if($res) 
                {  
                    echo "<h3 style='color:white;'>Registro completado correctamente</h3>";
                } 
                else
                {
                    echo "<h3 style='color:red;'>Fallo al registrarse</h3>";
                 }       
                                        
        }
        $mysqli->close(); 
    }

}
ob_end_flush(); // Flush the output buffer and send the response to the browser
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--Francisco Marchal García y David Tobajas Caballero-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In or Register</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/anvil.png">
</head>
<body>


           <div class="texto">
                <div id='login-form'class='login-page'>
                    <div class="form-box">
                        <div class='button-box'>
                            <div id='btn'></div>
                            <button type='button'onclick='login()'class='toggle-btn'>Log in</button>
                            <button type='button'onclick='register()'class='toggle-btn'>&nbsp;&nbsp;Registro</button>
                        </div>
                        <form id='login' class='input-group-login' method="post">
                            <input type='text'class='input-field'placeholder='Nombre de usuario' name="user" required>
                            <input type='password'class='input-field'placeholder='Contraseña' name="password" required>
                            <input type='checkbox'class='check-box'><span>Recordar contraseña</span>
                            <button type='submit'class='submit-btn' name="boton">Log in</button>
                        </form>

                        

                        <form id='register' class='input-group-register' method="post">
                            <input type='text'class='input-field'placeholder='Nombre de usuario' name="reguser" required>
                            <input type='password'class='input-field'placeholder='Contraseña' name="regpassword" required>
                            <input type='password'class='input-field'placeholder='Repite contraseña' name="regpassword2" required>
                            <input type='checkbox'class='check-box' required><span>Acepto las condiciones</span>
                            <button type='submit'class='submit-btn' name="boton2">Registrar</button>
                        </form>
                    </div>
                </div>
           </div>
           <script>
                var x=document.getElementById('login');
                var y=document.getElementById('register');
                var z=document.getElementById('btn');
                function register()
                {
                    x.style.left='-400px';
                    y.style.left='50px';
                    z.style.left='110px';
                }
                function login()
                {
                    x.style.left='50px';
                    y.style.left='450px';
                    z.style.left='0px';
                }
            </script>
</body>
</html>

