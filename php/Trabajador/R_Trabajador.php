<?php
    $nombre = $_POST['Nombre'];
    $email = $_POST['Email'];
    $tel= $_POST['Telefono'];
    $cedula= $_POST['Cedula'];
    $rol= $_POST['rol'];
    require("../conexion.php");

    if( $nombre !=null && $email != null && $tel != null &&  $cedula != null && $rol != -1){
        $sql="SELECT * FROM trabajador WHERE Cedula='$cedula'";
        $resultado=$conexion->query($sql);
        $con=$resultado->num_rows;
        if($con>0){
            echo'<script type="text/javascript">
            alert("Ya existe trabajador.");
            window.location.href="../Trabajador.php";
            </script>';
        }else{
            echo "HOLA";
            if($rol == 3){
                $saber="INSERT INTO trabajador(`Nombre`, `Rol`,`Telefono`,`Correo_Electronico`,`Cedula`,`Clave`) VALUES('$nombre', 3 , '$tel','$email','$cedula', 123)";
                if($saberBD=$conexion->query($saber)){
                    echo'<script type="text/javascript">
                    alert("Se registró trabajador exitosamente. Edita la contraseña en editar");
                    window.location.href="../Trabajador.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Error, no se registró trabajador.");
                    window.location.href="../Trabajador.php";
                    </script>';  
                }
            }else if($rol == 4){
                $saber="INSERT INTO trabajador(`Nombre`, `Rol`,`Telefono`,`Correo_Electronico`,`Cedula`,`Clave`) VALUES('$nombre', 4 , '$tel','$email','$cedula', -1)";
                if($saberBD=$conexion->query($saber)){
                    echo'<script type="text/javascript">
                    alert("Se registró domiciliario exitosamente.");
                    window.location.href="../Trabajador.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Error, no se registró domiciliario.");
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