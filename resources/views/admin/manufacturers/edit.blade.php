@extends('admin')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="tab-pane" id="tab1">
		<h3 class="text-center">Redaguoti gamintoją</h3>
            @include('errors.list')
        <form enctype="multipart/form-data" id="news-form" method="POST" action="/admin/wallpapers/categories/{!! $category->id !!}">
        {{ method_field('PUT') }}
			{{ csrf_field() }}
            <div class="row col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label for="username">Pavadinimas : </label>
                    <input type="text" name="title" id="title" class="form-control" value="{!! $category->title !!}" 
                           required>
                </div>

            @if($category->logo_name)
            <div class="form-group">


            <img src="/{!! $category->logo_path.$category->logo_name !!}" width="70">
            <br>
            <label for="article_images_{!! $category->id !!}">
            <input id="manufacturer_image" type="checkbox" name="manufacturer_photo" value="{!! $category->id !!}"> Ištrinti
            </label>
            <br>
              <div class="manufacturer-photo">
    		      <label>Gamintojo nuotrauka:</label><br/>
    		      <input type="file" name="manufacturer_image" id="file" class="inputfile" accept="image/*" />
    		      <label for="file">
    		      <i class="fa fa-cloud-upload"></i>
    		      Įkelti nuotrauką</label>
    		      <span id="file_upload"></span>
    		      <div id="files_names"></div>
              </div>
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
    $('.manufacturer-photo').hide();

    $('#manufacturer_image').on('change', function() {
        if(this.checked) {
            $('.manufacturer-photo').show(500);
        } else{
            $('.manufacturer-photo').hide(500);
        }
    });
</script>
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