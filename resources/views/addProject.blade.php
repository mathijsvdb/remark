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

    <div class="col-sm-6 col-md-4 col-md-offset-4 content-box">
        <form action="/projects/add" method="post" class="form" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="title">Project title</label><br>
                <input type="text" name="title" style="color:black" value={!! old('title') !!}> <br>
            </div>

            <div class="form-group">
                <label for="body">Project description:</label><br>
                <textarea class="form-control" name="body" rows="3" value={!! old('body') !!}></textarea>
                <br>
            </div>

            <div class="form-group">
            <label for="tags">Add image tags:</label><br>
                <p class="col-xs-5"><input type="checkbox" name="tags" value="web">Web Design</p>
                <p class="col-xs-5"><input type="checkbox" name="tags" value="illustrator">Illustrator</p>
                <p class="col-xs-5"><input type="checkbox" name="tags" value="photoshop">Photoshop</p>
                <p class="col-xs-5"><input type="checkbox" name="tags" value="mobile">Mobile Design</p>
                <p class="col-xs-5"><input type="checkbox" name="tags" value="logo">Logo</p>
                <p class="col-xs-5"><input type="checkbox" name="tags" value="poster">Poster</p>
                <p class="col-xs-5"><input type="checkbox" name="tags" value="material">Material Design</p>
                <p class="col-xs-5"><input type="checkbox" name="tags" value="branding">Branding</p>
            </div>

            <div class="form-group">
                <p class="col-xs-7"><b>Select image to upload:</b></p>
                <input type="file" name="fileToUpload" id="fileToUpload" value={!! old('fileToUpload') !!}>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Add project</button>
            </div>

        </form>
    </div>
@stop