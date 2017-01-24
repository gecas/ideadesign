@extends('layout')

@section('header')
  @include('partials.nav')
@stop

@section('content')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.css">

	
	<section id="news">
	<div class="article-wrapper">
	<h1><span>Na</span>ujienos</h1>

		<div class="content-wrapper">

		<div class="new-wrapper">
			<img src="/{!! $article->image_path.$article->image_name !!}" alt="">

			<div class="text-wrap">
				<div class="text-left">
				 <?php $title = "title_".$locale; ?> 
					<h3 style="color:#f9f9f9;">{!! $article->$title !!}</h3>
				</div>
				<div class="text-right">
					<p style="color:#f9f9f9;">{!! $article->created_at !!}</p>
				</div>
				<div class="clearfix"></div>
				<div class="news-text" ">
					<?php $body = "body_".$locale; ?> 
					<p>
					{!! $article->$body !!}
					</p>
				</div>
			</div>
		</div>

		<div class="slider-wrapper">
			<div id="main" role="main">
      <section class="slider">

     	<div class="slider8">
			
		@foreach(App\Article::latest()->get() as $article)
		  <div class="slide">
		  <a href="/{!! App::getLocale() !!}/naujiena/{!!$article->slug!!}">
			  <img src="/{!! $article->image_path.$article->image_name !!}">
			  <?php $title = "title_".$locale; ?> 
			  <h3 class="news-title">{!! $article->$title !!}</h3>
		  </a>
		  </div>
		  @endforeach

		</div>

      </section>
    </div>
			</div>

		</div>

		</div>
	</section>


@stop

@section('scripts')

  <!-- FlexSlider -->
  <script defer src="/js/jquery.flexslider.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.js"></script>

   <script>
    $(document).ready(function(){
  	$('.slider8').bxSlider({
	    mode: 'vertical',
	    slideWidth: 300,
	    minSlides: 3,
	    slideMargin: 4
  });
});
  </script>

  <!-- Syntax Highlighter -->
  <script src="/js/shCore.js"></script>
  <script src="/js/shBrushXml.js"></script>
  <script src="/js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="/js/jquery.easing.js"></script>
  <script src="/js/jquery.mousewheel.js"></script>
  <script defer src="/js/demo.js"></script>
@stop