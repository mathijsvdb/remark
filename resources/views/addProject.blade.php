@extends("layouts.master")

@section("content")

    <div class="col-sm-6 col-md-4 col-md-offset-4">
<form action="/projects/add" method="post" role="form">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="title">Project title</label><br>
        <input type="text" name="title"> <br>
    </div>

    <div class="form-group">
        <label for="body">Project description:</label><br>
        <input type="text" name="body"><br>
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
    <input type="file" name="fileToUpload" id="fileToUpload">
    </div>

    <div class="form-group">
        <button type="submit">Add project</button>
    </div>

</form>
</div>



@stop