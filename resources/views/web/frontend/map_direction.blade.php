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

            alert(navigator.platform);

            var directionsService = new google.maps.DirectionsService(),
                    directionsDisplay = new google.maps.DirectionsRenderer(),
                    createMap = function (start) {
                        debugger;
                        var travel = {
                                    origin : (start.coords)? new google.maps.LatLng(start.lat, start.lng) : start.address,
                                    destination : "{{ $lat }}, {{ $long }}",
                                    travelMode : google.maps.DirectionsTravelMode.DRIVING
                                    // Exchanging DRIVING to WALKING above can prove quite amusing :-)
                                },
                                mapOptions = {
                                    zoom: 10,
                                    // Default view: downtown Stockholm
                                    center : (start.coords)? new google.maps.LatLng(start.lat, start.lng) : start.address,
//                                    center : new google.maps.LatLng(59.3325215, 18.0643818),
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

            function navigate(lat, lng) {
                // If it's an iPhone..
                if ((navigator.platform.indexOf("iPhone") !== -1) || (navigator.platform.indexOf("iPod") !== -1)) {
                    function iOSversion() {
                        if (/iP(hone|od|ad)/.test(navigator.platform)) {
                            // supports iOS 2.0 and later: <http://bit.ly/TJjs1V>
                            var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/);
                            return [parseInt(v[1], 10), parseInt(v[2], 10), parseInt(v[3] || 0, 10)];
                        }
                    }
                    var ver = iOSversion() || [0];

                    if (ver[0] >= 6) {
                        protocol = 'maps://';
                    } else {
                        protocol = 'http://';

                    }
                    window.location = protocol + 'maps.apple.com/maps?daddr=' + lat + ',' + lng + '&amp;ll=';
                }
                else {
                    window.open('http://maps.google.com?daddr=' + lat + ',' + lng + '&amp;ll=');
                }
            }

            if ((navigator.platform.indexOf("iPhone") !== -1) || (navigator.platform.indexOf("iPod") !== -1)) {
                function iOSversion() {
                    if (/iP(hone|od|ad)/.test(navigator.platform)) {
                        // supports iOS 2.0 and later: <http://bit.ly/TJjs1V>
                        var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/);
                        return [parseInt(v[1], 10), parseInt(v[2], 10), parseInt(v[3] || 0, 10)];
                    }
                }
                var ver = iOSversion() || [0];

                if (ver[0] >= 6) {
                    protocol = 'maps://';
                } else {
                    protocol = 'http://';

                }
                window.location = protocol + 'maps.apple.com/maps?daddr=' + {{ $lat }} + ',' + {{ $long }} + '&amp;ll=';
            }
            else {
//                window.open('http://maps.google.com?daddr=' + lat + ',' + lng + '&amp;ll=');

                // Check for geolocation support
                if (navigator.geolocation) {
                    debugger;
                    navigator.geolocation.getCurrentPosition(function (position) {
                                debugger;
                                // Success!
                                createMap({
                                    coords : true,
                                    lat : position.coords.latitude,
                                    lng : position.coords.longitude
                                });
                            },
                            function () {
                                debugger;
                                // Gelocation fallback: Defaults to Stockholm, Sweden
                                createMap({
//                                coords : false,
//                                address : "Sveavägen, Stockholm"
                                    coords : true,
                                    lat : "13.7650101",
                                    lng : "100.5382141"
                                });
                            }
                    );
                }
                else {
                    debugger;
                    // No geolocation fallback: Defaults to Lisbon, Portugal
                    createMap({
//                    coords : false,
//                    address : "Lisbon, Portugal"
                        coords : true,
                        lat : "13.7650101",
                        lng : "100.5382141"
                    });
                }
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

        {{--<div id="map-container">--}}
            {{--<div id="map" style="height: 450px;"></div>--}}
            {{--<div id="map-directions"></div>--}}
        {{--</div>--}}

    </div>

    <div class="boxMap">
        <div class="map-google">
            <div id="map-container">
                <div id="map" style="height: 450px;"></div>
                <div id="map-directions"></div>
            </div>
        </div>
    </div>

@stop