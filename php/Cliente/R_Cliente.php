<?php
    $nombred = $_POST['Nombre_duenio'];
    $telefono = $_POST['Telefono'];
    $email = $_POST['Email'];
    $cedula = $_POST['Cedula'];
    require("../conexion.php");
    if($nombred != null && $telefono !=null && $email != null && $cedula != null){
        $sql="SELECT * FROM usuario WHERE Cedula='$cedula'";
            $resultado=$conexion->query($sql);
            $con=$resultado->num_rows;
            //No exista ya el codigo
                if($con>0){
                    echo'<script type="text/javascript">
                    alert("Ya existe Usuario.");
                    window.location.href="../Usuario.php";
                    </script>';
                }else{
                    $saber="INSERT INTO usuario(`Nombre`, `Rol`,`Telefono`,`Correo_Electronico`,`Cedula`)  VALUES('$nombred', 2 ,'$telefono', '$email','$cedula')";
                    if($saberBD=$conexion->query($saber)){
                        echo'<script type="text/javascript">
                        alert("Se registró usuario exitosamente.");
                        window.location.href="../Usuario.php";
                        </script>';
                    }else{
                        echo'<script type="text/javascript">
                        alert("Error, no se registró usuario.");
                        window.location.href="../Usuario.php";
                        </script>';  
                    }
                }
    }else{
        echo'<script type="text/javascript">
        alert("Campos invalidos");
        window.location.href="../Usuario.php";
        </script>';
    }
?>