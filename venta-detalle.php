<?php  include("includes/header.php");
include("db.php");
?>
<div class="container p-4 my-4">
    <form action="" method="POST">
        <h2>Filtrar ventas</h2>
        <div class="row">        
        <div class="form-group col-md-9">           
            <select name="orden" class="form-control">
                <option value="0">Filtra las ventas</option> 
                <option value="1">Ventas mas recientes</option>
                <option value="2">Ventas mas viejas</option>
                <option value="3">Ventas con mas total</option>
                <option value="4">Ventas con mas producto</option>                
            </select>
            
        </div>
        <div class="col-md-3">
            <input type="submit" name="guardar" value="Filtrar" class="btn btn-primary w-50">
            <a href="vaciar_ventas.php" class="btn btn-danger">
                Vaciar ventas
            </a>        
        </div>
    </div>
    
    </form>                





                     <div class="row my-4">
                         <table class="table table-bordered my-4">        
                             <thead>
                                <tr>   
                                    <th>codigo venta</th>
                                    <th>producto</th>
                                    <th>cantidad de productos</th>    
                                    <th>total de venta</th>    
                                    <th>fecha venta</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php   
                                    
                                   
                                    $registros =("SELECT id_detalle_venta,nombre,cantidad_prod,total, hour(fecha),minute(fecha),day(fecha),month(fecha) FROM detalle_venta INNER JOIN productos on productos.id=id_prod INNER JOIN venta on id_venta=venta.id order by fecha desc");                                        
                                   
                                    if(isset($_POST['guardar'])){
                                            
                                            switch($_POST['orden']){ 
                                                case 1:
                                                    $registros =("SELECT id_detalle_venta,nombre,cantidad_prod,total, hour(fecha),minute(fecha),day(fecha),month(fecha) FROM detalle_venta INNER JOIN productos on productos.id=id_prod INNER JOIN venta on id_venta=venta.id order by fecha desc");                 
                                                break;
                                                case 2:
                                                    $registros =("SELECT id_detalle_venta,nombre,cantidad_prod,total, hour(fecha),minute(fecha),day(fecha),month(fecha) FROM detalle_venta INNER JOIN productos on productos.id=id_prod INNER JOIN venta on id_venta=venta.id order by fecha asc");                                        
                                                break;
                                                case 3:
                                                    $registros=(" SELECT id_detalle_venta,nombre,cantidad_prod,total, hour(fecha),minute(fecha),day(fecha),month(fecha) FROM detalle_venta INNER JOIN productos on productos.id=id_prod INNER JOIN venta on id_venta=venta.id order by total desc;");
                                                break;
                                                case 4:
                                                   $registros=("SELECT id_detalle_venta,nombre,cantidad_prod,total, hour(fecha),minute(fecha),day(fecha),month(fecha) FROM detalle_venta INNER JOIN productos on productos.id=id_prod INNER JOIN venta on id_venta=venta.id order by cantidad_prod desc;");
                                                break;
                                            }
                                        }
                                            
                                            $resultado= mysqli_query($conn,$registros);
                                            
                                            while($row= mysqli_fetch_array($resultado)){ ?>
                                            <tr>
                                                <td><?php echo $row['id_detalle_venta']?></td>
                                                <td><?php echo $row['nombre']?></td>                                                   
                                                <td><?php echo $row['cantidad_prod']?></td>                                                   
                                                <td><?php echo $row['total']?></td>      
                                                <td><?php echo $row['hour(fecha)'].":".$row['minute(fecha)']." ".$row['day(fecha)']."/".$row['month(fecha)']?></td>                                  
                                            </tr>                               
                                        <?php                    
                                         
                                        
                                    }?>
                            </tbody>                
                        </table>
                    </div>
                </div>


<?php
include("includes/footer.php");
?>
