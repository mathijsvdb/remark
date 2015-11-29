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

    <div class="advertising_container">
        <form class="form-horizontal" method="post" action="advertise" role="form">
            {!! csrf_field() !!}
            <h2>Your advertising</h2>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Information to display</label>
                <div class="col-sm-9">
                    <input type="text" id="title" placeholder="Title" name="title" class="form-control" autofocus required="required">
                    <input type="text" id="url" placeholder="http://" name="url" class="form-control" autofocus required="required">
                    <span class="help-block">Example: http://example.com</span>
                    <label for="startDate">Date :</label>
                    <input name="startDate" id="startDate" class="date-picker" />


                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-9">
                    <label for="inputFileupload">Advertising image:</label>
                    <input type="file" style="margin-top: 15px;" name="fileToUpload" id="inputFileupload">
                    <span class="help-block">Image has to be width 200 and height 150</span>
                </div>

            </div>
            
        </form>
    </div>

@stop