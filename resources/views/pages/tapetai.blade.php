@extends('layout')

@section('header')
  @include('partials.nav')
@stop

<style>
  .article-wrapper>.tapetai-text>*{
    color: #b8b8b8 !important;;
  }
</style>
@section('content')
 <section id="new">
        @if($wallpaper)
        <article>
          <div class="new-image">
            <div class="flexslider">
             <ul class="slides">
             @foreach($wallpaper->images as $image)
                <li><img src="/{!! $image->image_path.$image->image_name !!}" ></li>
             @endforeach          
            </ul>
            </div>
          </div>
          <div class="article-wrapper">
            <h1>@lang('tapetai.title')</h1>
            @php $title = "title_".$locale; @endphp
            @php $text = "text_".$locale; @endphp
            <div class="tapet-name">{!! $wallpaper->$title !!}</div>
            <div class="tapet-text tapetai-text">{!! $wallpaper->$text !!}</div>
            <a class="manufacturer_url" href="{!! $wallpaper->manufacturer_url !!}" target="_blank">@lang('tapetai.puslapis')</a>
          </div>
        </article>
        @else
        <h1 class="no-elements">Kategorija neturi elementų</h1>
        @endif
      </section>
@stop

@section('aside')
  <aside>
      <div class="aside-title">@lang('tapetai.gamintojai')</div>
      <div class="aside-content">
        <ul>
        @foreach(App\WallpapersCategory::orderBy('title', 'ASC')->get() as $category)
            <li><a href="/{!! App::getLocale() !!}/tapetai/{!! $category->slug !!}"><img src="/{!! $category->logo_path.$category->logo_name !!}"></a></li>
        @endforeach
        </ul>
      </div>

</aside>
@stop

@section('scripts')

@stop

