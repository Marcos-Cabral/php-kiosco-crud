<?php  include("includes/header.php");
include("db.php");
?>
<div class="container p-4 my-5">
    <h2>Lo mas vendido.</h2>
    <form action="" method="POST">
            <div class="row">
            <div class="form-group col-md-9">
                <select name="orden" class="form-control">
                    <option value="0">Filtra las ventas</option> 
                    <option value="1">El producto mas vendido</option>
                    <option value="2">La categoria con mas ventas</option>
                    <option value="3">Ventas por categoria</option>
                    <option value="4">El producto mas vendido de cada categoria</option>                
                </select>
                
            </div>
            <div class="col-md-3">
                <input type="submit" name="guardar" value="Filtrar" class="btn btn-primary w-50">   
            </div>
        </div>
        
    </form>   
            <div class="row my-4">
                        <?php
                         if(isset($_POST['guardar'])){
                                            
                                switch($_POST['orden']){ 
                                    case 1:?>
                                    <h5>El producto mas vendido</h5>
                                     <table class="table table-bordered my-4">        
                                        <!--mas vendido-->   
                                        <?php include("ventas/mas_vendido.php")?>

                                    </table> 
                                    <?php break;?>
                                    
                                    <?php
                                     case 2:?>
                                     <h5>La categoria con mas ventas</h5>
                                     <table class="table table-bordered my-4">      
                                        <?php include("ventas/cat_mas_vendida.php")?>
                                     </table>
                                    <?php break;?>
                                    
                                    <?php                    
                                     case 3:?>
                                     <h5>Ventas por categoria</h5>
                                         <table class="table table-bordered my-4">      
                                            <?php include("ventas/ventas_por_categoria.php");?>
                                        </table> 
                                    <?php break;?>
                                    
                                    <?php                    
                                     case 4:?>
                                      <table class="table table-bordered my-4">                                  
                                        <h2>El producto mas vendido de cada categoria</h2>            
                                        <thead>
                                            <tr>   
                                                <th>Producto</th>
                                                <th>Categoria</th> 
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                              
                                    <?php include("ventas/golosinas_venta.php")?>
                                    <?php  include("ventas/bebidas_venta.php")?>
                                    <?php   include("ventas/cigarrillos_venta.php")?>
                                    <?php break;?>

                                    
                                    <?php
                                }
                            }
                        ?>
                        
             </div>
                   

</div>
<?php
include("includes/footer.php");
?>