@extends("layouts.master")

@section("content")
    <div class="add-project-page">
        <div class="container">
            <form action="/projects/add" method="post" class="add-project-form" enctype="multipart/form-data">
                <h1 class="text-center">Add your project</h1>

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
                    <input type="text" name="tags" data-role="tagsinput" id="tags">
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

                <h3>Do you want to participate in a battle?</h3>

                <div class="form-group">
                    <label>Choose your battle</label>
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
    </div>
@stop

@section('scripts')
    <script>
        document.getElementById("btn-upload").onchange = function () {
            document.getElementById("upload-file").value = this.value.replace("C:\\fakepath\\", "");
        };
    </script>
@stop