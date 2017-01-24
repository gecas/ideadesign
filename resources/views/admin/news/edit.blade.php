@extends('admin')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="tab-pane" id="tab1">
		<h3 class="text-center">Redaguoti naujieną</h3>
            @include('errors.list')
        <form enctype="multipart/form-data" id="news-form" method="POST" action="/admin/news/{!! $article->id !!}">
        {{ method_field('PUT') }}
			{{ csrf_field() }}
            <div class="row col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label for="username">Pavadinimas LT: </label>
                    <input type="text" name="title_lt" id="title_lt" class="form-control" value="{!! $article->title_lt !!}" 
                           required>

                           <label for="username">Pavadinimas EN: </label>
                    <input type="text" name="title_en" id="title_en" class="form-control" value="{!! $article->title_en !!}" 
                           required>

                           <label for="username">Pavadinimas RU: </label>
                    <input type="text" name="title_ru" id="title_ru" class="form-control" value="{!! $article->title_ru !!}" 
                           required>
                </div>

                <div class="form-group">
                    <label for="body">Tekstas LT: </label>
                    <textarea class="form-control" rows="8" name="body_lt" id="body_lt" placeholder="Naujienos tekstas LT...">{!! $article->body_lt !!}</textarea>

                    <label for="body">Tekstas EN: </label>
                    <textarea class="form-control" rows="8" name="body_en" id="body_en" placeholder="Naujienos tekstas EN...">{!! $article->body_en !!}</textarea>

                    <label for="body">Tekstas RU: </label>
                    <textarea class="form-control" rows="8" name="body_ru" id="body_ru" placeholder="Naujienos tekstas RU...">{!! $article->body_ru !!}</textarea>
                </div>

            @if($article->image_name)
            <div class="form-group">


            <img src="/{!! $article->image_path.$article->image_name !!}" width="70">
            <br>
            <label for="article_images_{!! $article->id !!}">
            <input id="article_image" type="checkbox" name="photo" value="{!! $article->id !!}"> Ištrinti
            </label>
            <br>
		      <label>Naujienos nuotrauka:</label><br/>
		      <input type="file" name="news_image" id="file" class="inputfile" accept="image/*" />
		      <label for="file">
		      <i class="fa fa-cloud-upload"></i>
		      Įkelti nuotrauką</label>
		      <span id="file_upload"></span>
		      <div id="files_names"></div>
		    </div>
            @endif

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
if($('#article_image').is(':checked')){
    if ($('#file').get(0).files.length === 0) {
         e.preventDefault();
         $('#files_names').append("<div class='no-image-error' style='display:block;padding:4px;width:100%;background-color:red;color:pink;'>Neįkeltas paveiksliukas</div>");
    }
    // else{ 
    //     $('#file_upload').on('change', function(){
    //         $('.no-image-error').hide(1500);
    //     });
    // }
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
                $('.no-image-error').hide(1500);
            }
        });
    }
}
</script>
@stop