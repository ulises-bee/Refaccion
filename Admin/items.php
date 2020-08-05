<?php
session_start();

if(!$_SESSION['admin_username'])
{

    header("Location: ../index.php");
}

?>

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
                <li><a href="index.php"> &nbsp; &nbsp; &nbsp; Panel del Administrador</a></li>
                    <li><a data-toggle="modal" data-target="#uploadModal"> &nbsp; &nbsp; &nbsp; Agregar </a></li>
                    <li class="active"><a href="items.php"> &nbsp; &nbsp; &nbsp; Inventario</a></li>
                    <li><a href="customers.php"> &nbsp; &nbsp; &nbsp; Espacio</a></li>
                    <li><a href="orderdetails.php"> &nbsp; &nbsp; &nbsp; Espacio</a></li>
                    <li><a href="logout.php"> &nbsp; &nbsp; &nbsp; Salir</a></li>
					
                    
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                    <a href="#">
                            | H u a u c h i n a n g o  |
                        </a>
                        
                    </li>
                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php   extract($_SESSION); echo $admin_username; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            
			
			
			

	
			 <div class="alert alert-info">
                        
                          <center> <h3><strong>Refacciones</strong> </h3></center>
						  
			 </div>
						  

						  <br />
						  
						  <div class="table-responsive">
            <table class="table" id="example" cellspacing="0" width="100%">
              <thead>
                <tr>	
                  <th>Imagen</th>
                  <th>Nambre</th>
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
          <!-- cuerpo de la tabla -->
                  <td>
				<center> 
					<img src="item_images/<?php echo $item_image; ?>" class="img img-rounded"  width="80" height="80" />
				</center>
				 </td>
                 <td><?php echo $item_name; ?></td>
				 <td>$ <?php echo $item_price; ?></td>
				 <td><?php echo $item_date; ?></td>
				 

				 <td>
				 <center><a class="btn btn-info" href="edititem.php?edit_id=<?php echo $row['item_id']; ?>" title="click for edit" onclick="return confirm('A continuación podras modificar este producto')"><span class='glyphicon glyphicon-pencil'></span> Editar Producto</a> 
				
                  <a class="btn btn-danger" href="?delete_id=<?php echo $row['item_id']; ?>" title="click for delete" onclick="return confirm('Estas seguro de eliminar este producto?')"><span class='glyphicon glyphicon-trash'></span> Eliminar Producto</a>
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
                       &copy 2020  Volskvagen| All Rights Reserved |  Design by : De la Sierra

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
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
          <div class="modal-dialog modal-md">
            <div style="color:white;background-color:rgb(3,71,136);" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 style="color:white" class="modal-title" id="myModalLabel">Agregar refacción</h2>
              </div>
              <div class="modal-body">
         
				
			
				
				 <form enctype="multipart/form-data" method="post" action="additems.php">
                   <fieldset>
					
						
                            <p>Nombre:</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="nombre" name="item_name" type="text" required>
                           
							 
							</div>
							
							
							
							
							
							
							
							
							<p>Precio:</p>
                            <div class="form-group">
							
                                <input id="priceinput" class="form-control" placeholder="precio" name="item_price" type="text" required>
                           
							 
							</div>
							
							
							<p>Elegir Imagen:</p>
							<div class="form-group">
						
							 
                                <input class="form-control"  type="file" name="item_image" accept="image/*" required/>
                           
							</div>
				   
				   
					 </fieldset>
                  
            
              </div>
              <div class="modal-footer">
               
                <button class="btn btn-success btn-md" name="item_save">Save</button>
				
				 <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
				
				
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














