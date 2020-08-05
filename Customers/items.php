<!-- 1 -->
<?php
session_start();

if(!$_SESSION['user_email'])
{

    header("Location: ../index.php");
}

?>



<!-- 2 -->
<?php
 include("config.php");
 extract($_SESSION); 
		  $stmt_edit = $DB_con->prepare('SELECT * FROM users WHERE user_email =:user_email');
		$stmt_edit->execute(array(':user_email'=>$user_email));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
?>
		

<?php
 include("config.php");
		  $stmt_edit = $DB_con->prepare("select sum(order_total) as total from orderdetails where user_id=:user_id and order_status='Ordered'");
		$stmt_edit->execute(array(':user_id'=>$user_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
?>



<!-- del admin -->
<?php

	require_once 'config.php';
	
	if(isset($_GET['delete_id']))
	{
		
		$stmt_select = $DB_con->prepare('SELECT item_image FROM items WHERE item_id =:item_id');
		$stmt_select->execute(array(':item_id'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("item_images/".$imgRow['item_image']);
		
	
		$stmt_delete = $DB_con->prepare('DELETE FROM items WHERE item_id =:item_id');
		$stmt_delete->bindParam(':item_id',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: items.php");
	}
?>
<!-- aqui termina -->










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Portal</title>
	 <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    

   
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/datatables.min.js"></script>

   
    
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Automotriz de la Sierra S.A. de C.V.</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <ul class="nav navbar-nav side-nav">

                    <li class="active"><a href="index.php"> &nbsp; <span class='glyphicon glyphicon-home'></span> Panel de Usuario</a></li>
					<li><a href="items.php"> &nbsp; <span class='glyphicon glyphicon-shopping-cart'></span> Refacciones</a></li>
					<li><a href="cart_items.php"> &nbsp; <span class='fa fa-cart-plus'></span> Ubicación</a></li>
					<li><a href="orders.php"> &nbsp; <span class='glyphicon glyphicon-list-alt'></span> Contactanos</a></li>
					<li><a href="view_purchased.php"> &nbsp; <span class='glyphicon glyphicon-eye-open'></span> Espacio</a></li>
					<li><a data-toggle="modal" data-target="#setAccount"> &nbsp; <span class='fa fa-gear'></span> Configura tu cuenta</a></li>
					<li><a href="logout.php"> &nbsp; <span class='glyphicon glyphicon-off'></span> Salir</a></li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                    <a href="#">
                            | H u a u c h i n a n g o  |
                        </a>
                        
                    </li>
                     <li class="dropdown user-dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">  <i class="fa fa-user"></i> <?php echo " ",$user_firstname," ", $user_lastname;  ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            
			
			
			
			
			
			
			
			
	
			 <div class="alert alert-info">
                        
                          <center> <h3><strong>Nuestros Productos</strong> </h3></center>
						  
						  </div>
						  
						  <br />
						  
						  <div class="table-responsive">
                          <!-- class="display table table-bordered"  CLASICONA-->
                          <!--   class="table"  MINIMALISTAS -->
                           <!--   class="table table-striped table-dark"  MINIMALISTAS CON INTERCALADOS MEDIOS SOMBREADOS -->
            <table  class="table" id="example" cellspacing="0" width="100%">
            <thead>
                <tr class="table-active">
                <th><center>Imagen</center></th>
                  <th>Nombre</th>
				  <th>Precio (MX)</th>
				  <th>Fecha en que se registró</th>
                  <th><center>Acciones</center></th>
                 
                </tr>
              </thead>

              <tbody>
			  <?php



include("config.php");
	$stmt = $DB_con->prepare('SELECT * FROM items');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
			
			?>
                 <tr>
                  <td>
				<center> <img src="../Admin/item_images/<?php echo $item_image; ?>" class="img img-rounded"  width="130" height="130" /></center>
				 </td>
                 <td><?php echo $item_name; ?></td>
				 <td>$ <?php echo $item_price; ?></td>
				 <td><?php echo $item_date; ?></td>
				 
				<!-- estos son los botones -->
                 <td>
				 <center>
                 <a class="btn btn-info" 
                 href="edititem.php?edit_id=
                 <?php echo $row['item_id']; ?>
                 " title="click for edit" >  <!-- en este renglon se hace el mensaje de confirmacion     -->
                 <span class='glyphicon glyphicon-pencil'></span> 
                 Ver Producto</a> 
				
                  <!-- <a class="btn btn-danger" href="?delete_id=<?php echo $row['item_id']; ?>" title="click for delete" onclick="return confirm('Estas seguro de eliminar este producto?')"><span class='glyphicon glyphicon-trash'></span> Eliminar Producto</a> -->
                  </center>
                  </td>




                </tr>
               
              <?php
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		echo "<br />";
		echo '<div class="alert alert-default" style="background-color:#033c73;">
                       <p style="color:white;text-align:center;">
                       &copy 2020 De la Sierra S.A. de C.V.| Todos los derechos reservados |  Design by : Ulises Pérez Morales

						</p>
                        
                    </div>
	</div>';
	
		echo "</div>";
	}
	else
	{
		?>
		
			
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
		
	</div>
	</div>
	
	<br />
	<br />
						  
						  
						  
			
			
            
                </div>
            </div>

           

           
        </div>
		
		
		
    </div>
    <!-- /#wrapper -->

	
	<!-- Mediul Modal -->
    <div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
          <div class="modal-dialog modal-sm">
            <div style="color:white;background-color:rgb(3,71,136);" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 style="color:white" class="modal-title" id="myModalLabel">Configuracion</h2>
              </div>


              <div class="modal-body">
         
				
			
				
              <form enctype="multipart/form-data" method="post" action="settings.php">
                   <fieldset>
					
						
                   <p>Nombre</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Firstname" name="user_firstname" type="text" value="<?php  echo $user_firstname; ?>" required>
                           
							 
							</div>
							
							
							<p>Apellido Paterno:</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Lastname" name="user_lastname" type="text" value="<?php  echo $user_lastname; ?>" required>
                           
							 
							</div>
							
							<p>Apellido Materno</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Address" name="user_address" type="text" value="<?php  echo $user_address; ?>" required>
                           
							 
							</div>
							
							<p>Contraseña</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Password" name="user_password" type="password" value="<?php  echo $user_password; ?>" required>
                           
							 
							</div>
							
							
							<div class="form-group">
							
                                <input class="form-control hide" name="user_id" type="text" value="<?php  echo $user_id; ?>" required>
                           
							 
							</div>
				   
				   
					 </fieldset>
                  
            
              </div>
              <div class="modal-footer">
               
               <button class="btn btn-block btn-success btn-md" name="user_save">Guardar</button>
               
                <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancelar</button>
               
               
                  </form>
             </div>
           </div>
         </div>
       </div>
		
		


        
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	  $('#example').dataTable();
	});
    </script>
		
	  	  <script>
   
    $(document).ready(function() {
        $('#priceinput').keypress(function (event) {
            return isNumber(event, this)
        });
    });
  
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }    
</script>

</body>
</html>
