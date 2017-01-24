@extends('admin')

@section('content')
    <style>
        .photo-item{
            border: none !important;
            background-color: transparent;
        }
        .thumbnail{
            object-fit:cover;
        }
    </style>
	<div class="col-md-8 col-md-offset-2">
        @include('errors.list')
		<h3 class="text-center">Pridėti tapetus</h3>
        <form action="/admin/fabrics" method="POST" enctype="multipart/form-data" novalidate>
			{{ csrf_field() }}
            <div class="row col-md-12">

            <div class="form-group">
                <label for="">Audinių kategorija: </label>
                <select name="category" id="" class="form-control">
                    @foreach($categories as $category)
                    <option value="{!! $category->id !!}">{!! $category->title_lt !!}</option>
                    @endforeach
                </select>
            </div>

                <div class="form-group">
                    <label for="username">Pavadinimas LT: </label>
                    <input type="text" name="title_lt" id="name" value="{!! old('title_lt') !!}"  class="form-control"
                           required>
                </div>
                <div class="form-group">
                    <label for="username">Pavadinimas EN: </label>
                    <input type="text" name="title_en" value="{!! old('title_en') !!}"  id="name" class="form-control"
                           required>
                </div>
                <div class="form-group">
                    <label for="username">Pavadinimas RU: </label>
                    <input type="text" name="title_ru" id="name" value="{!! old('title_ru') !!}" class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label for="username">Tekstas LT: </label>
                    <textarea name="text_lt" class="form-control" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="username">Tekstas EN: </label>
                    <textarea name="text_en" class="form-control" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="username">Tekstas RU: </label>
                    <textarea name="text_ru" class="form-control" rows="10"></textarea>
                </div>


                <div class="form-group">
                  <label>Audinių nuotraukos:</label><br/>
                  <input type="file" multiple name="photos[]" id="file" class="inputfile" accept="image/*" />
                  <label for="file">
                  <i class="fa fa-cloud-upload"></i>
                  Įkelti nuotraukas</label>
                  <ul class="list-group" id="result"/>
                </div>

		    <div class="form-group">
		    	<button type="submit" class="btn btn-manufacturer" id="submit-all">Patvirtinti</button>
		    </div>

            </div>
            </form>
	</div>
@stop

@section('scripts')
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
@stop