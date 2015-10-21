<<<<<<< HEAD
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


=======
@extends("layouts.master")

@section("content")

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="form-group has-error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-sm-6 col-md-4 col-md-offset-4">
        <form action="/projects/add" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="title">Project title</label><br>
                <input type="text" name="title" style="color:black" value={!! old('title') !!}> <br>
            </div>

            <div class="form-group">
                <label for="body">Project description:</label><br>
                <input type="text" name="body" style="color:black" value={!! old('body') !!}><br>
            </div>

            <div class="form-group">
            <label for="tags">Add image tags:</label><br>
                <input type="checkbox" name="tags" value="web">Web Design
                <input type="checkbox" name="tags" value="illustrator">Illustrator
                <input type="checkbox" name="tags" value="photoshop">Photoshop
                <input type="checkbox" name="tags" value="mobile">Mobile Design<br>
                <input type="checkbox" name="tags" value="logo">Logo
                <input type="checkbox" name="tags" value="poster">Poster
                <input type="checkbox" name="tags" value="material">Material Design
                <input type="checkbox" name="tags" value="branding">Branding <br>
            </div>

            <div class="form-group">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload" value={!! old('fileToUpload') !!}>
            </div>

            <div class="form-group">
                <button type="submit">Add project</button>
            </div>

        </form>
    </div>
>>>>>>> a0f2ba32520114a3920ed09b61721d34bc6beb10
@stop