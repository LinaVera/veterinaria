<?php
    $nombre = $_POST['Nombre'];
    $email = $_POST['Email'];
    $tel= $_POST['Telefono'];
    $cedula= $_POST['Cedula'];
    $rol= $_POST['rol'];
    $id= $_POST['id'];
    require("../conexion.php");

    if( $nombre !=null && $email != null && $tel != null &&  $cedula != null && $rol != -1){
        $sql="SELECT * FROM trabajador WHERE Cedula='$cedula'";
        $resultado=$conexion->query($sql);
        $con=$resultado->num_rows;
        if($con>1){
            echo'<script type="text/javascript">
            alert("Ya existe trabajador.");
            window.location.href="../Trabajador.php";
            </script>';
        }else{
            if($rol == 3){
                $contraseña = $_POST['contraseña'];
                $saber="UPDATE trabajador SET Nombre='$nombre', Telefono= '$tel', Correo_Electronico='$email',Cedula='$cedula',Clave='$contraseña' WHERE Codigo = '$id'";
                if($saberBD=$conexion->query($saber)){
                    echo'<script type="text/javascript">
                    alert("Se actualizó trabajador exitosamente.");
                    window.location.href="../Trabajador.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Error, no se actualizó trabajador.");
                    window.location.href="../Trabajador.php";
                    </script>';  
                }
            }else if($rol == 4){
                $saber="UPDATE trabajador SET Nombre='$nombre', Telefono= '$tel', Correo_Electronico='$email',Cedula='$cedula' WHERE Codigo = '$id'";
                if($saberBD=$conexion->query($saber)){
                    echo'<script type="text/javascript">
                    alert("Se actualizó domiciliario exitosamente.");
                    window.location.href="../Trabajador.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Error, no se actualizoó domiciliario.");
                    window.location.href="../Trabajador.php";
                    </script>';  
                }
            }
        }
    }else{
        echo'<script type="text/javascript">
        alert("Campos invalidos");
        window.location.href="../Trabajador.php";
        </script>';
    }
?>