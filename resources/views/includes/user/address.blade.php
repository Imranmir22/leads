<!-- Address Information -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('common.address_information') }}
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <input
                type="text"
                id="search_location"
                name="search_location"
                class="form-control @error('search_location') is-invalid @enderror"
                placeholder="{{ __('Search Near By Location') }}"
                style="width:500px; margin-top: 10px"
                value=""
            />


            <div class="col-12 mb-5">
                <div class="text-muted">Click on Map to prefill address.</div>
                <div id="address_map" style="height: 300px; width: 100%;"></div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group input-group-sm ">
                    <label class="mb-0 font-weight-normal"
                           for="address_1">{{__('address.address_1')}}</label>
                    <input
                        type="text"
                        id="address_1"
                        name="address_1"
                        class="form-control @error('address_1') is-invalid @enderror"
                        placeholder="{{ __('address.address_1') }}"
                        value="{{ old('address_1', optional($address)->address_1 ) }}"
                        maxlength="128">
                    @include('backend.includes.invalid', ['field'=> 'address_1'])
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group input-group-sm ">
                    <label class="mb-0 font-weight-normal"
                           for="address_2">{{__('address.address_2')}}</label>
                    <input
                        type="text"
                        id="address_2"
                        name="address_2"
                        class="form-control @error('address_2') is-invalid @enderror"
                        placeholder="{{ __('address.address_2') }}"
                        value="{{ old('address_2', optional($address)->address_2) }}"
                        maxlength="128">
                    @include('backend.includes.invalid', ['field'=> 'address_2'])
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group input-group-sm ">
                    <label class="mb-0 font-weight-normal"
                           for="city">{{__('address.city')}}</label>
                    <input
                        type="text"
                        id="city"
                        name="city"
                        class="form-control @error('city') is-invalid @enderror"
                        placeholder="{{ __('address.city') }}"
                        value="{{ old('city', optional($address)->city) }}"
                        maxlength="128">
                    @include('backend.includes.invalid', ['field'=> 'city'])
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group input-group-sm ">
                    <label class="mb-0 font-weight-normal"
                           for="state">{{__('address.state')}}</label>
                    <input
                        type="text"
                        id="state"
                        name="state"
                        class="form-control @error('state') is-invalid @enderror"
                        placeholder="{{ __('address.state') }}"
                        value="{{ old('state', optional($address)->state) }}">
                    @include('backend.includes.invalid', ['field'=> 'state'])
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group input-group-sm ">
                    <label class="mb-0 font-weight-normal"
                           for="country_code">{{__('address.country')}}</label>
                    <select
                        id="country_code"
                        name="country_code"
                        class="form-control select2bs4 @error('country_code') is-invalid @enderror">
                        @foreach($options['countries'] as $country)
                            <option value="{{ $country->code }}"
                                {{ old('country_code', (optional($address)->country_code) ?? "IN") === $country->code ? 'selected' : '' }}>
                                {{ __($country->name) }}
                            </option>
                        @endforeach
                    </select>
                    @include('backend.includes.invalid', ['field'=> 'country_code'])
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group input-group-sm ">
                    <label class="mb-0 font-weight-normal"
                           for="postcode">{{__('address.postal_code')}}</label>
                    <input
                        type="text"
                        id="postcode"
                        name="postcode"
                        class="form-control @error('postcode') is-invalid @enderror"
                        placeholder="{{ __('address.postal_code') }}"
                        value="{{ old('postcode', optional($address)->postcode) }}"
                    >
                    @include('backend.includes.invalid', ['field'=> 'postcode'])
                </div>
            </div>

            <div class="col-md-12"></div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group input-group-sm ">
                    <label class="mb-0"
                           for="address_lat">{{__('Latitude')}}</label>
                    <input
                        type="text"
                        id="address_lat"
                        name="address_lat"
                        class="form-control decimal-input @error('address_lat') is-invalid @enderror"
                        placeholder="{{ __('Latitude') }}"
                        value="{{ old('address_lat', optional($address)->address_lat) }}"
                        data-decimal="8"
                        readonly
                    >
                    @include('backend.includes.invalid', ['field'=> 'address_lat'])
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group input-group-sm ">
                    <label class="mb-0"
                           for="address_long">{{__('Longitude')}}</label>
                    <input
                        type="text"
                        id="address_long"
                        name="address_long"
                        class="form-control decimal-input @error('address_long') is-invalid @enderror"
                        placeholder="{{ __('Longitude') }}"
                        value="{{ old('address_long', optional($address)->address_long) }}"
                        data-decimal="8"
                        readonly
                    >
                    @include('backend.includes.invalid', ['field'=> 'address_long'])
                </div>
            </div>
        </div>
    </div>
