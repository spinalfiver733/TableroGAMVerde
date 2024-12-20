

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEUp3hBvK3NgwozOnGnMFBKhVVETekE94"></script>

<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(100);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php 
        require "../config/Conexion.php";  

                // Fetch the marker info from the database 
                $result = $conexion->query("SELECT id,colonia,lat,lon,icon FROM datos_jefes"); 
                    if($result->num_rows > 0){ 
                                while($row = $result->fetch_assoc()){ 
                                    echo '["'.$row['colonia'].'", '.$row['lat'].', '.$row['lon'].', "'.$row['icon'].'"],'; 
                 } 
             } 
        ?>
    ];
                        
    // Info window content
      


    var infoWindowContent = [

        <?php

        // Fetch the info-window data from the database 
$result2 = $conexion->query("SELECT colonia,ben,hora,id,foto FROM datos_jefes"); 

 if($result2->num_rows > 0){ 
            while($row = $result2->fetch_assoc()){ ?>
                ['<div class="info_content" style="background-color:#BC955C;border-radius:15px;background-image: linear-gradient(45deg,#BC955C, #98989A, #9F2241);text-align:center;">' +
                '<img src="img/logam_jc.jpeg" width="20%">'+
                
                '<h5 style="color:white;">ID: </h5><h4 style="color:white;"><?php echo $row['id']; ?></h4>' +
                
                '<h5 style="color:white;">COLABORADOR: </h5><h4 style="color:white;"><?php echo $row['colonia']; ?></h4>' +
                
                '<h5 style="color:white;">FECHA: </h5><h4 style="color:white;"><?php echo $row['ben']; ?></h4>' + 
                
                
                '<h5 style="color:white;">HORA: </h5><h4 style="color:white;"><?php echo $row['hora']; ?></h4>' +                 
                
                
                '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">'+



              '<div class="carousel-inner">'+
                '<div class="carousel-item active">'+
                  '<img class="d-block w-50" width="100%" src="fotos/<?php echo $row['foto'];?>">'+
                '</div>'+

              '</div>'+


              '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="background-color:gray;">'+
                '<span class="carousel-control-prev-icon" aria-hidden="true"></span>'+
                '<span class="sr-only">Previous</span>'+
              '</a>'+
              '<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="background-color:gray;">'+
                '<span class="carousel-control-next-icon" aria-hidden="true"></span>'+
                '<span class="sr-only">Next</span>'+
              '</a>'+
            '</div>'+

                '</div>'],
        <?php } 
        } 
        ?>
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: markers[i][3],
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(12);
        google.maps.event.removeListener(boundsListener);
    });
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>
