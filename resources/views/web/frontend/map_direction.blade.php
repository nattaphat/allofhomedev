@extends('layouts.tag_list')

@section('jshome')
    <style type="text/css">
        .boxArticle h2{
            background:none;
            height:46px;
            text-indent:0;
            margin-bottom:0px;
            color: #5cc5c1;
            display: block;
            padding-right: 20px;
            float: left;
        }
        .boxArticle h2.lineColor {
            display: inline;
            width: 726px;
            padding-right: 0px;
            margin-top: 23px;
            background-color: #5cc5c1;
            height: 6px;
        }
        .lineDescription
        {
            position: relative;
            top: -15px;
        }
    </style>
@stop

@section('jsbody')

    <script src="http://maps.google.se/maps/api/js?sensor=false&amp;language=th-TH"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            var directionsService = new google.maps.DirectionsService(),
                    directionsDisplay = new google.maps.DirectionsRenderer(),
                    createMap = function (start) {
                        var travel = {
                                    origin : (start.coords)? new google.maps.LatLng(start.lat, start.lng) : start.address,
                                    destination : "{{ $lat }}, {{ $long }}",
                                    travelMode : google.maps.DirectionsTravelMode.DRIVING
                                    // Exchanging DRIVING to WALKING above can prove quite amusing :-)
                                },
                                mapOptions = {
                                    zoom: 10,
                                    // Default view: downtown Stockholm
                                    center : new google.maps.LatLng(59.3325215, 18.0643818),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };

                        map = new google.maps.Map(document.getElementById("map"), mapOptions);
                        directionsDisplay.setMap(map);
                        directionsDisplay.setPanel(document.getElementById("map-directions"));
                        directionsService.route(travel, function(result, status) {
                            if (status === google.maps.DirectionsStatus.OK) {
                                directionsDisplay.setDirections(result);
                            }
                        });
                    };

            // Check for geolocation support
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                            // Success!
                            createMap({
                                coords : true,
                                lat : position.coords.latitude,
                                lng : position.coords.longitude
                            });
                        },
                        function () {
                            // Gelocation fallback: Defaults to Stockholm, Sweden
                            createMap({
                                coords : false,
                                address : "Sveavägen, Stockholm"
                            });
                        }
                );
            }
            else {
                // No geolocation fallback: Defaults to Lisbon, Portugal
                createMap({
                    coords : false,
                    address : "Lisbon, Portugal"
                });
            }
        });
    </script>


@stop

@section('content')

    <!-- Article -->
    <div class="boxArticle">
        <h2>แผนที่เส้นทาง</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">แสดงเส้นทางไปยังร้านค้า</span>

        <div id="map-container">
            <div id="map" style="height: 450px;"></div>
            <div id="map-directions"></div>
        </div>

    </div>

@stop