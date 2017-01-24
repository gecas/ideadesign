@extends('admin')

@section('content')

	<div class="col-md-8 col-md-offset-2">
		<div class="tab-pane" id="tab1">
        @include('errors.list')
		<h3 class="text-center">Pridėti audinių kategoriją</h3>
        <form  id="manufacturer-form" method="POST" action="/admin/fabrics/categories">
			{{ csrf_field() }}
            <div class="row col-md-8 col-md-offset-2">

                <div class="form-group">
                    <label >Pavadinimas LT: </label>
                    <input type="text" name="title_lt" class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label >Pavadinimas EN: </label>
                    <input type="text" name="title_en" class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label >Pavadinimas RU: </label>
                    <input type="text" name="title_ru" class="form-control"
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

