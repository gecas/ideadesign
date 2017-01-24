@extends('admin')

@section('content')

	<div class="col-md-8 col-md-offset-2">
		<div class="tab-pane" id="tab1">
		<h3 class="text-center">Pridėti tapetų gamintoją</h3>
        <form enctype="multipart/form-data" id="manufacturer-form" method="POST" action="/admin/wallpapers/categories">
			{{ csrf_field() }}
            <div class="row col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label for="username">Pavadinimas: </label>
                    <input type="text" name="title" id="name" class="form-control"
                           required>
                </div>

            <div class="form-group">
		      <label>Gamintojo logo:</label><br/>
		      <input type="file" name="logo" id="file" class="inputfile" accept="image/*" />
		      <label for="file">
		      <i class="fa fa-cloud-upload"></i>
		      Įkelti nuotrauką</label>
		      <span id="file_upload"></span>
		      <div id="files_names"></div>
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
<script>
  $("#manufacturer-form #file").change(function() {
  	$('#files_names img').remove();
    var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#file_upload").text(fileName);
  });

    $("#file").change(function(){
        readURL($(this)[0]);
    });

   window.readURL = function (input) {
    if (input.files && input.files[0]) {
        $(input.files).each(function () {
            var reader = new FileReader();
            reader.readAsDataURL(this);
            reader.onload = function (e) {
                $("#files_names").append("<img class='' src='" + e.target.result + "'>");
            }
        });
    }
}
</script>
@stop