</div>
@push('body.end')
    <script type="text/javascript">
        $(function () {
            function initMap() {
                const myLatLng = {
                    lat: {{ optional($address)->address_lat ??  '24.5854' }},
                    lng: {{ optional($address)->address_long ??  '73.7125' }}
                };

                map = new google.maps.Map(document.getElementById("address_map"), {
                    center: myLatLng,
                    zoom: 16,
                });

                const input = document.getElementById("search_location");
                const searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                // Bias the SearchBox results towards current map's viewport.
                map.addListener("bounds_changed", () => {
                    searchBox.setBounds(map.getBounds());
                });

                searchBox.addListener("places_changed", () => {
                    const places = searchBox.getPlaces();
                    if (places.length == 0) {
                        return;
                    } else {
                        places.forEach((place) => {
                            console.log("place--", place);
                            map.setCenter(place.geometry.location);
                            fillAddress(place.address_components, place.geometry.location.lat(), place.geometry.location.lng());
                        });
                    }
                });


                map.addListener("click", getLatLng);

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            myLatLng.lat = position.coords.latitude;
                            myLatLng.lng = position.coords.longitude;
                            // infoWindow.setPosition(myLatLng);
                            // infoWindow.setContent("Location found.");
                            // infoWindow.open(map);
                            map.setCenter(myLatLng);
                        },
                        () => {
                            //handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    //handleLocationError(false, infoWindow, map.getCenter());
                }
            }

            function fillAddress(address, lat, lng) {
                let address_1 = [];
                address.find(p => {
                    let address1Types = ['premise', 'street_number', 'route', 'landmark', 'neighborhood', 'political'];
                    if (address1Types.includes(p.types[0])) {
                        address_1.push(p.long_name)
                    } else if (p.types[0] == "administrative_area_level_1") {
                        $('#state').val(p.long_name);
                    } else if (p.types[0] == "administrative_area_level_1") {
                        $('#state').val(p.long_name);
                    } else if (p.types[0] == "administrative_area_level_2") {
                        $('#city').val(p.long_name);
                    } else if (p.types[0] == "country") {
                        //country2 = p.short_name;
                        $('#country_code').val(p.short_name);
                        $("#country_code").trigger("change");
                    } else if (p.types[0] == "country") {
                        country = p.long_name;
                    } else if (p.types[0] === "postal_code") {
                        $('#postcode').val(p.long_name);
                    }
                });
                $('#address_1').val(address_1.join(', '));
                $('#address_2').val('');
                $('#address_lat').val(lat);
                $('#address_long').val(lng);
                console.log(window.myLocationMarker);
                if (typeof window.myLocationMarker !== "undefined") {
                    const myLatLng = {
                        lat: lat,
                        lng: lng
                    };
                    window.myLocationMarker.setPosition(myLatLng);
                } else {
                    var myLocation = {
                        title: "My Location",
                        label: "O",
                        position: {
                            lat: lat,
                            lng: lng
                        },
                        info: "My Location",
                        //icon: icons.origin
                    };

                    window.myLocationMarker = addMarker(myLocation);
                }
            }


            function getLatLng(event) {
                gmgeocoder = new google.maps.Geocoder();
                gmgeocoder.geocode({
                    'latLng': event.latLng
                }, function (results, status) {
                    if (typeof results[0] !== "undefined") {
                        let address = results[0]['address_components'];
                        fillAddress(address, event.latLng.lat(), event.latLng.lng());
                    }
                });
            }

            function addMarker(location) {
                marker = new google.maps.Marker({
                    position: location.position,
                    title: location.title,
                    //icon: location.icon,
                    map: window.map,
                    animation: google.maps.Animation.DROP,
                    fillColor: 'yellow'
                });
                return marker;
            }

            initMap();
        });
    </script>
    <script defer
            src="https://maps.googleapis.com/maps/api/js?libraries=places&language={{str_replace('_', '-', app()->getLocale())}}&key={{config('custom.credentials.google_map_api_key_web')}}"
            type="text/javascript"></script>
@endpush
