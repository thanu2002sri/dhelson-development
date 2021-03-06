@extends('layouts.app')
@section('styles')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/order-tracking.css') }}">
    <style>
         /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map_canvas {
            height: 280px;     
           
        }
        .border-white {
            border: 15px solid white;
        }
        .background-white{
            background-color: white
        }
        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
            
        }
        

    </style>
@endsection
@section('content')
<!-- Page content -->
    <div id="page-content">
            <!-- First Row -->
            <div class="row">
                <!-- Simple Stats Widgets -->
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('/agent/#') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-danger">
                                <i class="fa fa-shopping-cart text-light-op"></i>
                            </div>
                            <h2 class="widget-heading h3 text-danger">
                            <strong><span data-toggle="counter" data-to="3"></span></strong>
                            </h2>
                            <span class="text-muted">PENDING ORDERS</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('agent/#') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-success">
                                <i class="fa fa-shopping-cart text-light-op"></i>
                            </div>
                            <h2 class="widget-heading h3 text-success">
                                <strong><span data-toggle="counter" data-to="8"></span></strong>
                            </h2>
                            <span class="text-muted">ORDER COMPLETE</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('/agent/#') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-default">
                                <i class="fas fa-truck text-light-op"></i>
                            </div>
                            <h2 class="widget-heading h3">
                                <strong><span data-toggle="counter" data-to="5"></span></strong>
                            </h2>
                            <span class="text-muted">TRANSIT REQUEST</span>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('agent/#') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-warning">
                                <i class="fas fa-truck text-light-op"></i>
                            </div>
                            <h2 class="widget-heading h3 text-success">
                                <strong><span data-toggle="counter" data-to="4"></span></strong>
                            </h2>
                            <span class="text-muted">IN TRANSIT</span>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ url('agent/#') }}" class="widget">
                        <div class="widget-content widget-content-mini text-right clearfix">
                            <div class="widget-icon pull-left themed-background-success">
                                <i class="fas fa-truck text-light-op"></i>
                            </div>
                            <h2 class="widget-heading h3 text-success">
                                <strong><span data-toggle="counter" data-to="6"></span></strong>
                            </h2>
                            <span class="text-muted">TRANSIT DELIVERED</span>
                        </div>
                    </a>
                    
                </div>
                <!-- END Simple Stats Widgets -->
            </div>
            <br>
            <div class="background-white">
            <div class="row">
                {{-- <div class="col-sm-12">
                    <div class="col-sm-8">
                        
                    </div>
                    <div class="col-sm-4">
                        <h3 style="font-size:15px;" class="pull-right">Today:&nbsp;<span style="color:red !important;text-transform: uppercase;"> {{ date('dM/Y h:i:s') }}</span></h3>
                    </div>
                    
                </div>
                <hr>
                <br> --}}
                
                <div class="col-sm-12">
                    <br>
                    <h3 class="text-center">Live Vehicle Tracking <span></span>...........<i class="fas fa-truck text-light-op" style="color:yellowgreen !important;" aria-hidden="true"></i></h3>
                    <hr>
                    <div class="border-white">
                        {{-- <div id="map"></div> --}}
                        <div id="map_canvas"></div>
                    </div>
                </div>
            </div>
            </div>
            <!-- END First Row -->
        </div>
        <!-- Page content -->
@endsection


@section('scripts')
{{-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&sensor=false"></script> --}}
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&sensor=false&libraries=geometry"></script>

    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&libraries=places&callback=initAutocomplete"
async defer></script>    --}}
<script>
    var map, marker;
var startPos = [16.525144, 80.611482];
var speed = 50; // km/h

var delay = 100;
    function animateMarker(marker, coords, km_h)
    {
        var target = 0;
        var km_h = km_h || 50;
        coords.push([startPos[0], startPos[1]]);
        
        function goToPoint()
        {
            var lat = marker.position.lat();
            var lng = marker.position.lng();
            var step = (km_h * 1000 * delay) / 3600000; // in meters
            
            var dest = new google.maps.LatLng(
            coords[target][0], coords[target][1]);                                 
            
            var distance =
            google.maps.geometry.spherical.computeDistanceBetween(
            dest, marker.position); // in meters
            
            var numStep = distance / step;
            var i = 0;
            var deltaLat = (coords[target][0] - lat) / numStep;
            var deltaLng = (coords[target][1] - lng) / numStep;
            
            function moveMarker()
            {
                lat += deltaLat;
                lng += deltaLng;
                i += step;
                
                if (i < distance)
                {
                    marker.setPosition(new google.maps.LatLng(lat, lng));
                    setTimeout(moveMarker, delay);
                }
                else
                {   marker.setPosition(dest);
                    target++;
                    if (target == coords.length){ target = 0; }
                    
                    setTimeout(goToPoint, delay);
                }
            }
            moveMarker();
        }
        goToPoint();
    }

function initialize()
{
    var myOptions = {
        zoom: 15,
        center: new google.maps.LatLng(16.525144, 80.611482),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(startPos[0], startPos[1]),
        map: map,
        strokeColor: "#FF0000",
        strokeOpacity: 1,
        strokeWeight: 2
    });
    
    google.maps.event.addListenerOnce(map, 'idle', function()
    {
        animateMarker(marker, [
            // The coordinates of each point you want the marker to go to.
            // You don't need to specify the starting position again.
            [16.525144, 80.611482],
            [16.525684, 80.611392],
            [16.526373, 80.611247],
            [16.527252, 80.611140],
            [16.528044, 80.611172],
            [16.529160, 80.611548],
            [16.530081, 80.612090],
            [16.530821, 80.612734],
            [16.531654, 80.613228],
            [16.531901, 80.614044]
        ], speed);
      
    });
}
initialize();

</script>


@endsection

