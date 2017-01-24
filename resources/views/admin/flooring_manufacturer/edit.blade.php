@extends('admin')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="tab-pane" id="tab1">
		<h3 class="text-center">Redaguoti parketlenčių gamintoją</h3>
            @include('errors.list')
        <form id="news-form" method="POST" action="/admin/flooring/categories/{!! $category->id !!}">
        {{ method_field('PUT') }}
			{{ csrf_field() }}
            <div class="row col-md-8 col-md-offset-2">

                <div class="form-group">
                    <label for="username">Pavadinimas: </label>
                    <input type="text" name="title" id="title" class="form-control" value="{!! $category->title !!}" 
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