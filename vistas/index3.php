<?php 
require_once "../config/Conexion.php";
$result = $conexion->query('SELECT COUNT(*) as total_products FROM registros_material');
$row = $result->fetch_assoc();
$num_total_rows = $row['total_products'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Paginación de resultados con PHP."/>
<meta name="author" content="Jose Aguilar">
<link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">

    
    <div class="row">
        <div id="content" class="col-lg-12">
<?php
if ($num_total_rows > 0) {
    $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
    }
    //calculo el total de paginas
    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

    //pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
    echo '<h3>Numero de articulos: '.$num_total_rows.'</h3>';
    echo '<h3>En cada pagina se muestra '.NUM_ITEMS_BY_PAGE.' articulos ordenados por fecha en formato descendente.</h3>';
    echo '<h3>Mostrando la pagina '.$page.' de ' .$total_pages.' paginas.</h3>';

    $result = $conexion->query(
        'SELECT * FROM registros_material p 
        LEFT JOIN sericio pl ON (pl.id = p.id AND pl.id_lang = 1) 
        LEFT JOIN `image` i ON (i.id = p.id AND cover = 1) 
        ORDER BY id DESC LIMIT '.$start.', '.NUM_ITEMS_BY_PAGE
    );
    if ($result->num_rows > 0) {
        echo '<ul class="row items">';
        while ($row = $result->fetch_assoc()) {
            echo '<li class="col-lg-4">';
            echo '<div class="item">';
            echo '<img class="img-fluid mx-auto d-block" src="https://www.jose-aguilar.com/modulos-prestashop/'.$row['id_image'].'-home_default/'.$row['link_rewrite'].'.jpg" width="100" height="100" />';
            echo '<h3>'.utf8_encode($row['name']).'</h3>';
            echo '<p class="description_short">'.strip_tags(utf8_encode($row['description_short'])).'</p>';
            echo '<p class="price">'.round($row['price'], 2).' EUR</p>';
            echo '<p><a class="btn btn-primary link_rewrite mx-auto d-block" href="https://www.jose-aguilar.com/modulos-prestashop/es/'.$row['id_product'].'-'.$row['link_rewrite'].'.html" target="_blank"><i class="fa fa-eye"></i> Ver</a></p>';
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
    }

    echo '<nav>';
    echo '<ul class="pagination">';

    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
            }
        }

        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }
    echo '</ul>';
    echo '</nav>';
}
?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Bloque de anuncios adaptable -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-6676636635558550"
                 data-ad-slot="8523024962"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
    



    
</div>

</body>
</html>
