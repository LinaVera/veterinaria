<?php
    include("conexion.php");
    if(isSet($_POST['ultimoID'])){
    $ultimoID=$_POST['ultimoID'];
    $result=$conexion->query("SELECT * FROM producto p, categoria_producto cp WHERE Codigo>'$ultimoID' AND p.Categoria = cp.CodigoC ORDER BY Codigo ASC ");
    $count=$result->num_rows;
    while($fila=$result->fetch_assoc()){
?>
<tr>
    <td> <?php echo $fila['Codigo']; ?></td>
    <td> <?php echo '<img style="width:180px" src="data:image/jpeg;base64,'.base64_encode($fila["Imagen"]).'"/>';?></td>
    <td> <?php echo $fila['Nombre_Producto']; ?></td>
    <td> <?php echo $fila['Descripcion']; ?></td>
    <td> <?php echo $fila['Especie']; ?></td>
    <td> <?php echo $fila['Nombre_Categoria']; ?></td>
    <td> <?php echo $fila['Cantidad']; ?></td>
    <td> <?php echo $fila['Precio_Compra']; ?></td>
    <td> <?php echo $fila['Precio_Venta']; ?></td>
</tr>
<?php
    }
}
?>