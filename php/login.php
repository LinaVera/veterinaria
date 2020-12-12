<?php
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    require("conexion.php");

    $sql="SELECT * FROM trabajador WHERE Cedula='$usuario' AND Clave='$clave'";
    $login=$conexion->query($sql);
        if($fila=mysqli_fetch_array($login)){
            session_start();
            $_SESSION['nombre'] = $fila['Nombre'];
            $_SESSION['email'] = $fila['Correo_Electronico'];
            $_SESSION['codigo'] = $fila['Codigo'];
            if($fila['Rol']==1){                
                $_SESSION['rol'] = 1;
                echo'<script type="text/javascript">
                alert("Bienvenido '.$_SESSION['nombre'].'");
                window.location.href="inventario.php";
                </script>';
            }
            else if($fila['Rol']==3){
                $_SESSION['rol'] = 3;
                echo'<script type="text/javascript">
                alert("Bienvenido '.$_SESSION['nombre'].'");
                window.location.href="AtencionMascota.php";
                </script>'; 
            }
            else if($fila['Rol']==3){
                $_SESSION['rol'] = 3;
                echo'<script type="text/javascript">
                alert("Cliente '.$_SESSION['nombre'].' no tiene acceso.");
                window.location.href="../html/login.html";
                </script>'; 
            }
            else if($fila['Rol']==4){
                $_SESSION['rol'] = 4;
                echo'<script type="text/javascript">
                alert("Domiciliario '.$_SESSION['nombre'].' no tiene acceso.");
                window.location.href="../html/login.html";
                </script>'; 
            }
        }else{
            echo'<script type="text/javascript">
            alert("Datos errados");
            window.location.href="../html/login.html";
            </script>';
        }
        
?>
