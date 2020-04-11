<thead>
    <tr>   
        <th class="th">Categoria mas vendida</th>
        <th class="th">Cantidad total vendidas del producto</th> 
    </tr>
</thead>
<tbody>
    <?php  
    $registros =("SELECT c.nombre, sum(d.cantidad_prod) as 'total' from categoria as c inner join productos as p on c.id= p.categoria inner join detalle_venta as d on d.id_prod = p.id group by c.id having sum(d.cantidad_prod) = ( select max(maximo.cantidad) from( select sum(cantidad_prod) as cantidad from detalle_venta as d inner join productos as p on d.id_prod = p.id inner join categoria as c on c.id=p.categoria group by c.id )as maximo )");                                        
    $resultado= mysqli_query($conn,$registros);

    while($row= mysqli_fetch_array($resultado)){ ?>
        <tr>
            <td><?php echo $row['nombre']?></td>
            <td><?php echo $row['total']?></td>                                                 

        </tr>                               
    <?php      
    }
    ?>
