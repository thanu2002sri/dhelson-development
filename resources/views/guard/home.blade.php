@extends('layouts.app')
@section('styles')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/order-tracking.css') }}">
    <style>
         /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map {
            height: 230px;     
           
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
                    <a href="{{ url('/guard/#') }}" class="widget">
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
                    <a href="{{ url('guard/#') }}" class="widget">
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
                    <a href="{{ url('/guard/#') }}" class="widget">
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
                    <a href="{{ url('guard/#') }}" class="widget">
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
                    <a href="{{ url('guard/#') }}" class="widget">
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
                <div class="col-sm-6">
                    <br>
                    <h3 class="text-center">Live Vehicle Tracking <span></span>...........<i class="fas fa-truck text-light-op" style="color:yellowgreen !important;" aria-hidden="true"></i></h3>
                    <hr>
                    <div class="border-white">
                        <div id="map"></div>
                    </div>
                </div>
                <div class="col-sm-6" style="border-left: 2px solid #e4e4e491;">
                    <br>
                    <h3 class="text-center">Live Location Tracking <span></span>...........<i class="fa fa-map-marker text-light-op" style="color:yellowgreen !important;" aria-hidden="true"></i></h3>
                    <hr>
                    <div class="border-white">
                        <ol class="progtrckr" data-progtrckr-steps="3">
                        <li class="progtrckr-done"><span class="span">Tooltip text</span></li><!--
                        --><li class="progtrckr-done"><span class="span">Tooltip text</span></li><!--
                        --><li class="progtrckr-done"><span class="span">Tooltip text</span></li>
                        </ol>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <!-- END First Row -->
        </div>
        <!-- Page content -->
      
@endsection
@section('scripts')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&libraries=places&callback=initAutocomplete"
async defer></script>   

    <script>

        function initAutocomplete() {
            
            var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 20.593683, lng: 78.962883},
            zoom: 5,
            mapTypeId: 'roadmap'
            });

            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
            });
            var country = state = city = area = address = pincode = street = "";
            var markers = [];

            searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
            return;
            }

            markers.forEach(function(marker) {
            marker.setMap(null);
            });
            markers = [];

            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                var arrAddress = place;
                //console.log(arrAddress.address_components);
                arrAddress.address_components.forEach(function(address_component) {
                    if (address_component.types[0] == "sublocality_level_2" && address_component.types[2] == "political" ) {
                        street = address_component.long_name;
                    }
                    if (address_component.types[0] == "sublocality_level_1" && address_component.types[2] == "political" ) {
                        area = address_component.long_name;
                    }
                    if (address_component.types[0] == "locality") {
                    city = address_component.long_name;
                    }
                    if (address_component.types[0] == "administrative_area_level_1") {
                    state = address_component.long_name;
                    }
                    if (address_component.types[0] == "country") {
                    country = address_component.long_name;
                    }
                    if (address_component.types[0] == "postal_code") {
                        pincode = address_component.long_name;
                    }
            });
            $('#pincode').val(pincode);
            $('#city').val(city);
            $('#state').val(state);
            $('#country').val(country);
            $('#latitude').val(place.geometry.location.lat());
            $('#longtitude').val(place.geometry.location.lng());
            address = street+', '+area+', '+city+' - '+pincode+', '+state+', '+country;
            $('#address').val(address);
            /*  console.log(street+','+area+','+city+','+pincode+','+state+','+country);
            console.log( "Latitude - "+ place.geometry.location.lat()+','+"Longitude - " + place.geometry.location.lng()); */
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };  

            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
            });
                map.fitBounds(bounds);
            });
        }

        /* =========================== Dynamic Add More =========================== */

    </script>




@endsection
-
            <!-- END First Row -->
        </div>
        <!-- Page content -->
@endsection
