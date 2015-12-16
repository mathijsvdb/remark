@extends("layouts.master")

@section("content")
    <div class="add-project-page">
        <div class="container">
            <form action="/projects/{{$project->id}}/edit" method="post" class="add-project-form" enctype="multipart/form-data">
                <h1 class="text-center">Edit your project</h1>

                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="title">Project title</label>
                    <input class="form-control" type="text" placeholder="Project title" name="title" value={{ $project->title }}>
                </div>

                <div class="form-group">
                    <label for="body">Project description</label>
                    <textarea class="form-control" name="body" placeholder="Write details..." rows="3">{{ $project->body }}</textarea>
                </div>

                <div class="form-group">
                    <label for="tags">Add some tags</label>
                    @if($project->tags)
                        <input type="text" name="tags" data-role="tagsinput" id="tags" value="{{ $project->tags }}">
                    @else
                        <input type="text" name="tags" data-role="tagsinput" id="tags">
                    @endif
                    <p class="help-block">Seperate your tags with a comma (e.g. logo, Illustrator, branding, ...)</p>
                </div>

                <div class="form-group">
                    <label>Select image to upload (500x500)</label>

                    <div class="file-upload-container">
                        <div class="file-upload btn btn-default">
                            <span>Upload</span>
                            <input type="file" name="fileToUpload" id="btn-upload" class="upload" value={!! old('fileToUpload') !!}>
                        </div>
                        <input id="upload-file" placeholder="Choose File" disabled="disabled" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Save project</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        document.getElementById("btn-upload").onchange = function () {
            document.getElementById("upload-file").value = this.value.replace("C:\\fakepath\\", "");
        };
    </script>
@stop