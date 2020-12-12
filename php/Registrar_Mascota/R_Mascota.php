<?php
//Datos de usuario
    $idDuenio = $_POST['cboDuenio'];
    $nombred = $_POST['Nombre_duenio'];
    $telefono = $_POST['Telefono'];
    $email = $_POST['Email'];
    $cedula = $_POST['Cedula'];
//Datos de la mascota
    $codigo = $_POST['Codigo'];
    $nombrem = $_POST['Nombre'];
    $especie = $_POST['cboEspecie'];
    $edad = $_POST['Edad_Mascota'];
    $sexo = $_POST['cboSexo'];
    
    require("../conexion.php");
//Vacios o no seleccionados y negativos
if ($codigo != null && $nombrem != null && $especie != -1 && $edad >0 && $sexo != -1){
    if($idDuenio == -1 && $nombred == null && $telefono == null 
    && $email == null && $cedula == null){//valido que se ingresa un usuario como dueño
        echo'<script type="text/javascript">
            alert("Llenar los campos del dueño");
            window.location.href="../Mascota.php";
            </script>';
    }else{
        if($idDuenio == -1 && $nombred != null && $telefono !=null && $email != null && $cedula != null){
            $saber="INSERT INTO usuario(`Nombre`, `Rol`,`Telefono`,`Correo_Electronico`,`Cedula`)  VALUES('$nombred', 3 ,'$telefono', '$email','$cedula')";
            if($saberBD=$conexion->query($saber)){
                echo'<script type="text/javascript">
                alert("Se registró usuario exitosamente.");
                </script>';
                $sqll="SELECT Codigo FROM usuario ORDER BY Codigo DESC limit 1";
                $resultadol = $conexion->query($sqll);
                $fila = $resultadol->fetch_assoc();
                $id=$fila['Codigo'];
                $sql="SELECT * FROM mascota WHERE Codigo='$codigo'";
                $resultado=$conexion->query($sql);
                $con=$resultado->num_rows;
                //No exista ya el codigo
                if($con>0){
                    echo'<script type="text/javascript">
                    alert("Ya existe este código.");
                    window.location.href="../Mascota.php";
                    </script>';
                }else{
                    $saber="INSERT INTO mascota(`Codigo`, `NombreMascota`, `Especie`,`Edad`,`Sexo`,`usuario`)  VALUES('$codigo', '$nombrem', '$especie','$edad','$sexo','$id')";
                    if($saberBD=$conexion->query($saber)){
                        echo'<script type="text/javascript">
                        alert("Se registró mascota exitosamente.");
                        window.location.href="../Mascota.php";
                        </script>';
                    }else{
                        echo'<script type="text/javascript">
                        alert("Error, no se registró mascota.");
                        window.location.href="../Mascota.php";
                        </script>';           
                    }  
                }
            }else{
                echo'<script type="text/javascript">
                alert("Error, no se registró usuario.");
                window.location.href="../Mascota.php";
                </script>';           
            }  
            
       

        }else{
            //usuario ya registrado, registra mascota
            $id=$idDuenio;
            $sql="SELECT * FROM mascota WHERE Codigo='$codigo'";
            $resultado=$conexion->query($sql);
            $con=$resultado->num_rows;
            //No exista ya el codigo
                if($con>0){
                    echo'<script type="text/javascript">
                    alert("Ya existe este código.");
                    window.location.href="../Mascota.php";
                    </script>';
                }else{
                    $saber="INSERT INTO mascota(`Codigo`, `NombreMascota`, `Especie`,`Edad`,`Sexo`,`usuario`)  VALUES('$codigo', '$nombrem', '$especie','$edad','$sexo','$id')";
                    if($saberBD=$conexion->query($saber)){
                        echo'<script type="text/javascript">
                        alert("Se registró mascota exitosamente.");
                        window.location.href="../Mascota.php";
                        </script>';
                    }else{
                        echo'<script type="text/javascript">
                        alert("Error, no se registró mascota.");
                        window.location.href="../Mascota.php";
                        </script>';           
                    }  
                }
        }

       
    }
}else{
    echo'<script type="text/javascript">
    alert("Campos invalidos");
    window.location.href="../Mascota.php";
    </script>';
}
?>