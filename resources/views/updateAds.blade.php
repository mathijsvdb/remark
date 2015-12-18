@extends("layouts.master")

@section("content")
    <div class="add-project-page">
        <div class="container">
            <form action="/advertising/update/{{ $oldad->id }}" method="POST" class="add-project-form" role="form" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="form-group has-error">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="text-center">Update your advertisement</h2>
                <div class="form-group">
                    <label for="title" class="control-label">Title</label>
                    <input type="text" id="title" placeholder="Title" name="title" value="{{ $oldad->title }}" class="form-control" autofocus required="required" />
                </div>

                <div class="form-group">
                    <label for="url">Url to website</label>
                    <input type="text" id="url" placeholder="http://" name="url" value="{{ $oldad->url }}" class="form-control" autofocus required="required" />
                </div>

                <div class="form-group">
                    <label for="fileToUpload">Your advertisement</label>

                    <div class="file-upload-container">
                        <div class="file-upload btn btn-default">
                            <span>Upload</span>
                            <input type="file" name="fileToUpload" id="btn-upload" class="upload">
                        </div>
                        <input id="upload-file" placeholder="Choose File" value="{{ $oldad->img }}" disabled="disabled" class="form-control">
                        <span class="error-img"></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block" >update ad</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("btn-upload").onchange = function () {
            document.getElementById("upload-file").value = this.value.replace("C:\\fakepath\\", "");
        };
    </script>
@endsection