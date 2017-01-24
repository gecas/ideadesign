@extends('admin')

@section('content')
<style>
    .validation-wrap{
        display: block;
        width: 65%;
        margin: 0 auto;
        /* justify-content: center; */
        padding: 1em;
    }
</style>
	<div class="col-md-8 col-md-offset-2">
        @include('errors.list')
		<div class="tab-pane" id="tab1">
		<h3 class="text-center">Pridėti naujieną</h3>
        <form enctype="multipart/form-data" id="news-form" method="POST" action="/admin/news">
			{{ csrf_field() }}
            <div class="row col-md-8 col-md-offset-2">
                <div class="form-group">

                    <label for="title_lt">Pavadinimas LT: </label>
                    <input type="text" name="title_lt" id="title_lt" class="form-control"
                           required>

                           <label for="title_en">Pavadinimas EN: </label>
                    <input type="text" name="title_en" id="name" class="form-control"
                           required>

                           <label for="title_ru">Pavadinimas RU: </label>
                    <input type="text" name="title_ru" id="name" class="form-control"
                           required>
                </div>

                <div class="form-group">

                      <label for="body_lt">Tekstas LT: </label>
                      <textarea class="form-control" rows="8" name="body_lt" id="body_lt" placeholder="Naujienos tekstas lietuviškai..."></textarea>

                      <label for="body_en">Tekstas EN: </label>
                      <textarea class="form-control" rows="8" name="body_en" id="body_en" placeholder="Naujienos tekstas angliškai..."></textarea>

                      <label for="body_ru">Tekstas RU: </label>
                      <textarea class="form-control" rows="8" name="body_ru" id="body_ru" placeholder="Naujienos tekstas rusiškai..."></textarea>
                </div>


            <div class="form-group">
		      <label>Naujienos nuotrauka:</label><br/>
		      <input type="file" name="news_image" id="file" class="inputfile" accept="image/*" />
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
	$('#news-form').on('submit', function(e){
		if ($('#file').get(0).files.length === 0) {
			e.preventDefault();
    		$('#files_names').append("<div style='display:block;padding:4px;width:100%;background-color:red;color:pink;'>Neįkeltas paveiksliukas</div>");
		}
	});
</script>
 
<script>
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>


<script>
  $("#news-form #file").change(function() {
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