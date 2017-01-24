@extends('layout')

@section('content')
<style>
  .nav-text a{
    color: #fff;
  }
</style>
   <div class="col-2">
        <ul class="navbar"> 
        @foreach($photos as $photo)
          @if($photo['category'] == 'kontaktai')
          <li style="background-image: url('{!! $photo->image_path.$photo->image_name !!}');" class="toggle-1"><a href="/{!! App::getLocale() !!}/kontaktai" data-toggle="1" class="toggle"></a>
          <div class="mobile-text">@lang('index_menu.mobile_text.kontaktai')</div>
          <div class="close"><i class="fa fa-times"></i></div>
          </li>
          @endif
        @endforeach
        </ul>
        <div class="footer"></div>
        <div class="nav-text">
          <div data-id="1" class="info item-1">@lang('index_menu.kontaktai')</div>
        </div>
      </div>
      <div class="col-1">
        @include('partials.nav')
      </div>
     
     <div class="col-5">
        <ul class="navbar navbar-5">
        @foreach($photos as $photo)

        @if($photo['category'] == 'naujienos')
          <li style="background-image: url('{!! $photo->image_path.$photo->image_name !!}');" class="toggle-2">
          <a href="/{!! App::getLocale() !!}/naujienos" title="@lang('index_menu.mobile_text.naujienos')" data-toggle="2" class="toggle index-redirect"></a>
            <div class="mobile-text">@lang('index_menu.mobile_text.naujienos')</div>
            <div class="close"><i class="fa fa-times"></i></div>
          </li>
          @endif
        
          @if($photo['category'] == 'tapetai')
          <li style="background-image: url('{!! $photo->image_path.$photo->image_name !!}');" class="toggle-3"><a href="/{!! App::getLocale() !!}/tapetai" title="@lang('index_menu.mobile_text.tapetai')" data-toggle="3" class="toggle index-redirect"></a>
            <div class="mobile-text">@lang('index_menu.mobile_text.tapetai')</div>
            <div class="close"><i class="fa fa-times"></i></div>
          </li>
          @endif

          @if($photo['category'] == 'audiniai')
          <li style="background-image: url('{!! $photo->image_path.$photo->image_name !!}');" class="toggle-5"><a href="/{!! App::getLocale() !!}/audiniai" title="@lang('index_menu.mobile_text.audiniai')" data-toggle="5" class="toggle index-redirect"></a>
            <div class="mobile-text">@lang('index_menu.mobile_text.audiniai')</div>
            <div class="close"><i class="fa fa-times"></i></div>
          </li>
          @endif

          @if($photo['category'] == 'parketlentes')
          <li style="background-image: url('{!! $photo->image_path.$photo->image_name !!}');" class="toggle-4"><a href="/{!! App::getLocale() !!}/parketlentes" title="@lang('index_menu.mobile_text.parketlentes')" data-toggle="4" class="toggle index-redirect"></a>
            <div class="mobile-text">@lang('index_menu.mobile_text.parketlentes')</div>
            <div class="close"><i class="fa fa-times"></i></div>
          </li>
          @endif

          @if($photo['category'] == 'aksesuarai')
          <li style="background-image: url('{!! $photo->image_path.$photo->image_name !!}');" class="toggle-6"><a href="/{!! App::getLocale() !!}/aksesuarai" title="@lang('index_menu.mobile_text.aksesuarai')" data-toggle="6" class="toggle index-redirect"></a>
            <div class="mobile-text">@lang('index_menu.mobile_text.aksesuarai')</div>
            <div class="close"><i class="fa fa-times"></i></div>
          </li>
          @endif
          
          @endforeach
        </ul>
        <div class="footer">
          <div class="footer-text">ideadesign.lt (c) 2016 | @lang('index_menu.privacy_policy')</div>
        </div>
        <div class="nav-text">
          <div data-id="2" class="info item-2"><a href="/{!! App::getLocale() !!}/naujienos">@lang('index_menu.naujienos')</a></div>
          <div data-id="3" class="info item-3"><a href="/{!! App::getLocale() !!}/tapetai">@lang('index_menu.tapetai')</a></div>
          <div data-id="5" class="info item-5"><a href="/{!! App::getLocale() !!}/audiniai">@lang('index_menu.audiniai')</a></div>
          <div data-id="4" class="info item-4"><a href="/{!! App::getLocale() !!}/parketlentes">@lang('index_menu.parketlentes')</a></div>
          <div data-id="6" class="info item-6"><a href="/{!! App::getLocale() !!}/aksesuarai">@lang('index_menu.aksesuarai')</a></div>
        </div>
      </div>
@stop

@section('scripts')
  <script src="js/jquery.flexslider.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"></script>
  <script src="js/shCore.js"></script>
  <script src="js/shBrushXml.js"></script>
  <script src="js/shBrushJScript.js"></script>
  <script src="js/jquery.easing.js"></script>
@stop