@extends("layouts.master")

@section("content")
    <div class="addProject_container_bg"></div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="form-group has-error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-sm-6 col-md-4 col-md-offset-4 content-box add_project_container">
        <form action="/projects/add" method="post" class="form" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="title">Project title</label>
                <input type="text" placeholder="Project titel" name="title" value={!! old('title') !!}>
            </div>

            <div class="form-group">
                <label for="body">Project description:</label>
                <textarea class="form-control" name="body" placeholder="Write details..." rows="3" value={!! old('body') !!}></textarea>
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
                <p class="col-xs-12"><b>Select image to upload (500x500):</b></p>
                <input type="file" name="fileToUpload" id="fileToUpload" value={!! old('fileToUpload') !!}>
            </div>

            <div class="form-group">
                <p class="col-xs-7"><b>Participate in a battle?</b></p><br><br>
                <select class="battles_projadd_subscribe" name="battle">
                    <option value="">No thanks</option>
                    @foreach($battles as $battle)
                    <option value="{{ $battle->id }}">{{ $battle->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default btn_addProject">Add project</button>
            </div>

        </form>
    </div>
@stop