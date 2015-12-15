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
                <input class="form-control" type="text" placeholder="Project titel" name="title" value={!! old('title') !!}>
            </div>

            <div class="form-group">
                <label for="body">Project description</label>
                <textarea class="form-control" name="body" placeholder="Write details..." rows="3" value={!! old('body') !!}></textarea>
                <br>
            </div>

            <div class="form-group">
                <label for="tags">Add some tags</label>
                <input type="text" name="tags" class="form-control" value="" data-role="tagsinput">
                <p class="help-block">Seperate your tags with a comma (e.g. logo, Illustrator, branding, ...)</p>
            </div>

            <div class="form-group">
                <label>Select image to upload (500x500)</label>
                <input type="file" name="fileToUpload" id="fileToUpload" value={!! old('fileToUpload') !!}>
            </div>

            <div class="form-group">
                <label>Participate in a battle?</label>
                <select class="form-control battles_projadd_subscribe" name="battle">
                    <option value="">No thanks</option>
                    @foreach($battles as $battle)
                    <option value="{{ $battle->id }}">{{ $battle->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Add project</button>
            </div>
        </form>
    </div>
@stop