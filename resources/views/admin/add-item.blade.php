@extends('layouts.admin')
@section('scripts')
    <script>
        $(window).load(function () {
            //load wysiwyg editor
            $('#text').summernote({
                height: 200   //set editable area's height
            });

        });
    </script>
@endsection
@section('breadcrumbs')
    <li>
        <a href="/"><i class="fa fa-home"></i> Pradinis</a>
    </li>
    <li>
        <a href="{{ route('addItem') }}">Pridėti gamintoją</a>
    </li>
@endsection

@section('title')
    <h2>Pridėti dirbinį</h2>
@endsection


@section('content')

    <!-- tile -->
    <section class="tile">


        <!-- tile header -->
        <div class="tile-header dvd dvd-btm">
            <h1 class="custom-font"><strong>Pridėti</strong> gaminotją</h1>

        </div>
        <!-- /tile header -->

        <!-- tile body -->
        <div class="tile-body">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form class="form-horizontal" method="POST" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="input01" class="col-sm-2 control-label">Gamintojo pavadinimas</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="input01">
                    </div>
                </div>

                <hr class="line-dashed line-full"/>

                <div class="form-group @if($errors->has('text')) has-error @endif">
                    <label class="col-sm-2 control-label">Apie gamintoją</label>
                    <div class="col-sm-10">
                    <textarea class="input-block-level" id="text" name="text" rows="18">
					</textarea>
                    </div>
                </div>

                <hr class="line-dashed line-full"/>

                <div class="form-group @if($errors->has('file')) has-error @endif" id="file_place">
                    <div id="file_1" class="row">
                        <label class="col-sm-2 control-label">Nuotrauka</label>
                        <div class="col-sm-10">

                            <input type="file" class="filestyle" data-buttonText="Find file" name="file[]"
                                   data-iconName="fa fa-inbox">
                        </div>
                    </div>
                    <div class="row">


                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1" style="float: right; margin-top:15px ">


                        <a class="btn btn-success fileinput-button" onclick="addFile();"
                           href="javascript:void(0)"><i
                                    class="glyphicon glyphicon-plus"></i>
                            <span>Add files</span></a>
                    </div>
                </div>
                <hr class="line-dashed line-full"/>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button type="reset" class="btn btn-lightred">Atšaukti</button>
                        <button type="submit" class="btn btn-default">Sukurti</button>
                    </div>


                </div>


            </form>

        </div>
        <!-- /tile body -->

    </section>
    <!-- /tile -->
@endsection

