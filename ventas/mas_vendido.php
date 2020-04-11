
<thead>
    <tr>   
        <th class="th">Producto mas vendido</th>
        <th class="th">Cantidad vendidas del producto</th> 
        <th class="th">Total</th> 
    </tr>
</thead>
    <tbody>                            
        <?php  
        $registros =("SELECT p.nombre,p.id,  sum(d.cantidad_prod) as 'total',p.precio FROM productos as p INNER JOIN detalle_venta as d on p.id= d.id_prod group by p.id having sum(d.cantidad_prod) = ( select max(maximo.cantidad) from ( select sum(cantidad_prod) as cantidad from detalle_venta group by id_prod )as maximo ) ");                                         
        $resultado= mysqli_query($conn,$registros);

        while($row= mysqli_fetch_array($resultado)){ ?>
        <tr>
            <td><?php echo $row['nombre']?></td>
            <td><?php echo $row['total']?></td> 
            <td><?php echo $row['total']*$row['precio']?></td>                         
        </tr>                               
    <?php   }
?>