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
                    <input type="text" name="latandlon" id="latandlon">
                    <button class="btn btn-primary" id="test">Test</button>
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
        <input type="hidden" name="lati" id="lati" class="lati" value="<?php echo $start_pins->latitude; ?>">
        <input type="hidden" name="long" id="long" class="long" value="<?php echo $start_pins->longtitude; ?>">
@endsection


@section('scripts')
{{-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&sensor=false"></script> --}}
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&sensor=false&libraries=geometry"></script>

    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&libraries=places&callback=initAutocomplete"
async defer></script>    --}}
{{-- 
<script type="text/javascript">
    var myCenter =  new google.maps.LatLng(11.279432, 76.239785);
    var marker;
    var map;
    var mapProp;

    function initialize()
    {
        mapProp = {
          center:myCenter,
          zoom:15,
          mapTypeId:google.maps.MapTypeId.ROADMAP
          };
        setInterval('mark()',5000);
    }

    function mark()
    {
        map=new google.maps.Map(document.getElementById("map"),mapProp);
        var file = "{{ asset('co-ordinates/2020-08-16.txt') }}";
        $.get(file, function(txt) { 
            var lines = txt.split("\n");
            for (var i=0;i<lines.length;i++){
                console.log(lines[i]);
                var words=lines[i].split(",");
                if ((words[0]!="")&&(words[1]!=""))
                {
                    marker=new google.maps.Marker({
                          position:new google.maps.LatLng(words[0],words[1]),
                          //map: map
                    });
                    marker.setMap(map);
                    map.setCenter(new google.maps.LatLng(words[0],words[1]));
                    document.getElementById('sat').innerHTML=words[3];
                    document.getElementById('speed').innerHTML=words[4];
                    document.getElementById('course').innerHTML=words[5];
                }
            }
            marker.setAnimation(google.maps.Animation.BOUNCE);
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);

    
</script> --}}

<script>
var map, marker;
//var startPos = [$('.lati').val()+','+$('.long').val()];
//alert(startPos);
function initialize()
{
    marker = [];
    var 
    myOptions = {
        zoom: 15,
        center: {lat: +$('.lati').val(), lng: +$('.long').val()},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    marker = new google.maps.Marker({
        position: new google.maps.LatLng($('.lati').val(), $('.long').val()),
        map: map,
        center: {lat: +$('.lati').val(), lng: +$('.long').val()},
        strokeColor: "#FF0000",
        strokeOpacity: 1,
        strokeWeight: 2
    });
    fetch_markers();
    //window.setInterval(fetch_markers, 10*1000);
}

function fetch_markers() {
    $.getJSON("{{ url('/agent/get-latitude') }}", {}, function(res) {
        if (res.locations) add_new_markers(res.locations);
    });
}

function add_new_markers(locations) {
    locations.forEach(function(loc, i) {
        $('#lati').val(loc.latitude);
        $('#long').val(loc.longitude);
    });
}
window.setInterval(initialize, 10*1000);
</script>


@endsection

