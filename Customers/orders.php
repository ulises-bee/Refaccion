<?php
session_start();

if(!$_SESSION['user_email'])
{

    header("Location: ../index.php");
}

?>

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
		
		<?php

	require_once 'config.php';
	
	if(isset($_GET['delete_id']))
	{
		
		
		
	
		$stmt_delete = $DB_con->prepare('DELETE FROM orderdetails WHERE order_id =:order_id');
		$stmt_delete->bindParam(':order_id',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: cart_items.php");
	}

?>
<?php

	require_once 'config.php';
	
	if(isset($_GET['update_id']))
	{
		
		
		
	
		$stmt_delete = $DB_con->prepare('update orderdetails set order_status="Ordered" WHERE order_status="Pending" and user_id =:user_id');
		$stmt_delete->bindParam(':user_id',$_GET['update_id']);
		$stmt_delete->execute();
		echo "<script>alert('Item/s successfully ordered!')</script>";	
		
		header("Location: orders.php");
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

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

   
    <link rel="stylesheet" type="text/css" href="estilo.css">
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
                            <li><a data-toggle="modal" data-target="#setAccount"><i class="fa fa-gear"></i> Configuraciones</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Salir</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            
        </nav>

        <div id="page-wrapper">
            
      
			<div class="alert alert-default" style="color:white;background-color:#008CBA">
<center><h3> <span class="fa fa-arrow-right"></span> Panel de usuario </h3></center><!-- para los iconos   https://fontawesome.com/v4.7.0/icons/     -->
        </div>
			
			<br />
						  


<!-- poner whats app xd -->
<center>
<a id="appWhatsapp" target="_blanck" href="https://api.whatsapp.com/send?phone=+527761015469&text=Refacciones Automotriz de la Sierra S.A de C.V.">
<img src="whatsapp.png" alt="Whatsapp" height="100" width="100">
</a>
</center>
<hr>
<!-- hastq aqui es lo de whats -->
	

        <!-- creo que aqui xd -->
	

		<div class="alert alert-default" style="background-color:#033c73;">
                       <p style="color:white;text-align:center;">
                       &copy 2020 De la Sierra S.A. de C.V.| Todos los derechos reservados |  Design by : Ulises Pérez Morales

						</p>
                        
                    </div>
	</div>
	

	
        </div>
       
       
       
     			
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
