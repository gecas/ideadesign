@extends('layout')

@section('header')
  @include('partials.nav')
@stop

<style>

  .side-nav select{
    display: none;
  }
  @media (max-width: 768px) {

  .side-nav ul { display: none; }

  .side-nav select {
    display: inline-block;
    width: 100%;
    height: 35px;
    border: none;
    outline: none;
    color:#444;
    padding: 4px;
    border-radius: 5px;
    }

    .side-nav select option{
      color: #444;
    }
    .aksesuarai-footer{
      width: 100%;
    }
    .aksesuarai-footer-wrap{
      position: absolute;
      width: 100%;
      background: none;
      background-image: url("../assets/x-img.png");
      background-repeat: repeat-x;
    }

    .aksesuarai-wrapper{
      margin-top: 130px;
      height: auto !important;
      overflow: auto !important;
    }

    footer{
      background-image: none !important;
      height: 100%;
    }

}

    .aksesuarai-footer-wrap{
        display: flex;
        flex-direction: column;
    }

     .aksesuarai-footer{
        flex: 1;
     }

     .aksesuarai .gallery-wrapper .gallery-item{
      flex-basis: 33.3% !important;
     }

     .aksesuarai .gallery-wrapper .gallery-item img{
      height: 100%;
      width: 100%;
      object-fit: cover;
     }

     .cboxPhoto{
    width: 720px !important;
    height: 720px !important;
  }
</style>

@section('content')
<div class="col-5 aksesuarai-wrapper">
	  <section id="gallery" class="aksesuarai">
        <div class="gallery-wrapper">
          @foreach($accessory->images as $image)
          <div class="gallery-item"><a href="/{!! $image->image_path.$image->image_name !!}" class="gallery-image"><img src="/{!! $image->image_path.$image->image_name !!}"></a></div>
          @endforeach
        </div>

        <div class="article-wrapper">
            <h1>@lang('aksesuarai.title')</h1>
             @php $title = "title_".$locale; @endphp
            @php $text = "text_".$locale; @endphp
            <div class="tapet-name">{!! $accessory->$title !!}</div>
            <div class="tapet-text">{!! $accessory->$text !!}</div>
          </div>
      </section>
  </div>

  <div class="aksesuarai-footer-wrap">
      <footer class="aksesuarai-footer">
      </footer>
      </div>
@stop

@section('scripts')
  <script>
    // Create the dropdown base
    // $("<select />").appendTo(".side-nav");

    // // Create default option "Go to..."
    // $("<option />", {
    //    "selected": "selected",
    //    "value"   : "",
    //    "text"    : "Go to..."
    // }).appendTo(".side-nav");

    // Populate dropdown with menu items
    // $(".side-nav a").each(function() {
    //  var el = $(this);
    //  $("<option />", {
    //      "value"   : el.attr("href"),
    //      "text"    : el.text()
    //  }).appendTo(".side-nav select");
    // });

    // $(".side-nav select").change(function() {
    //   window.location = $(this).find("option:selected").val();
    // });
  </script>
    <script>
        $('.side-nav ul li a').click(function(){
            $('.side-nav ul li a').removeClass("side-active");
            $(this).addClass("side-active");
         });
      </script>
      <script>
        var cboxOptions = {
        width: '720px',
        height: '720px',
        maxWidth: '720px',
        maxHeight: '720px',
        }

      $('#colorbox').colorbox(cboxOptions);

      $(window).resize(function(){
          $.colorbox.resize({
            width: window.innerWidth > parseInt(cboxOptions.maxWidth) ? cboxOptions.maxWidth : cboxOptions.width,
            height: window.innerHeight > parseInt(cboxOptions.maxHeight) ? cboxOptions.maxHeight : cboxOptions.height
          });
      });
      </script>
@stop