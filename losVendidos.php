<?php  include("includes/header.php");
include("db.php");
?>
<div class="container p-4">
    
            <div class="row my-4">
                        <h5>El producto mas vendido</h5>
                        <table class="table table-bordered my-4">        
                            <!--mas vendido-->   
                            <?php include("ventas/mas_vendido.php")?>

                        </table>

                        <h5>La categoria con mas ventas</h5>
                        <table class="table table-bordered my-4">      
                            <?php include("ventas/cat_mas_vendida.php")?>
                        </table>
                        
                        <h5>Ventas por categoria</h5>
                        <table class="table table-bordered my-4">      
                             <?php include("ventas/ventas_por_categoria.php");?>
                        </table>                                   
                                    
             </div>
                    <div class="row my-4">
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
                             <?php   include("ventas/cigarrillos_venta.php");?>
                            
                            
                                                            
                           
                         </div>

</div>
<?php
include("includes/footer.php");
?>