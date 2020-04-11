<?php  
                                    $registros =("SELECT p.nombre, sum(d.cantidad_prod)as 'cantidad' from productos as p
                                    inner join detalle_venta as d on d.id_prod = p.id
                                    inner join categoria as c on c.id=p.categoria
                                     where p.categoria=2 && c.nombre like 'bebidas'
                                    group by p.id
                                    having sum(d.cantidad_prod) = (
                                        select max(maximo.cantidad) from
                                        (
                                            select sum(cantidad_prod) as cantidad
                                            from detalle_venta as d 
                                            inner join productos as p on d.id_prod = p.id
                                            inner join categoria as c on c.id=p.categoria
                                            where p.categoria=2 && c.nombre like 'bebidas'
                                            group by p.id
                                        )as maximo 
                                    );
                                                                   
                                ");                                        
                                    
                                    $resultado= mysqli_query($conn,$registros);
                                        
                                    while($row= mysqli_fetch_array($resultado)){ ?>
                                        <tr>
                                            <td><?php echo $row['nombre']?></td>
                                            <td>Bebidas</td>
                                            <td><?php echo $row['cantidad']?></td>                                                 
                                                                 
                                        </tr>                               
                                    <?php      
                                }
                             ?>