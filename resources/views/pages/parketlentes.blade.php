@extends('layout')

@section('header')
  @include('partials.nav')
@stop
@section('content')
<style>
  .article-wrapper>.parketlentes-text>*{
    color: #b8b8b8 !important;
  }

</style>
 <section id="new">
        @if($flooring)
        <article class="parket-text">
          <div class="new-image">
            <div class="flexslider">

              <ul class="slides">
                @foreach($flooring->images as $image)
                    <li><img src="/{!! $image->image_path.$image->image_name !!}" ></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="article-wrapper">
            <h1>@lang('parketlentes.title')</h1>
             @php $title = "title_".$locale; @endphp
            @php $text = "text_".$locale; @endphp
            <div class="tapet-name">{!! $flooring->$title !!}</div>
            <div class="tapet-text parketlentes-text">{!! $flooring->$text !!}</div>
          </div>
        </article>
        @else
          <h1 class="no-elements">Kategorija neturi elementų</h1>
        @endif
      </section>
@stop

@section('aside')
  <aside>
      <div class="aside-title">@lang('parketlentes.gamintojai')</div>
      <div class="aside-content">
        <div class="button-group parketlentes side-nav controls filters-button-group">
            <ul>
            @foreach(App\FlooringCategory::latest()->get() as $category)
              <li><a href="/{!! App::getLocale() !!}/parketlentes/{!! $category->slug !!}" class="filter button">{!! $category->title !!}
                  <div class="hover"></div></a></li>        
            @endforeach
            </ul>
        </div>
      </div>
</aside>
@stop

@section('scripts')
  <script>
        $('.side-nav ul li button').click(function(){
            $('.side-nav ul li button').removeClass("side-active");
            $(this).addClass("side-active");
         });
      </script>
@stop