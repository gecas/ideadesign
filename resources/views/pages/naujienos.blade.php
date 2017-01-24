@extends('layout')

@section('header')
  @include('partials.nav')
@stop

@section('content')
 <section id="news">
        <div class="article-wrapper">
        <h1>@lang('news.title')</h1>
        <div class="news-articles">
          @foreach($news as $new)
          <figure class="news-figure">
         <a href="/{!! App::getLocale() !!}/naujiena/{!!$new->slug!!}">
          <img src="/{!! $new->image_path.$new->image_name !!}">
          </a>
            <figcaption>
            <div class="news-header">
            <?php $title = "title_".$locale; ?> 
              <a href="/{!! App::getLocale() !!}/naujiena/{!!$new->slug!!}">
              <span class="news-title">{!! $new->$title !!}</span>
              </a>
              <span class="news-date">{!! $new->created_at->format('Y-m-d') !!}</span>
              <div class="clearfix"></div>
              </div>
              <?php $excerpt = "excerpt_".$locale; ?> 
              <span class="article-excerpt">{!! $new->$excerpt !!}</span>
            </figcaption>
            <a href="/{!! App::getLocale() !!}/naujiena/{!!$new->slug!!}" class="show-more">@lang('news.more')</a>
          </figure>
          
          @endforeach
        </div>
        {!! $news->render() !!}
        </div>
  </section>
@stop