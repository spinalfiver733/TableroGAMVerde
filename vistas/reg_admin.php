<!DOCTYPE html>
<html>

<head><meta charset="gb18030">
  
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>REGISTRO DE ADMINISTRADORES</title>

<link rel="stylesheet" type="text/css" href="../public/css/bootstrap/bootstrap.min.css"/>
 
<script src="../public/js/demo-rtl.js"></script>
 
 
<link rel="stylesheet" type="text/css" href="../public/css/libs/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="../public/css/libs/nanoscroller.css"/>
 
<link rel="stylesheet" type="text/css" href="../public/css/compiled/theme_styles.css"/>
 
 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
 
    <link type="image/x-icon" href="img/inquilinet.png" rel="shortcut icon"/>

		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="cssp/bootstrap.min.css">                                      
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="cssp/hero-slider-style.css">                              
    <!-- Hero slider style (https://codyhouse.co/gem/hero-slider/) -->
    <link rel="stylesheet" href="cssp/magnific-popup.css">                                 
    <!-- Magnific popup style (http://dimsemenov.com/plugins/magnific-popup/) -->
    <link rel="stylesheet" href="cssp/tooplate-style.css">                                   
    <!-- Tooplate style -->
      <link rel="shortcut icon" href="img/inquilinet.png" type="image/x-icon" />		
      
      


</head>

    

        
        
<div class="container">
<div class="row">
<div class="col-xs-12">
<div id="login-box">
<div id="login-box-holder">
<div class="row">
<div class="col-xs-12">
<header id="login-header">
<div id="login-logo"><a href="http://inquilinet.com.mx"><img src="img/INQUILINET.gif" width="250px"></a>
</div>
</header>
<div id="login-box-inner">
    
<form id="frmAcceso" method="post" color="black">
    

<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
 <input class="form-control" type="text" id="nombre" name="nombre" placeholder="nombre completo">
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-map-pin" aria-hidden="true"></i></span>
 <input class="form-control" type="text" id="direccion" name="direccion" placeholder="dirección">
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
 <input class="form-control" type="text" id="telefono" name="telefono" placeholder="telefono (10 digitos)">
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-mail"></i></span>
 <input class="form-control" type="text" id="correo" name="correo" placeholder="correo">
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-mail"></i></span>
 <input class="form-control" type="text" id="logina" name="logina" placeholder="usuario">
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-key"></i></span>
<input type="password" class="form-control" id="clavea" name="clavea" placeholder="Password">
</div>
<div class="row">
    <div class="col-xs-12">
    <button type="submit" class="btn btn-success col-xs-12">Registrar</button>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
 
<script src="../public/js/demo-skin-changer.js"></script>  
<script src="../public/js/jquery.js"></script>
<script src="../public/js/bootstrap.js"></script>
<script src="../public/js/jquery.nanoscroller.min.js"></script>
<script src="../public/js/demo.js"></script>  
<script src="../public/js/bootbox.min.js"></script>
<script src="scripts/login.js"></script>

        <!-- Preloader, https://ihatetomatoes.net/create-custom-preloading-screen/ -->
        <div id="loader-wrapper">            
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        
        <!-- load JS files -->
        <script src="jsp/jquery-1.11.3.min.js"></script>         <!-- jQuery (https://jquery.com/download/) -->
        <script src="jsp/tether.min.js"></script>                <!-- http://tether.io/ -->
        <script src="jsp/isInViewport.min.js"></script>          <!-- isInViewport js (https://github.com/zeusdeux/isInViewport) -->
        <script src="jsp/bootstrap.min.js"></script>             <!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
        <script src="jsp/hero-slider-main.js"></script>          <!-- Hero slider (https://codyhouse.co/gem/hero-slider/) -->
        <script src="jsp/jquery.magnific-popup.min.js"></script> <!-- Magnific popup (http://dimsemenov.com/plugins/magnific-popup/) -->
        
        
        <script>

            function adjustHeightOfPage(pageNo) {

                var offset = 80;
                var pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height();

                if($(window).width() >= 992) { offset = 120; }
                else if($(window).width() < 480) { offset = 40; }
               
                // Get the page height
                var totalPageHeight = 335 + $('.cd-slider-nav').height()
                                        + pageContentHeight + offset
                                        + $('.tm-footer').height();

                // Adjust layout based on page height and window height
                if(totalPageHeight > $(window).height()) 
                {
                    $('.cd-hero-slider').addClass('small-screen');
                    $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
                }
                else 
                {
                    $('.cd-hero-slider').removeClass('small-screen');
                    $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
                }
            }

            function uploadVideo() {

                var videoWrapper = $('.cd-bg-video-wrapper');
                if( videoWrapper.is(':visible') ) {
                    // if visible - we are not on a mobile device 
                    var videoUrl = videoWrapper.data('video'),
                        
                    video = $('<video autoplay loop><source src="'+videoUrl+'.mp4" type="video/mp4" /></video>');
                    video.appendTo(videoWrapper);

                    // play video if first slide
                    if(videoWrapper.parent('.cd-bg-video.selected').length > 0) video.get(0).play();                 
                }
            }

            // Everything is loaded including images.            
            $(window).load(function(){

                adjustHeightOfPage(1); // Adjust page height

                // Background Video
                if($( window ).width() > 800) {
                    uploadVideo();
                }

                /* Gallery One pop up
                -----------------------------------------*/
                $('.gallery-first').magnificPopup({
                    delegate: 'a', // child items selector, by clicking on it popup will open
                    type: 'image',
                    gallery:{enabled:true}                
                });

                /* Gallery Two pop up
                -----------------------------------------*/
                $('.gallery-second').magnificPopup({
                    delegate: 'a', // child items selector, by clicking on it popup will open
                    type: 'image',
                    gallery:{enabled:true}                
                });
				
                /* Collapse menu after click 
                -----------------------------------------*/
                $('#tmNavbar a').click(function(){
                    $('#tmNavbar').collapse('hide');

                    adjustHeightOfPage($(this).data("no")); // Adjust page height       
                });

                /* Browser resized 
                -----------------------------------------*/
                $( window ).resize(function() {
                    var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");
                    
                    // wait 3 seconds
                    setTimeout(function() {
                        adjustHeightOfPage( currentPageNo );
                    }, 3000);

                    if($( window ).width() > 800) {
                       uploadVideo();
                    }
                    
                });

                // Play video only when visible
                // https://stackoverflow.com/questions/21163756/html5-and-javascript-to-play-videos-only-when-visible
                $('video').each(function(){
                    if ($(this).is(":in-viewport")) {
                        $(this)[0].play();
                    } else {
                        $(this)[0].pause();
                    }
                })
        
                // Remove preloader (https://ihatetomatoes.net/create-custom-preloading-screen/)
                $('body').addClass('loaded');
                $('.tm-current-year').text(new Date().getFullYear());
                           
            });

        </script>          
 
</body>

</html>