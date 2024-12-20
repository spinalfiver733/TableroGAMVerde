
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Tablero GAM 2024</title>

<link rel="stylesheet" type="text/css" href="../public/css/bootstrap/bootstrap.min.css"/>
 
<script src="../public/js/demo-rtl.js"></script>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

 
    <link rel="stylesheet" type="text/css" href="../public/css/libs/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/libs/nanoscroller.css"/>

    <link rel="stylesheet" type="text/css" href="../public/css/compiled/theme_styles.css"/>

    <link rel="stylesheet" href="../public/css/libs/daterangepicker.cs" type="text/css"/>
    <link type="image/x-icon" href="img/logam_jc.jpeg" rel="shortcut icon"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>


<!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
  <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
  <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
  
<style>
    
    @font-face {

font-family: montserrat;

src: url(http://www.intranet.gamadero.cdmx.gob.mx/public/fonts/Montserrat/Montserrat-VariableFont_wght.ttf);

} 
    </style>

</head>
<body>
<div id="theme-wrapper">
<header class="navbar" id="header-navbar" style="  background-color: transparent;
  background-image: url('img/cinto.png'); 
  background-size: cover;
  background-size: 100%;">

<div class="container">   
<div class="col-md-12">
    <img src="../vistas/img/logam_jc_sf.png" width="15%">
</div>


    
    
</div> 

<div class="clearfix">
<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>

</button>

<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs"> 
<ul class="nav navbar-nav pull-left">
  

<li>
<a class="btn" id="make-small-nav"><i class="fa fa-bars"></i></a> 
</li>
</ul>
</div>
      
   

<div class="nav-no-collapse pull-right" id="header-nav">
<ul class="nav navbar-nav pull-left">
<li class="dropdown profile-dropdown">


<a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="font-size:150%;">   
<img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" alt=""/>
<span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span><b class="caret"></b>
</a>



<ul class="dropdown-menu">
<!--<li><a href="../ajax/usuarios.php?op=mostrar"><i class="fa fa-user"></i>Perfil</a></li>-->
<li><a href="../ajax/usuarios.php?op=salir"><i class="fa fa-power-off"></i>Salir</a></li>
  

</ul>
</li>
</ul>
</div>
</div>
</header>
<div id="page-wrapper" class="container" style="  background-color: #e3dfde;
  background-image: url('img/cinto.png'); 
  background-size: 100%;">

<div id="nav-col" style="  background-color: #e3dfde;
  background-image: url('img/patron_ch.png'); 
  background-size: 100%;">
<br><br><br><br>
<section id="col-left" class="col-left-nano">
<div id="col-left-inner" class="col-left-nano-content">
<div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
<img alt="" src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>"/>
<div class="user-box">
<span class="name"><?php echo $_SESSION['nombre']; ?>
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i>
</a>
<ul class="dropdown-menu">
<!--<li><a href="#"><i class="fa fa-user"></i>Perfil</a></li>-->
<li><a href="../ajax/usuario.php?op=salir"><i class="fa fa-power-off"></i>Salir</a></li>
</ul>
</span>
<span class="status">
<i class="fa fa-circle"></i> En Linea
</span>
</div>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked" style="  background-color: #e3dfde;
  background-image: url('img/patron_ch.png'); 
  background-size: 100%;">
       

    
             <?php 
            if ($_SESSION['Administrador']==1)
            {
              echo '<li>
        <a href="powerBI.php">
        <i class="fa fa-dashboard"></i>
        <span>TABLERO BI</span>
        </a>
        </li>';
            }
            ?>
  
    
    
          <?php 
    //        if ($_SESSION['Escritorio']==1)
      //      {
        //      echo '<li>
//        <a target="_blank" href="https://www.google.com/maps/d/u/0/edit?hl=es-419&mid=1q56ar8U0PJgPoKZ8W3SGXZoQxFC_MI4&ll=19.4857040244002%2C-99.1351102077435&z=16">
  //      <i class="fa fa-dashboard"></i>
//        <span>MAPEO DELIMITADO</span>
//        </a>
//        </li>';
//            }
//            ?>
            
            
    
       <?php 
            if ($_SESSION['Captura_t']==1)
            {
              echo '<li>
        <a href="registro_t.php">
        <i class="fa fa-dashboard"></i>
        <span>REGISTRAR</span>
        </a>
        </li>';
            }
            ?>    
            
  
  
       <?php 
    
            if ($_SESSION['Captura_l']==1)
            {
              echo '<li>
        <a href="registro_l.php">
        <i class="fa fa-dashboard"></i>
        <span>REGISTRAR</span>
        </a>
        </li>';
            }
            ?>    
            


      
            
       <?php 
            if ($_SESSION['Administrador']==1)
            {
              echo '<li>
        <a href="lista_t_admin.php">
        <i class="fa fa-dashboard"></i>
        <span>LISTA DE TERRITORIALES</span>
        </a>
        </li>';
            }
            ?> 
            
              <?php 
            if ($_SESSION['Administrador']==1)
            {
              echo '<li>
        <a href="lista_l_admin.php">
        <i class="fa fa-dashboard"></i>
        <span>LISTA DE LIDERES</span>
        </a>
        </li>';
            }
            ?>      
 
 
            
              
            
            
        <?php    
            if ($_SESSION['Administrador']==1)
            {
              echo '<li>
        <a href="reportes.php">
        <i class="fa fa-area-chart"></i>
        <span>GRAFICÁS</span>
        </a>
        </li>';
            }
            ?>   
      
       
    
        <?php 
            if ($_SESSION['Usuarios']==1)
            {
              echo '<li>
                <a href="usuarios.php">
                <i class="fa fa-users"></i>
                <span>USUARIOS</span>
                </a>
                </li>';
            }
            ?>
                       


</ul>
    
    

</div>
</div>
</section>
<div id="nav-col-submenu"></div>
</div>
<!-- Inicio Wrapper -->
<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<!-- Fin header PHP -->

    <script type='text/javascript'>
	document.oncontextmenu = function(){return false}
</script>


<script type='text/javascript'>
$(function(){
    $(document).bind("contextmenu",function(e){
        return false;
    });
});
</script>