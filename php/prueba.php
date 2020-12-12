<?php
    $idP = 0;
   // $idP = $_REQUEST['id'];
    if($idP==0){
        ?>
<div>
    <label for="Categoria">Categoria del producto:</label>
    <select name="cboCategoria" style="width:50%;">
        <option value="-1">Seleccione categoria</option>
        <?php
                        require("conexion.php");
                        $consulta = "SELECT * FROM categoria_producto";
                        $resultado = $conexion->query($consulta);
                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
        <option value="<?php echo $fila['CodigoC']; ?>"><?php echo $fila['Nombre_Categoria']; ?>
        </option>
        <?php
                        }
                    ?>
    </select>
    <button>Buscar</button>
</div>
<div>
    <label for="Codigo">Código del producto:</label>
    <input type="text" name="codigo" placeholder="Digite el código">
    <button>Buscar</button>
</div>
<div id="regis">
    <div class="Contene-inputs">
        <form action="" method="POST">
            <label for="Codigo">Nombre del producto:</label> <br>
            <label for="Codigo">Empresa:</label>
            <select name="cboCategoria" style="width:50%;">
                <option value="-1">Seleccione categoria</option>
                <?php
                        require("conexion.php");
                        $consulta = "SELECT * FROM proveedor";
                        $resultado = $conexion->query($consulta);
                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
                <option value="<?php echo $fila['id']; ?>"><?php echo $fila['empresa']; ?>
                </option>
                <?php
                        }
                    ?>
            </select>
            <br>
            <label for="Cantidad">Cantidad</label>
            <input type="number" name="cantidad" placeholder="Cantidad">
            <br>
            <input type="submit" value="Realizar pedido">
        </form>
    </div>
</div>
<?php
    }else{

    }
?>