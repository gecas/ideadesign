@extends('admin')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="tab-pane" id="tab1">
		<h3 class="text-center">Redaguoti naujienų nuotrauką</h3>
            @include('errors.list')
        
            <div class="row col-md-10 col-md-offset-1">

            <form enctype="multipart/form-data" id="nav-images-form" method="POST" action="/admin/nav-images/news/{!! $photo->id !!}">
        	{{ method_field('PUT') }}
			{{ csrf_field() }}

		    <div class="col-md-12">

		            <div class="form-group">
		            <label for="">Naujienų nuotrauka</label>
		            <img src="/{!! $photo->image_path.$photo->image_name !!}" width="250">
		            <br>
		            <label for="article_images">
		            <input id="nav_image" class="delete_image" type="checkbox" name="naujienos_photo" value=""> Ištrinti
		            </label>
		            <br>
			            <div class="nav-photo-upload">
					      <label>Naujienos nuotrauka:</label><br/>
					      <input type="file" name="news_image" id="file" class="inputfile" accept="image/*" />
					      <label for="file">
					      <i class="fa fa-cloud-upload"></i>
					      Įkelti nuotrauką</label>
					      <span id="file_upload"></span>
					      <div id="files_names"></div>
					    </div>
				    </div>

		    </div>


		    <div class="form-group">
		    	<button type="submit" class="btn btn-manufacturer">Patvirtinti</button>
		    </div>

        </form>
            </div>

    </div>
	</div>
@stop

@section('scripts')
<script>
	$('.nav-photo-upload').hide();

	$('#nav_image').on('change', function() {
		if(this.checked) {
			$('.nav-photo-upload').show(500);
    	} else{
    		$('.nav-photo-upload').hide(500);
    	}
	});
</script>

<script>
  $("#nav-images-form #file").change(function() {
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
                $('.no-image-error').hide(1500);
            }
        });
    }
}
</script>

<script>
$('#nav-images-form').on('submit', function(e){
if($('#nav_image').is(':checked')){
    if ($('#file').get(0).files.length === 0) {
         e.preventDefault();
         $('#files_names').append("<div class='no-image-error' style='display:block;padding:4px;width:100%;background-color:red;color:pink;'>Neįkeltas paveiksliukas</div>");
    }
}
});
</script>
@stop