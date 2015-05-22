<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Simple Google Map</title>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
        // Google Map Maker script v.4
        // (c) 2014 Richard Stephenson
        // http://mapmaker.donkeymagic.co.uk
        var map
        openInfowindow = null
        newPoints = [];

        function initialize () {
            var mapOptions = {
                center: new google.maps.LatLng(13.791814952438731, 100.6320699959473),
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                streetViewControl: false
            };
            map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
            addPoints();
        }

        function addPoints () {
            newPoints[0] = [13.781978731601765, 100.61164229208987, 'Project', 'Project'];
            for (var i = 0; i < newPoints.length; i++) {
                var position = new google.maps.LatLng(newPoints[i][0], newPoints[i][1]);
                var marker = new google.maps.Marker({
                    position: position,
                    map: map
                });
                createMarker(marker, i);
            }
        }

        function createMarker (marker, i) {
            var infowindow = new google.maps.InfoWindow({
                content: '<div class="popup">' + newPoints[i][3] + '</div>'
            });
            google.maps.event.addListener(marker, 'click', function () {
                if (openInfowindow) {
                    openInfowindow.close();
                }
                infowindow.open(marker.getMap('map_canvas'), marker);
                openInfowindow = infowindow;
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <style>
        * {
            margin: 0;
            padding: 0;
        }
        div.popup {
            font-size: 14px;
            margin: 0;
            width: 270px;
        }
        div.popup p {
            background-color: #FFF;
            color: #333;
            font-size: 12px;
            line-height: 15px;
        }
        div.popup p a {
            color: #1122CC;
        }
    </style>

</head>

<body>
<div id="map_canvas" style="width:800px; height:500px"></div>
</body>

</html>





