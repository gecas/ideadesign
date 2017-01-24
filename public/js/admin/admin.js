function addFile() {
var id = $("#file_place").children('div').last().prev('div').attr('id').split('_');
id = parseInt(id[1])+1;
    console.log(id);
    $.ajax({
        url: '/admin/upload',
        type: "POST",
        data: { _token: $('[name="csrf_token"]').attr('content'),id:id },
        success: function (data) {
            $("#file_place").append(data)

        }

    });

}
function deleteFile(id) {
   $('#file_'+id).remove();

}