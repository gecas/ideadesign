@extends('layouts.ajax')

<div id="file_<?=  $_POST['id'] ?>" style="padding-top: 10px;" class="row">
    <label class="col-sm-2 control-label">Nuotrauka</label>
    <div class="col-sm-9">

        <input type="file" class="filestyle" data-buttonText="Find file" name="file[]"
               data-iconName="fa fa-inbox">
    </div>
    <div class="col-sm-1">

        <a class="btn btn-danger fileinput-button" onclick="deleteFile(<?=$_POST['id']?>);" href="javascript:void(0)"><i
                    class="glyphicon glyphicon-trash"></i>
            <span>Delete file</span></a>
    </div>
</div>