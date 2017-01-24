@extends('layout')

@section('header')
  @include('partials.nav')
@stop

@section('content')
<style>
    .form-item{
      position: relative;
      height: 100%;
    }
    .help-block{
      height: 25px;
      color:red;
      position: absolute;
      bottom: 0;
      left: 0;
      font-size: 12px;
      padding: 4px 2px;
    }

    .theme-input{
      display: inline;
    }

    .theme-input .help-block{
      bottom: -35px;
    }
      

  </style>
  <div class="col-12">
  <section id="news">
    <div class="article-wrapper">
      <h1>@lang('contacts.title')</h1>
      <div id="map"></div>

      <div class="contacts-wrapper">

        <div class="address">
          <h3>idea&design</h3> 
          <div class="info-left"> 
            <p class="">P.Lukšio g. 17</p>
            <p class="">Vilnius LT-09132</p>
            <div style="margin-bottom:25px;"></div>
            <p class="">@lang('contacts.tel') +370 5 2741547</p>
            <p class="">@lang('contacts.mobile') +370 686 01416</p>

            <div style="margin-bottom:25px;"></div>
            <p class="">@lang('contacts.mail') id@ideadesign.lt</p>
          </div>
          <div class="info-right">
            <p class="">@lang('contacts.laikas')</p>
            <p class="">I-V 9:00-18:00</p>
            <p class="">VI 10:00-15:00</p>
          </div>
        </div>

        <div class="contacts-form">
          <div class="contacts-form-wrapper">
          <form action="/{!! App::getLocale() !!}/contact-form" method="POST">
            {!! csrf_field() !!}
            <div class="form-left">
              
              <div class="form-item">
                <input type="text"  name="name" placeholder="@lang('contacts.vardas')" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-item">
              <input type="email"  name="email" placeholder="@lang('contacts.email')" value="{{ old('email') }}">
               @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-item">
              <input type="text"  name="phone" placeholder="@lang('contacts.telefonas')" value="{{ old('phone') }}">
              @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
              </div>

              </div>

            <div class="form-right">
              
              <div class="form-item">
              <textarea name="message" id="" cols="5" placeholder="@lang('contacts.message')" rows="3"></textarea>
              @if ($errors->has('message'))
                    <span class="help-block">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
              </div>
              
                <button type="submit">@lang('contacts.send')</button>

            </div>

            </form>

          </div>
        </div>
      </div>
    </div>
    </section>
  </div>
@stop

@section('scripts')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA68WX48ohR7BRSwDIOBUoXXBvYHvIW9y0"></script>
        
        <script>
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
            
            var w = window.innerWidth;
            var show = false;
            if(w<768){
              show = false;
            }else{
              show = true;
            }
        
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 17,
                    zoomControl: false,
                    scaleControl: false,
                    scrollwheel : show,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(54.712264,25.294617), 

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]

                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(54.712264,25.294617),
                    map: map,
                    title: 'P. Lukšio g. 17'
                });
            }
        </script>
@stop