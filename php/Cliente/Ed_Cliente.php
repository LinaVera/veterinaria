<?php
    $codigo = $_POST['id'];
    $nombred = $_POST['Nombre_duenio'];
    $telefono = $_POST['Telefono'];
    $email = $_POST['Email'];
    $cedula = $_POST['Cedula'];
    require("../conexion.php");
//Vacios o no seleccionados y negativos
if($nombred != null && $telefono !=null && $email != null && $cedula != null){
    $sql="SELECT * FROM usuario WHERE Cedula='$cedula'";
            $resultado=$conexion->query($sql);
            $con=$resultado->num_rows;
            //No exista ya el codigo
                if($con>1){
                    echo'<script type="text/javascript">
                    alert("Ya existe Usuario.");
                    window.location.href="../Usuario.php";
                    </script>';
                }else{
                    $saber="UPDATE usuario SET Nombre='$nombred', Telefono='$telefono', Correo_Electronico='$email',Cedula='$cedula' WHERE Codigo = '$codigo'";
                    if($saberBD=$conexion->query($saber)){
                        echo'<script type="text/javascript">
                        alert("Se actualizó usuario exitosamente.");
                        window.location.href="../Usuario.php";
                        </script>';
                    }else{
                        echo'<script type="text/javascript">
                        alert("Error, no se actualizó usuario.");
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