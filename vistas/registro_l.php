<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['Captura_l']==1)
{
    require_once "../config/Conexion.php";
    date_default_timezone_set('America/Mazatlan');
    $fecha_actual = date("d-m-Y");
    $hora_actual = date("h:i:s");
    $user = $_SESSION["nombre"];
    
    // Obtener IP
    if(getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');        
    } elseif (getenv('HTTP_FORWARDED_FOR')) {
        $ip = getenv('HTTP_FORWARDED_FOR');        
    } elseif (getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');        
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    $meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
    
    /* Estilos del header */
    .form-container {
        background-color: #41916C;
        background-size: cover;
        padding: 20px;
        min-height: 100vh;
        margin-bottom: 120px;
        border-radius: 15px;    
        font-family: 'Open Sans',sans-serif; /* Aplica la fuente */
        font-weight: 700; 
        font-stretch: expanded; 
    }

    .form-select option:hover,
    .form-select option:focus,
    .form-select option:active,
    .form-select option:checked {
        background-color: #41916C !important;
        color: white !important;
    }

    /* Aseguramos que el select tenga un estilo consistente */
    .form-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        cursor: pointer;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: white;
    }

    .form-select option {
        background-color: white;
        color: black;
        padding: 10px;
    }

    .form-select option:hover,
    .form-select option:focus,
    .form-select option:active {
        background-color: #41916C !important;
        color: white !important;
    }


    .form-select option:checked {
        background-color: #41916C !important;
        color: white !important;
    }
    .form-content {
        background-color: white;
        border-radius: 15px;
        padding: 20px;
        max-width: 800px;
        margin: 0 auto;
    }
    .header-container {
        background-color: #fff;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .header-title {
        color: #143E2C !important; 
        text-align: center;
        margin: 0;
        font-size: 30px;
        font-family:'Open Sans',sans-serif;
    }

    .header-subtitle {
        color: #143E2C !important;
        text-align: center;
        margin: 5px 0 0;
        letter-spacing: 1px;
        font-family:'Open Sans',sans-serif;
    }

    /* Estilos de los campos */
    .form-field-green {
        margin-bottom: 10px;
        background-color: #1A4331;
        padding: 15px;
        border-radius: 8px;
    }

    .evidence-container {
        display: flex;
        align-items: center;
        height: 100%;
        padding: 0;
    }

    .form-field-white{
        margin-bottom: 10px;
        background-color: #ffffff;
        padding: 15px;
        border-radius: 8px;
    }
    .form-field {
        margin-bottom: 10px;
        background-color: #95D5B2;
        padding: 15px;
        border-radius: 8px;
    }

    .form-label-dark{
        color: #143E2C;
        display: block;
        margin-bottom: 8px;
        font-weight: normal;
        letter-spacing: 3px;
        font-size: 20px;
    }

    .form-label4-white{
        color: #ffffff;
        display: block;
        margin-bottom: 8px;
        font-weight: normal;
        letter-spacing: 3px;
        font-size: 20px;
    }

    .upload-text {
        color: #ffffff;
        font-weight: normal;
        letter-spacing: 3px;
        font-size: 16px;
        font-family: 'Open Sans',sans-serif;
        margin-right: 10px; /* Espacio entre texto e ícono */
        white-space: nowrap; /* Evita que el texto se rompa */
    }

    .form-select, .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .upload-container {
        width: 100%;
        height: 100%;
    }

    .upload-button {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 100%;
        width: 100%;
        padding: 8px 15px;
        cursor: pointer;
        box-sizing: border-box;
    }

    .upload-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 15px;
    }



    .plus-container {
        background-color: white;
        min-width: 45px;  
        height: 45px; 
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .cruz-img {
        height: 25px;  
        width: 25px; 
    }

    .two-columns {
        display: flex;
        flex-direction: row;
        gap: 10px;
        width: 100%;
    }

    .two-columns > div {
        flex: 1;
        min-width: 0; /* Evita que los elementos se desborden */
    }

    .beneficiarios-input{
        background-color: #ffffff; /* Cambia el color de fondo */
        border-radius: 4px; /* Opcional: bordes redondeados */
        color: #000000; /* Color del texto */
        font-size: 16px; /* Tamaño de fuente */
    }

    /* Estilos del botón 
    .action-button {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        max-width: 500px;
        padding: 15px;
        background-color: #9F2241;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }*/

    /* Responsive */
    @media (min-width: 768px) {
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .two-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
    }

    /* Ajustes móviles */
    @media (max-width: 480px) {
        .form-field-green {
            padding: 10px;
        }

        .two-columns > div:first-child {
            flex: 0.4;
        }
        
        .two-columns > div:last-child {
            flex: 0.6;
        }

        .upload-text {
            font-size: 14px;
            white-space: normal;
            line-height: 1.2;
        }
    }
</style>

<body onload="mueveReloj()">
<div class="header-container">
    <h1 class="header-title"><strong>ESTRUCTURA GAM</strong></h1>
    <h4><strong><p class="header-subtitle">CAPTURA TABLERO DE CONTROL 2025</p></strong></h2>
</div>
<div class="form-container">
    <form action="cargar_l.php" method="POST" enctype="multipart/form-data">
        <!-- Inputs hidden -->
        <?php
            $sql_fetch_user = "SELECT nombre FROM usuarios where nombre = '$user'";
            $query_user = mysqli_query($conexion, $sql_fetch_user);
            foreach ($query_user as $opciones_user) {
        ?>
        <input type="text" name="nombre" value="<?php echo $opciones_user['nombre'];?>" hidden>
        <input type="text" name="icon" value="http://www.intranet.gamadero.cdmx.gob.mx/public/src/images/jc_icon.jpeg" hidden> 
        <input id="lat" name="lat"  value="<?php echo $meta['geoplugin_latitude']; ?>" hidden>
        <input id="lon" name="lon"  value="<?php echo $meta['geoplugin_longitude']; ?>" hidden>
        <?php } ?>

        <div class="form-field-green">
            <label class="form-label4-white"><strong>Tipo de actividad</strong></label>
            <select name="act" class="form-select">
                <option value="">SELECCIONE UNA OPCIÓN</option>
                <option value="APOYO">ASAMBLEA</option>
                <option value="PROGRAMA" style="color:black;">PROGRAMA</option>
                <option value="SERVICIO" style="color:black;">SERVICIO</option>
                <option value="ATENCION" style="color:black;">ATENCION</option>
            </select>
        </div>

        <div class="form-field">
            <label class="form-label-dark"><strong>Tema</strong></label>
            <select name="tema" class="form-select">
                <option value="">SELECCIONE UNA OPCIÓN</option>
                <option value="ALIMENTICIO">SEGURIDAD</option>
                <option value="GRUPO" style="color:black;">PROCOMUR</option>
                <option value="VIVIENDA" style="color:black;">BACHEO</option>
                <option value="ADQUISICION" style="color:black;">ALUMBRADO</option>
            </select>
        </div>

        <div class="form-field-green">
            <label class="form-label4-white"><strong>Territorial y colonia</strong></label>
            <select name="colonia"  class="form-select">
                <option value="">SELECCIONE UNA OPCIÓN</option>
                <?php  
                        $sql_fetch_todos_problemas = "SELECT * FROM unidades_t";
                        $query_problemas = mysqli_query($conexion, $sql_fetch_todos_problemas);
                    foreach ($query_problemas as $opciones_problemas): 

                ?>                                

        <option value="<?php echo $opciones_problemas ['colonia']?>" style="color:black;"><?php echo $opciones_problemas ['cveut']?> <?php echo $opciones_problemas ['colonia']?></option>

                <?php endforeach ?>
        </select>
        </div>

        <div class="form-field">
            <label class="form-label-dark"><strong>Beneficiarios</strong></label>
            <input type="number" name="ben" class="form-control beneficiarios-input">
        </div>

        <div class="two-columns">
            <div class="form-field-green">
                <label class="form-label4-white"><strong>Monto</strong></label>
                <input type="number" name="monto" class="form-control">
            </div>

            <div class="form-field-green evidence-container">
                <div class="upload-container">
                    <label class="upload-button">
                        <span class="upload-text">SUBIR EVIDENCIA</span>
                        <div class="plus-container"><img src="img/cruz2.svg" class="cruz-img"alt=""></div>
                        <input type="file" name="foto" style="display: none;">
                    </label>
                </div>
            </div>
        </div>

        <!---
        <button type="submit" class="action-button">
            <i class="fa fa-ticket"></i> CARGAR EVIDENCIA
        </button>
            --->
    </form>
</div>
</body>

<?php
    }
    else
    {
        require 'noacceso.php';
    }
    require 'footer.php';
?>
<script type="text/javascript" src="scripts/clientes.js"></script>
<?php 
}
ob_end_flush();
?>

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