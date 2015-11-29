@extends("layouts.master")

@section("content")

    <div class="advertising_container content-box row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="form-group has-error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" method="post" action="/advertising/add" role="form" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <h2>Your advertising</h2>
            <p>advertisments will be displayed for 30 days - €50</p>
            <div class="form-group">

                <div class="col-sm-12">
                    <label for="title" class="control-label">Title:</label>
                    <input type="text" id="title" placeholder="Title" name="title" class="form-control" autofocus required="required">
                    <label for="url">Url to website:</label>
                    <input type="text" id="url" placeholder="http://" name="url" class="form-control" autofocus required="required">
                    <span class="help-block">Example: http://example.com</span>
                    <label for="startDate">Date :</label>
                    <input name="data-picker" id="input" type="date" class="date-picker" />

                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="fileToUpload">Image:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <span class="help-block">Image has to be width 200 and height 150</span>
                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Add project</button>
            </div>
            
        </form>
    </div>

@stop