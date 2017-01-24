@extends('admin')

@section('content')
<style>
    #floorings_list li img{
        object-fit: contain;
        height: 150px;
        width: 100%;
    }

    #floorings_list{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        padding-bottom: 50px;
        border-bottom: 2px solid #333;
    }

    #floorings_list li{
        width: 33%;
        height: 180px;
        background-color: transparent;
        border: none;
    }

    .photo-item{
        border: none !important;
        background-color: transparent;
    }
    .thumbnail{
        object-fit:cover;
    }
</style>
	<div class="col-md-8 col-md-offset-2">
		<div class="tab-pane" id="tab1">
		<h3 class="text-center">Redaguoti parketlentę</h3>
            @include('errors.list')
        <form enctype="multipart/form-data" id="flooring-form" method="POST" action="/admin/flooring/{!! $flooring->id !!}">
             {{ method_field('PUT') }}
			{{ csrf_field() }}
            <div class="row col-md-8 col-md-offset-2">

            <div class="form-group">
                <label for="">Tapetų gamintojas: </label>
                <select name="manufacturer" id="" class="form-control">
                    @foreach($categories as $category)
                    @if($flooring->category_id == $category->id)
                    <option selected value="{!! $category->id !!}">{!! $category->title !!}</option>
                    @else
                        <option value="{!! $category->id !!}">{!! $category->title !!}</option>
                    @endif
                    @endforeach
                </select>
            </div>

                <div class="form-group">
                    <label for="username">Pavadinimas LT: </label>
                    <input type="text" name="title_lt" id="title_lt" class="form-control" value="{!! $flooring->title_lt !!}" 
                           required>
                </div>

                    <div class="form-group">
                    <label for="username">Pavadinimas EN: </label>
                    <input type="text" name="title_en" id="title_en" class="form-control" value="{!! $flooring->title_en !!}" 
                           required>
                    </div>

                    <div class="form-group">
                           <label for="username">Pavadinimas RU: </label>
                    <input type="text" name="title_ru" id="title_ru" class="form-control" value="{!! $flooring->title_ru !!}" 
                           required>
                </div>

                <div class="form-group">
                    <label for="body">Tekstas LT: </label>
                    <textarea class="form-control" rows="8" name="text_lt" id="text_lt" placeholder="Naujienos tekstas LT...">{!! $flooring->text_lt !!}</textarea>
                    </div>

                    <div class="form-group">
                    <label for="text">Tekstas EN: </label>
                    <textarea class="form-control" rows="8" name="text_en" id="text_en" placeholder="Naujienos tekstas EN...">{!! $flooring->text_en !!}</textarea>
                    </div>

                    <div class="form-group">
                    <label for="text">Tekstas RU: </label>
                    <textarea class="form-control" rows="8" name="text_ru" id="text_ru" placeholder="Naujienos tekstas RU...">{!! $flooring->text_ru !!}</textarea>
                </div>

                   
            <ul id="floorings_list" class="list-group">
                @php $i = 0; @endphp
                @foreach($flooring->images as $image)
                    <li class="list-group-item">
                        <img src="/{!! $image->image_path.$image->image_name !!}" width="70">
                        <br>
                        <label for="flooring_images_{!! $flooring->id !!}">
                        <input id="flooring_image" type="checkbox" name="photo_data[{!! $image->id !!}][delete]" value="1">Ištrinti
                        </label>

                        <input class="photo_position" type="hidden" name="photo_data[{!! $image->id !!}][position]" @if ($i == $image->position ) disabled='true' @endif value="{!! $i++ !!}">
                    </li>
                {{-- <div class="form-group">
                <br>
                <label for="flooring_images_{!! $flooring->id !!}">
                <input id="flooring_image" type="checkbox" name="photo" value="{!! $flooring->id !!}"> Ištrinti
                </label>
                <br>
                  <label>Naujienos nuotrauka:</label><br/>
                  <input type="file" name="news_image" id="file" class="inputfile" accept="image/*" />
                  <label for="file">
                  <i class="fa fa-cloud-upload"></i>
                  Įkelti nuotrauką</label>
                  <span id="file_upload"></span>
                  <div id="files_names"></div>
                </div> --}}
                @endforeach
            </ul>
            <br>

            <div class="form-group">
                  <label>Pridėti nuotraukų:</label><br/>
                  <input type="file" multiple name="edit-photos[]" id="file" class="inputfile" accept="image/*" />
                  <label for="file">
                  <i class="fa fa-cloud-upload"></i>
                  Įkelti nuotraukas</label>
                  <ul class="list-group" id="result"/>
                </div>


            <br>
		    <div class="form-group">
		    	<button type="submit" class="btn btn-manufacturer">Patvirtinti</button>
		    </div>

            </div>
        </form>

    </div>
	</div>
@stop

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
window.onload = function(){
        
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("file");
        
        filesInput.addEventListener("change", function(event){
            
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    
                    var div = document.createElement("li");
                    div.className = 'list-group-item col-md-3 photo-item';
                    
                    div.innerHTML = "<img class='thumbnail' width='150px' height='100px' src='" + picFile.result + "'" +
                            "/>";
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}
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

    $("#floorings_list").sortable({
        stop: function(event, ui) {
            var position = parseInt(ui.item.index());
            var old_position = parseInt(ui.item.find('input.photo_position').first().val());
            var items = $(this).find('li');
            if(position > old_position){
                for(var i = position; i >= old_position; i--){
                    var itm = items.eq(i).find('input.photo_position').first().removeAttr('disabled').val(i);
                }
            }else if(position < old_position){
                for(var i = position; i <= old_position; i++){
                    var itm = items.eq(i).find('input.photo_position').first().removeAttr('disabled').val(i);
                }
            }
        },
        start: function(event, ui){
            ui.item.find('input.photo_position').first().val(ui.item.index());
        }
    }).disableSelection();
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