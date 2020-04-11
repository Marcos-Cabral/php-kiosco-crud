<thead>
    <tr>   
        <th class="th">Categoria</th>
        <th class="th">Cantidad de ventas de la categoria</th> 
    </tr>
</thead>
<tbody>
<?php  
$registros=("SELECT sum(cantidad_prod) as 'total', c.nombre from detalle_venta inner join productos as p on p.id=id_prod inner join categoria as c on categoria=c.id group by categoria");

$resultado= mysqli_query($conn,$registros);

while($row= mysqli_fetch_array($resultado)){ ?>
<tr>
<td><?php echo $row['nombre']?></td>
<td><?php echo $row['total']?></td>                                                 

</tr>                               
<?php      
}
?>
</tbody>        