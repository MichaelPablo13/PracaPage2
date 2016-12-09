<?php include 'bd/select_plaza.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Hortolandia 4 Plaza</title>
    <meta charset="utf-8" />

    <!-- Scripts -->
    <!-- Placed at the beginning of the document so the pages load properly -->

    <script src="js/form.js"></script>
    <script src="js/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="/js/jquery.min"><\/script>')
    </script>
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap -->
    <script type="text/javascript" src="js/paralllaxJquery.js"></script><!-- parallax -->
    

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_-6LcLmk9EZJkAgP_KB9rrcPp2NPSxcE&callback=loadMap">
    </script>
    
    <!-- Google Maps -->
    <script>
        function loadMap() {
            
            var centerlatlng = new google.maps.LatLng(-22.8533, -47.2147); 

            //mapoptions for  chico_mendes, remanco_das_aguas, santa_clara and dorothy_stang
            var mapOptions_cadastro_praca = {
                center: centerlatlng, //centered in mapOptions_cadastro_praca  
                zoom: 14
                , mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            //ID's for each instance in a div, which each the order of the instances matter! So follow it precisely!// no VAR for global use
            map_cadastro_praca = new google.maps.Map(document.getElementById("cadastro_praca"), 
                        mapOptions_cadastro_praca); //map_cadastro_praca Instance

            /*
            //this variable will have the content for the balloons for record the data
            var html = "<table>" +
                 "<tr><td>Nome:</td> <td><input type='text' id='plaza_name'/> </td> </tr>" +
                 "<tr><td>Endereço:</td> <td><input type='text' id='plaza_address'/></td> </tr>" +
                 "<tr><td></td><td><input type='submit' class='btn btn-success' value='Salvar e Fechar' onclick='saveData()'/></td></tr>";
        */

            var html = "<form method='Post' action='bd/insert_plaza.php'> <table>" +
                "<tr><td>Nome:</td> <td><input type='text' id='plaza_name'/> </td> </tr>" +
                "<tr><td>Endereço:</td> <td><input type='text' id='plaza_address'/></td> </tr>" +
                "<tr><td></td><td><input type='submit' class='btn btn-success' value='Salvar e Fechar' onclick='saveData()'/></td></tr> </table> </form>";

            /*Infowindow*/
            infowindow_cadastro_praca = new google.maps.InfoWindow({
                content: html
            });

            //add listener for the marker positioned in the map based on click and then open the infowindow
            //That's one of the trader secrets
            google.maps.event.addListener(map_cadastro_praca, "click", function(event) {
                marker_cadastro_praca = new google.maps.Marker({
                    position: event.latLng,
                    map: map_cadastro_praca
                });
                google.maps.event.addListener(marker_cadastro_praca, "click", function(){
                    infowindow_cadastro_praca.open(map_cadastro_praca, marker_cadastro_praca);
                });
            });
            
            <?php
               foreach ($plazas as $plaza){

                   $plaza_name = $plaza['plaza_name'];
                   $plaza_address = $plaza['plaza_address'];
                   $latitude = $plaza['latitude'];
                   $longitude = $plaza['longitude'];
                   
                   echo "setmarker('$plaza_name', '$plaza_address', $latitude, $longitude);"; 
                   echo "                   
                   ";
               }
            ?>
   
            google.maps.event.addDomListener(window, 'load', loadMap);
        }
        
        
        /*creates the marker with the info windows setted up*/
        function setmarker(title, address, lat, lon)
        {
            var latlongMarker   = new google.maps.LatLng(lat,lon);
            var marker    =  new google.maps.Marker(
                {
                    position: latlongMarker, 
                    map     : map_cadastro_praca,
                    title   : title
                });
            var infowindow = new google.maps.InfoWindow({
                content: '<b>Nome da Praca: </b>' +title+ '<br><b>Endereco: </b>'+ address +''
            });
            google.maps.event.addListener(marker, "click", function(){
                    infowindow.open(map_cadastro_praca, marker);
                });
        }

        
//        //that's for the buttom save and sending for the page insert_plaza
//      function saveData() {
//            var plaza_name = escape(document.getElementById("plaza_name").value);
//            var plaza_address = escape(document.getElementById("plaza_address").value);
//            var latlng = marker_cadastro_praca.getPosition();
//            var url = "http://localhost/pracasPage/bd/insert_plaza.php?plaza_name=" + plaza_name +
//                "&plaza_address=" + plaza_address +
//                "&latitude=" + latlng.lat() +
//                "&longitude=" + latlng.lng();
//
//          downloadUrl(url, function(data, responseCode) {
//            if (responseCode == 200 && data.length > 1) { //add response XML test
//                /*infowindow.close();*/
//                document.getElementById("message").innerHTML  = "Location added."+url;
//            } else {
//                document.getElementById("message").innerHTML  = "Failed in add the location.";
//            }
//          });
//    }
//
//
//    //Sincerely I couldn't get entirely what happened there
//    function downloadUrl(url, callback) {
//      var request = window.ActiveXObject ?
//          new ActiveXObject('Microsoft.XMLHTTP') :
//          new XMLHttpRequest;
//      request.onreadystatechange = function() {
//        if (request.readyState == 4) {
//          request.onreadystatechange = doNothing;
//          callback(request.responseText, request.status);
//        }
//      };
//      request.open('GET', url, true);
//      request.send(null);
//    }*/

        

     function doNothing() {}   

    </script>

    <!-- Style Sheets -->
    <!-- The image and bootstrap for the framework of the website -->
    <!-- Exception for resolution in maps -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>

<body onload="loadMap()">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">Hortolandia 4 Plaza</a> </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">Sobre</a></li>
                    <li><a href="#contact">Contato</a></li>
                    <li><a href="#cadastra_Praca">Cadastre sua Praça </a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <!--parallax 1 chico_mendes -->
    <section class="bg-1 text-center">
        <br>

        <h1>Hortolandia 4 Plaza</h1>
        <p class="lead">As melhores Praças para se praticar esportes em Hortolandia</p>
    </section>
    <!--/parallax 1-->
    <!-- chico_mendes Description -->
    <!--/row-->
   
        <!--/row-->
    <div class="divider"></div>
        <!--/container-->
        <!--/Maps that is marked by a user-->
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading" id="cadastra_Praca">
                    <h3>Cadastro de Praças - Cadastre a praça do seu bairro</h3> </div>
                <div class="col-md-12 col-md-12">
                    <div class="iframe-container" id="cadastro_praca" > </div>
                </div>
            </div>
        </div>
    </div>
        <!--/container-->
    <div class="divider" id="message"></div>

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                    <div class="panel-heading" id="about">
                        <h3>Sobre</h3> </div>
                    <div class="panel-body">
                        <p>Este Web Page foi criada por Michael Pablo Gomes da Silva para fins somente academicos na Disciplina de Web Design ministrado pelo Professor Andre Bordignon. Este website podera ser encontrado no link do rodape para o GitHub.</p>
                        <p></p>
                    </div>

            </div>
        </div>
    </div>
</div>
    <!--/row-->
    <div class="divider"></div>
    <!-- contaner for contact -->
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading" id="contact">
                        <h3>Gostaria de entrar em contato?</h3>
                    </div>
                    <div class="panel-body">
                        <p>Por favor qualquer duvida, deixe-nos ajuda-lo!</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Contato</h3> </div>
                    <div class="panel-body">
                    <div class="panel-body">
                        <form method="POST" action="email/mail.php">
                              <div class="form-group">
                                <label for="nomePosto">Nome: </label>
                                <input type="text" class="form-control" id="name" title="Preencha o seu Nome" required/>
                              </div>
                              <div class="form-group">
                                <label for="rua">E-mail:</label>
                                <input type="text" class="form-control" id="email" name="rua" required/>
                              </div>
                                <div class="form-group">
                                  <label for="comment">Comentario:</label>
                                  <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>
                              <button type="submit" class="btn btn-success">Enviar</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="divider"></div>
        
    <div id="footer">
        <div class="container">
            <p class="text-muted">This is an academic project and it is a Share alike website feel free to visit: <a href="https://github.com/MichaelPablo13/pracasPage">github.com</a></p>
        </div>
    </div>


</body>
</html>
