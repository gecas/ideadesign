@extends('layout')

@section('header')
  @include('partials.nav')
@stop

@section('content')
<style>
  
</style>

<div class="col-5 audiniai-wrapper">
	  <section id="gallery" class="audiniai">
        <div class="gallery-wrapper">
        @foreach($fabrics as $fabric)
            @foreach($fabric->images as $image)
            <div class="gallery-item category-{!! $fabric->category->id !!}" data-rel="{!! $fabric->category->id !!}">
              <a href="/{!! $image->image_path.$image->image_name !!}" class="gallery-image-{!! $fabric->category->id !!}" rel="gallery-item-{!! $fabric->category->id !!}">
              <img src="/{!! $image->image_path.$image->image_name !!}"></a>
            </div>
              @endforeach
           @endforeach
          
        </div>

        <div class="article-wrapper">
            <h1>@lang('audiniai.title')</h1>
              @foreach($fabrics as $fabric)
                @php $title = "title_".$locale; @endphp
                @php $text = "text_".$locale; @endphp
                <div class="tapet-name mix category-{!! $fabric->category->id !!}">{!! $fabric->$title !!}
              </div>
              <div class="tapet-text category-{!! $fabric->category->id !!}"">{!! $fabric->$text !!}</div>
              @endforeach
        </div>
      </section>
  </div>
  <div class="audiniai-footer-wrap">
      <footer class="audiniai-footer">
        <nav class="side-nav">
        <h2 class="side-title">@lang('pages.title')</h2>
        <div class="button-group controls filters-button-group">
            <ul>
            @foreach($categories as $category)
              <li><button class="filter button" data-rel={!! $category->id !!} data-filter=".category-{!! $category->id !!}">
                  @php $title = "title_".$locale; @endphp
                  {!! $category->$title !!}
                  <div class="hover"></div></button></li>
                  @endforeach
            </ul>
        </div>

        <div class="controls">

              <select class="filters-select"> 
              <option value="" disabled selected="selected">@lang('audiniai.menu.choose')</option>       
              @foreach($categories as $category)  
              <option value=".category-{!! $category->id !!}" data-filter=".category-{!! $category->id !!}">
                @php $title = "title_".$locale; @endphp
                {!! $category->$title !!}
              </option> 
             @endforeach
            </select>

      </div>


      </nav>
      </footer>
      </div>
@stop

@section('scripts')
    <script>
        $('.side-nav ul li button').click(function(){
            $('.side-nav ul li button').removeClass("side-active");
            $(this).addClass("side-active");
         });
      </script>
      <script>      

              // external js: isotope.pkgd.js
      if ( $(window).width() > 768 ) {
          $('.article-wrapper').children('div').hide();
          // init Isotope
          var $grid = $('.gallery-wrapper').isotope({
            itemSelector: '.gallery-item',
            layoutMode: 'fitRows'
          });
          // filter functions
          var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
              var number = $(this).find('.number').text();
              return parseInt( number, 10 ) > 50;
            },
            // show if name ends with -ium
            ium: function() {
              var name = $(this).find('.name').text();
              return name.match( /ium$/ );
            }
          };

          // bind filter button click
          $('.filters-button-group').on( 'click', 'button', function() {
            var filterValue = $( this ).attr('data-filter');
            $('.article-wrapper').children('div').hide();
            var text = $('.article-wrapper').find(filterValue).show(500);
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ filter: filterValue });
          });
          //http://ideadesign.dev/assets/audiniai/staltiesems/takelis_lininis_3.jpg
          // change is-checked class on buttons
          $('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function() {
              $buttonGroup.find('.is-checked').removeClass('is-checked');
              $( this ).addClass('is-checked');
            });
          });
      } else{
        $('.article-wrapper').children('div').hide();
           var $grid = $('.gallery-wrapper').isotope({
            itemSelector: '.gallery-item',
            layoutMode: 'fitRows'
          });
          // filter functions
          var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
              var number = $(this).find('.number').text();
              return parseInt( number, 10 ) > 50;
            },
            // show if name ends with -ium
            ium: function() {
              var name = $(this).find('.name').text();
              return name.match( /ium$/ );
            }
          };
          // bind filter on select change
          $('.filters-select').on('change', function() {
            // get filter value from option value
            var filterValue = this.value;
            $('.article-wrapper').children('div').hide();
            var text = $('.article-wrapper').find(filterValue).show(500);
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ filter: filterValue });
          });
      }
      </script>

      <script>
      var height2 = $(window).height();

        var cboxOptions = {
        width: 'auto',
        height: height2,
        maxWidth: '720px',
        top: '0 !important',
        bottom: '50px'
      }

      var gallery = '';
      $('.filter').on('click', function(){
        gallery = $(this).attr('data-rel');
      });
      //$('#colorbox').colorbox(cboxOptions);
       $('.gallery-image-' + gallery).colorbox({rel:'gallery-item-'+gallery});

      //$('#cboxLoadedContent .cboxPhoto').css({"width": "auto", "height": height2 + '!important'});

      $(window).resize(function(){
          $.colorbox.resize({
            width: window.innerWidth > parseInt(cboxOptions.maxWidth) ? cboxOptions.maxWidth : cboxOptions.width,
            height: window.innerHeight > parseInt(cboxOptions.maxHeight) ? cboxOptions.maxHeight : cboxOptions.height
          });
      });
      </script>

@stop