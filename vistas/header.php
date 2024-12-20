
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
    /* Estilos base del header y contenedores */
    #header-navbar {
        background-color: #B7E4C7 !important;
        background-image: none !important;
    }
    
    #page-wrapper {
        background-color: #B7E4C7 !important;
        background-image: none !important;
    }
    
    #nav-col {
        background-color: #B7E4C7 !important;
        background-image: none !important;
    }
    
    .nav-stacked {
        background-color: #B7E4C7 !important;
        background-image: none !important;
    }
    
    /* Override de imágenes de fondo */
    [style*="background-image: url('img/cinto.png')"],
    [style*="background-image: url('img/patron_ch.png')"] {
        background-color: #B7E4C7 !important;
        background-image: none !important;
    }

    /* Estilos del menú pequeño */
    #make-small-nav {
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #make-small-nav .fa-bars {
        color: #194230;
        font-size: 24px;
        font-weight: 900;
    }

    #make-small-nav:hover .fa-bars {
        opacity: 0.8;
    }

    /* Contenedor para menú y bienvenida en móvil */
    .mobile-header {
        padding: 10px 15px;
        background-color: #B7E4C7;
    }

    .menu-welcome-container {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    /* Botón de navegación responsive */
    .navbar-toggle {
        padding: 8px;
        margin: 0;
        background: transparent;
        border: none;
    }

    .navbar-toggle .fa-bars {
        color: #194230;
        font-size: 24px;
        font-weight: 900;
    }

    .navbar-toggle:hover,
    .navbar-toggle:focus,
    .navbar-toggle:active {
        background-color: transparent !important;
        opacity: 0.8;
    }

    /* Estilos para el texto de bienvenida en desktop */
    .welcome-text {
        padding: 8px 15px;
        line-height: 1.2;
    }

    .welcome-text .bienvenido {
        color: #194230;
        font-size: 14px;
        display: block;
    }

    .welcome-text .user-name {
        color: #194230;
        font-size: 16px;
        font-weight: 500;
    }

    /* Texto de bienvenida en móvil */
    .welcome-text-mobile {
        display: flex;
        flex-direction: column;
    }

    .welcome-text-mobile .bienvenido {
        color: #194230;
        font-size: 14px;
        line-height: 1;
    }

    .welcome-text-mobile .user-name {
        color: #194230;
        font-size: 16px;
        font-weight: 500;
        line-height: 1.2;
    }

    /* Ajustes para alinear el texto con el ícono */
    .nav-no-collapse .navbar-nav {
        display: flex;
        align-items: center;
    }

    /* Media queries para ajustes responsive */
    @media (max-width: 768px) {
        .menu-welcome-container {
            width: 100%;
        }
        
        .mobile-header {
            width: 100%;
        }
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
  <!---  
<div class="col-md-12">
    <img src="../vistas/img/logam_jc_sf.png" width="15%">
</div>
--->
</div> 

<div class="clearfix">
    <!-- Contenedor para móviles -->
    <div class="mobile-header visible-xs visible-sm">
        <div class="menu-welcome-container">
            <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <div class="welcome-text-mobile">
                <span class="bienvenido"><strong>Bienvenido</strong></span>
                <span class="user-name">¡Hola, <?php echo $_SESSION['nombre']; ?>!</span>
            </div>
        </div>
    </div>

    <!-- Contenedor para desktop (sin cambios) -->
    <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs"> 
        <ul class="nav navbar-nav">
            <li>
                <a class="btn" id="make-small-nav">
                    <i class="fa fa-bars"></i>
                </a> 
            </li>
            <li class="welcome-text">
                <span class="bienvenido">bienvenido</span>
                <span class="user-name">¡Hola, <?php echo $_SESSION['nombre']; ?>!</span>
            </li>
        </ul>
    </div>
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