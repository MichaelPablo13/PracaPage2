$(function () {

     function loadMap() {

            //mapoptions for  chico_mendes, remanco_das_aguas, santa_clara and dorothy_stang
            var mapOptions_chico_mendes = {
               center:new google.maps.LatLng(-22.870229, -47.218404), //centered in chico_mendes
               zoom: 16,//zoommed for 16x
               mapTypeId:google.maps.MapTypeId.ROADMAP, //the kind of map chose was the RoadMap
               visibility: true
            };

           var mapOptions_remanco_das_aguas = {
               center:new google.maps.LatLng(-22.872121, -47.196640), //centered in remanco_das_aguas
               zoom: 17,
               mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var mapOptions_santa_clara = {
               center:new google.maps.LatLng(-22.889536, -47.199763), //centered in santa_clara
               zoom: 18,
               mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var mapOptions_dorothy_stang = {
               center:new google.maps.LatLng(-22.896440, -47.169457), //centered in dorothy_stang
               zoom: 19,
               mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            //ID's for each instance in a div
            var map_chico_mendes = new google.maps.Map(document.getElementById("chico_mendes"), mapOptions_chico_mendes);//map_chico_mendes Instance
            var map_remanco_das_aguas = new google.maps.Map(document.getElementById("remanco_das_aguas"), mapOptions_remanco_das_aguas);//map_remanco_das_aguas Instance
            var map_santa_clara = new google.maps.Map(document.getElementById("santa_clara"), mapOptions_santa_clara);//map_santa_clara Instance
            var map_dorothy_stang = new google.maps.Map(document.getElementById("dorothy_stang"), mapOptions_dorothy_stang);//map_dorothy_stang Instance

            //markers for chico_mendes, remanco_das_aguas, santa_clara and dorothy_stang

            var marker_chico_mendes = new google.maps.Marker({
                position: new google.maps.LatLng(-22.870229, -47.218404),
                map: map_chico_mendes,

            });

            var marker_remanco_das_aguas = new google.maps.Marker({
                position: new google.maps.LatLng(-22.872121, -47.196640),
                map: map_remanco_das_aguas,

            });

            var marker_santa_clara = new google.maps.Marker({
                position: new google.maps.LatLng(-22.889536, -47.199763),
                map: map_santa_clara,

            });

            var marker_dorathy_stang = new google.maps.Marker({
                position: new google.maps.LatLng(-22.896440, -47.169457),
                map: map_dorothy_stang,

            });

            google.maps.event.addDomListener(window, 'load', loadMap);// load map with the function loadMap()
            window.document.body.addEventListener('load', loadMap);

         }
});
