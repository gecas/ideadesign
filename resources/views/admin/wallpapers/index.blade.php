@extends('admin')

@section('content')
<style>
.modal-backdrop {
   display:none;
}

</style>
    <!-- tile body -->
                <div class="col-md-10 col-md-offset-1">
                                <div class="tile-body">

                                    <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                                        <thead>
                                        <tr>
                                        @php
                                            $i = 0;
                                        @endphp
                                            <th>#</th>
                                            <th>Pavadinimas</th>
                                            <th>Gamintojas</th>
                                            <th>Redaguoti</th>
                                            <th>Ištrinti</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($wallpapers as $wallpaper)
                                        @php
                                         $i ++;
                                        @endphp
                                        <tr>
                                            <td>{!! $i !!}</td>
                                            <td>{!! $wallpaper->title_lt !!}</td>
                                            <td>{!! $wallpaper->category->title !!}</td>
                                            <td><a class="btn btn-primary" href="/admin/wallpapers/{!! $wallpaper->id !!}/edit">Redaguoti</a></td>
                                            <td><a class="btn btn-danger mb-10" data-toggle="modal" data-target="#myModal" wallpaper-id="{!! $wallpaper->id !!}">Ištrinti</a></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot class="hide-if-no-paging">
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <ul class="pagination"></ul>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                    </div>
                                <!-- /tile body -->

                               <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title custom-font">Ištrinti tapetą</h3>
                                            </div>
                                            <div class="modal-body">
                                               Ar tikrai norite ištrinti tapetą ? 
                                            </div>
                                            <div class="modal-footer">
                                            <form action="" id="modal-wallpapers-delete-form" method="POST">
                                              {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Ištrinti</button>
                                                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Uždaryti</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                @stop

                @section('scripts')
                <script>
                    $('#myModal').on('show.bs.modal', function (event) {
                    var wallpaper_id = $(event.relatedTarget).attr("wallpaper-id");
                    var input = $(this).find("#modal-wallpapers-delete-form").attr("action", "/admin/wallpapers/"+wallpaper_id);
                  });
                </script>
                @stop