@extends('layouts.master')


@section('content')
<div class="add-project-container content-box">
    <div class="row">
        <form  action="/projects/add" class="form-horizontal" method="post" role="form">
            {!! csrf_field() !!}
            <h2>Add project</h2>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Project title</label>
                <div class="col-sm-9">
                    <input placeholder="Title" class="form-control" type="text" name="title">
                </div>

                <label for="body" class="col-sm-3 control-label">Project description:</label>
                <div class="col-sm-9">
                    <textarea name="body" placeholder="Give a description of your project" class="form-control" rows="3"></textarea>
                    <span class="help-block">Max. 250 characters</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Add project</button>
                </div>
            </div>

        </form>
    </div>

</div>


@stop