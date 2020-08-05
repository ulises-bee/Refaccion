<?php
session_start();

if(!$_SESSION['admin_username'])
{

    header("Location: ../index.php");
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
            
			
			
			
			
			
			<div id="my-carousel" class="carousel slide hero-slide hidden-xs" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#my-carousel" data-slide-to="1"></li>
        <li data-target="#my-carousel" data-slide-to="2"></li>
		<li data-target="#my-carousel" data-slide-to="3"></li>
        <li data-target="#my-carousel" data-slide-to="4"></li>
		<li data-target="#my-carousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
		
            <img src="../assets/img/1-slide.jpg" alt="Hero Slide" style="width:100%;height:500px;">

            <div class="carousel-caption">
                <h1 style="font-family:Century Gothic"><b></b></h1>

                <h2></h2>
            </div>
        </div>
        <div class="item">
            <img src="../assets/img/2-slide.jpg" alt="..." style="width:100%;height:500px;">

            <div class="carousel-caption">
               
            </div>
        </div>
        <div class="item">
            <img src="../assets/img/3-slide.jpg" alt="..." style="width:100%;height:500px;">

            <div class="carousel-caption">
		

                <p></p>
            </div>
        </div>
		
		<div class="item">
            <img src="../assets/img/4-slide.jpg" alt="..." style="width:100%;height:500px;">

            <div class="carousel-caption">
		

                <p></p>
            </div>
        </div>
		
		<div class="item">
            <img src="../assets/img/5-slide.jpg" alt="..." style="width:100%;height:500px;">

            <div class="carousel-caption">
		

                <p></p>
            </div>
        </div>
		
		<div class="item">
            <img src="../assets/img/6-slide.jpg" alt="..." style="width:100%;height:500px;">

            <div class="carousel-caption">
		

                <p></p>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
	
      <span class="icon-prev"></span>
       
    </a>
    <a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
       
       <span class="icon-next"></span>
    </a>

<!-- #my-carousel-->
			
			</div>
			
			
		<br />	
			<div class="alert alert-info" align="justify">
                       <!-- para ponerlo de colores:
                       "alert alert-danger"  rojo
                       "alert alert-success" verde
                       "alert alert-warning" amarillo  -->
La Planta de Componentes Puebla de Volkswagen de México obtuvo el primer lugar 
entre las 23 fábricas del Grupo Volkswagen en la competencia "Speed+ 2019" con 
los mejores resultados en eficiencia de ensamble. La competencia "Speed+ 2019" 
dura nueve meses y se realiza entre las plantas de Volkswagen que cuentan con 
procesos de producción de componentes, mismos que después se incorporan a las 
líneas de fabricación de autos o son dirigidos al mercado de refacciones. 
						
                    </div>
					<br />
			
			
         

                
<!-- aqui xD -->
<!-- esto es lo que pegue de la pagina madre -->
        

<table width="100%" >
 <thead>
 <tr>
            <th>
            <center><div><h3>Ubicación</h3><ul>Ausencio T. Jiménez No.1, 73168<br>San Juan, Huauchinango,Puebla</ul></div></center><br> <br><br>
            </th>

            <th>
                                        <div>
                                        <center><h3>Horario de Servicio</h3></center>
                                        <ul>
                                            
                                           Teléfono: <a tel="7767620480"  href="tel:7767620480"> 7767620480</a>
                                            <li>Lunes a Viernes <br> 08:30 AM - 07:00 PM</li>  
                                            <li>Sábado <br> 08:30 AM - 02:00 PM </li>
                                                
                                        </ul>
                                        </div>
            </th>

            <th>
                                            <div>
                                            <center><h3>Horario de Refacciones</h3></center>
                                            <ul>
                                                    
                                                Teléfono: <a class="TelefonoRefacciones" name="Refacciones" tel="7767620480"  href="tel:7767620480">7767620480</a>
                                                    
                                                <li>Lunes a Viernes <br> 09:00 AM - 07:00 PM</li>                       
                                                     
                                                <li>Sábado <br> 09:00 AM - 05:00 PM </li>
                                                    
                                            </ul>
                                            </div>
            </th>

            <th>
                                            <h3>Redes Sociales</h3>
                                            <ul>
                                                 <a target="_blank" href="https://www.facebook.com/VWDeLaSierra?fref=ts"><center>fb</center></a> 
                                                <a target="_blank" href="https://www.instagram.com/volkswagendelasierra/?hl=es-la"><center>Instagram</center></a> 
                                            </ul>
            <br> <br><br>
            </th>
                  
                </tr>

              </thead>
</table>
   

<!-- aqui termina -->
   <div class="alert alert-default" style="background-color:#033c73;">
                       <p style="color:white;text-align:center;">
                      &copy 2020 De la Sierra S.A. de C.V.| Todos los derechos reservados |  Design by : Ulises Pérez Morales
                      </p>     
            </div>

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









