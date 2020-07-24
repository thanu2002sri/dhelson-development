@extends('layouts.app')

@section('styles')
{{-- <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('assets/css/richtext.min.css') }}">
    <style>
        /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map {
            height: 250px;
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

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            height: 30px;
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
        #target {
            width: 345px;
        }
    </style>
@endsection



@section('content')
    <!-- Page content -->
    <div id="page-content">
            <!-- Page Header -->
            <div class="content-header">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="header-section">
                            <h1>{{ $title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Header -->

             <!-- Add Agent -->
             <div class="block full">
                    <div class="block-title text-center">
                        <h2>Dhelson Express - {{ $title }}</h2>                       
                    </div>
                    <form action="{{ route('add.branch') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf
                                <div class="form-group">
                                    <label style=" margin-top: 12px; " class="col-md-2 form-field-margin control-label" for="example-select2">Agents</label>
                                    <div class="col-sm-5" style=" margin-top: 12px; ">
                                            <select id="distr-security-question" name="agent_id" value="{{ old('agent_id') }}" autocomplete="agent_id" autofocus class="form-control select-select2 @error('agent_id') is-invalid @enderror" style="width: 100%;" data-placeholder="Select Agent" required>
                                                <option value="">Select Agent</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                @foreach($agents as $agent)
                                                    <option value="{{ $agent->id }}">{{ $agent->phone }} - ( {{ $agent->name}} )</option>
                                                @endforeach
                                            </select>
                                            @error('agent_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-sm-5" style=" margin-top: 12px; ">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                                <input type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus class="form-control @error('name') is-invalid @enderror" placeholder="Enter Agencies Firm Name" required>
                                        </div>
                                        @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style=" margin-top: 12px; " class="col-md-2 form-field-margin control-label" for="example-select2">Agency Email</label>
                                    <div class="col-sm-5" style=" margin-top: 12px; ">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                                <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror" placeholder="Enter Agency Email" required>
                                        </div>
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-5" style=" margin-top: 12px; ">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                                            <input minlength="10" maxlength="10" pattern="[0-9]*" type="text" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Agency Phone Number" required>
                                        </div>
                                        @error('phone')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="form-group">
                                <div class="col-sm-2 form-field-margin">
                                    <label class="control-label">Get Agency Address</label>
                                </div>
                                
                                <div class="col-sm-10" style=" margin-top: 12px; ">
                                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                    <div id="map"></div>
                                </div>
                            </div>
                                
                            
                            <div class="form-group">
                                    <div class="col-sm-2 form-field-margin">
                                            <label class="control-label">Agency Address</label>
                                    </div>
                                <div class="col-sm-10 form-field-margin">
                                    <textarea id="address" autofocus value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Agency Address" required name="address" rows="4"></textarea>
                                    @error('address')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                    
                            <div class="form-group">
                                    <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Agency Pincode</label>
                                    <div readonly class="col-sm-5" style=" margin-top: 12px; ">
                                            <input id="pincode" minlength="6" maxlength="6" pattern="[0-9]*" type="text" name="pincode" value="{{ old('pincode') }}" autocomplete="pincode" autofocus class="form-control @error('pincode') is-invalid @enderror" placeholder="Enter Agency Pincode" required>
                                            @error('pincode')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-sm-5" style=" margin-top: 12px; ">
                                        <input readonly id="city" type="text" name="city" value="{{ old('city') }}" autocomplete="city" autofocus class="form-control @error('city') is-invalid @enderror" placeholder="Enter Agency City" required>
                                        @error('city')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                    
                            </div>
                            <div class="form-group">
                                    <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Agency State</label>
                                    <div class="col-sm-5" style=" margin-top: 12px; ">
                                        
                                            <input readonly id="state" type="text" name="state" value="{{ old('state') }}" autocomplete="state" autofocus class="form-control @error('state') is-invalid @enderror" placeholder="Enter Agency State" required>
                                            @error('state')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-sm-5" style=" margin-top: 12px; ">
                                    
                                        <input id="country" readonly type="text" name="country" value="{{ old('country') }}" autocomplete="country" autofocus class="form-control @error('country') is-invalid @enderror" placeholder="Enter Agency Country" required>
                                        @error('country')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>

                            <div class="form-group">
                                <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Agency Lat & Lan</label>
                                <div class="col-sm-5" style=" margin-top: 12px; ">
                                    
                                        <input readonly id="latitude" type="text" name="lattitude" value="{{ old('lattitude') }}" autocomplete="lattitude" autofocus class="form-control @error('lattitude') is-invalid @enderror" placeholder="Enter Agency Latitude" required>
                                        @error('lattitude')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-sm-5" style=" margin-top: 12px; ">
                                
                                    <input readonly id="longtitude" type="text" name="logtitude" value="{{ old('logtitude') }}" autocomplete="logtitude" autofocus class="form-control @error('logtitude') is-invalid @enderror" placeholder="Enter Agency Longtitude" required>
                                    @error('logtitude')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group">
                            <label style=" margin-top: 12px; " class="col-md-2 control-label" for="example-datepicker">Amount / Tax</label>
                            <div class="col-sm-3" style=" margin-top: 12px; ">
                                    <input  type="number" name="amount" value="{{ old('amount') }}" autocomplete="amount" autofocus class="form-control @error('amount') is-invalid @enderror" placeholder="Enter Amount" required>
                                    @error('amount')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-sm-3" style=" margin-top: 12px; ">
                            
                                <input type="number" name="tax" value="{{ old('tax') }}" autocomplete="tax" autofocus class="form-control @error('tax') is-invalid @enderror" placeholder="Enter Tax" required>
                                @error('tax')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-4" style=" margin-top: 12px; ">
                            
                                <input type="number" name="total_amount" value="{{ old('total_amount') }}" autocomplete="total_amount" autofocus class="form-control @error('total_amount') is-invalid @enderror" placeholder="Enter Total Amount" required>
                                @error('total_amount')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                        <div class="form-group" style=" margin-top: 12px; ">
                                
                            <div class="col-sm-12 form-field-margin">
                                <label class="control-label">Description</label>
                                    <textarea id="content" required autofocus value="{{ old('descritpion') }}" class="form-control @error('descritpion') is-invalid @enderror" placeholder="Enter Description"  name="descritpion" rows="4"></textarea>
                                        @error('descritpion')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                        </div>
                                   
                            <div class="form-group form-actions">
                                    <div class="col-sm-7 col-sm-offset-5">
                                            <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Submit</button>
                                            <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">Reset</button>
                                    </div>
                            </div>
                        </form>
            </div>
         
        <!-- END Add Agents -->
<!-- END Main Container -->
</div>
<!-- END content -->
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&libraries=places&callback=initAutocomplete"
async defer></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.richtext.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#content').richText();
    });
</script>
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
    </script>
@endsection