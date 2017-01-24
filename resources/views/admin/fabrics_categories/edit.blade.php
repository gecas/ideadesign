@extends('admin')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="tab-pane" id="tab1">
		<h3 class="text-center">Redaguoti audinių kategoriją</h3>
            @include('errors.list')
        <form id="news-form" method="POST" action="/admin/fabrics/categories/{!! $category->id !!}">
        {{ method_field('PUT') }}
			{{ csrf_field() }}
            <div class="row col-md-8 col-md-offset-2">

                <div class="form-group">
                    <label for="username">Pavadinimas LT: </label>
                    <input type="text" name="title_lt" class="form-control" value="{!! $category->title_lt !!}" 
                           required>                         
                </div>

                <div class="form-group">
                    <label for="username">Pavadinimas EN: </label>
                    <input type="text" name="title_en" class="form-control" value="{!! $category->title_en !!}" 
                           required>                         
                </div>

                <div class="form-group">
                    <label for="username">Pavadinimas RU: </label>
                    <input type="text" name="title_ru" class="form-control" value="{!! $category->title_ru !!}" 
                           required>                         
                </div>

		    <div class="form-group">
		    	<button type="submit" class="btn btn-manufacturer">Patvirtinti</button>
		    </div>

            </div>
        </form>

    </div>
	</div>
@stop

@section('scripts')

@stop