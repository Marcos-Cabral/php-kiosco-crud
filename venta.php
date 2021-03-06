<?php  include("includes/header.php");?>

<div class="container p-4 my-4">
                <h2>Añadir venta</h2>
            <div class="row">
                <div class="col-md-4 mx-auto my-5">
                <?php if(isset($_SESSION['msg'])) { ?>
                    <div class="alert alert-<?= $_SESSION['color']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['msg']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset(); } ?>
                    <!--<div class="card card-body">
                        <form id="form" action="venta.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="nombre" placeholder="Ingrese nombre del producto" class="form-control" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="cantidad" placeholder="Ingrese cantidad" class="form-control" autofocus>
                                </div>
                                    <input type="submit" name="guardar" value="Generar venta" class="btn btn-primary">                    
                        </form>                
                    </div>-->

                 

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <div class="form-group">
                                <select name="producto" class="form-control">
                                    <option value="0">Seleccione producto:</option>
                                    <?php
                                        include("db.php");

                                        $query="SELECT * FROM productos";
                                        $query_cat= mysqli_query($conn,$query);
                                        
                                        while($valores = mysqli_fetch_array($query_cat)){
                                            echo '<option name="producto" value="'.$valores[id].'" required>'.$valores[nombre].'</option>';
                                        }

                                    ?>
                                </select>
                                <div class="form-group my-5">
                                    <input type="number" name="cantidad" placeholder="Ingrese cantidad" class="form-control" autofocus required>
                                </div>
                </div>
             <input class="btn btn-primary my-2" type="submit" name="submit" value="Buscar producto"><br>
        
        </form>
    </div>
                <div class="col-md-8 my-5">
               

<?php 

    if(isset($_POST['submit'])){
        $id_producto= $_POST['producto']; //ID -producto
        $cantidad=$_POST['cantidad']; //CANTIDAD PRODUCTO                

        $query="SELECT * FROM productos where id = $id_producto";    //busco producto por nombre 

        $resultado=mysqli_query($conn,$query);
        
        while($row= mysqli_fetch_array($resultado)){                       
                          
            $total= $cantidad*$row['precio'];           //TOTAL PRODUCTO
            $cantidad_stock=$row['cantidad_stock'];

            $venta="INSERT INTO venta VALUES()";
            mysqli_query($conn,$venta);

            $venta_query="SELECT max(id) as id FROM venta";            
            $resultado_venta= mysqli_query($conn,$venta_query);
            
            
           if($row_venta = mysqli_fetch_row($resultado_venta)){
               $id_venta=trim($row_venta[0]);           //ID VENTA

               $detalle_venta="INSERT INTO detalle_venta (id_prod, id_venta, cantidad_prod, total) VALUES('$id_producto', '$id_venta', '$cantidad', '$total')";
               $result= mysqli_query($conn,$detalle_venta);
                if($result){
                    $cantidad_stock=$cantidad_stock-$cantidad;

                    $query_cantidad="UPDATE productos set cantidad_stock='$cantidad_stock' WHERE id=$id_producto";

                    mysqli_query($conn,$query_cantidad);
                    ?>

        
                           
                    
                         <table class="table table-bordered ">        
                             <thead>
                                <tr>   
                                    <th>codigo venta</th>
                                    <th>producto</th>
                                    <th>cantidad producto</th>    
                                    <th>total a pagar</th>    
                                    <th>stock final</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   
                                    if(isset($_POST['submit'])){
                                       
                                        $registros = $conn->query("select id_detalle_venta, nombre,cantidad_prod,total, cantidad_stock from detalle_venta inner join productos as p on p.id=id_prod where id_venta like '$id_venta'");                                        
                                                    
                                        while($row= mysqli_fetch_array($registros)){ ?>
                                            <tr>
                                                <td><?php echo $row['id_detalle_venta']?></td>
                                                <td><?php echo $row['nombre']?></td>
                                                <td><?php echo $row['cantidad_prod']?></td>
                                                <td><?php echo $row['total']?></td>     
                                                <td><?php echo $row['cantidad_stock']?></td>                                        

                                            </tr>                               
                                        <?php                    
                                        } 
                                        $_SESSION['msg']="Venta realizada";
                                        $_SESSION['color']="success";
                                    }?>
                            </tbody>                
                        </table>
                        </div>
                    </div>
                </div>

                    <?php
                }
           }

           
        }
       // header("Location: venta.php");
    }
?>




    



<?php include("includes/footer.php")?>
