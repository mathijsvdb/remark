@extends("layouts.master")

@section("content")

    <div class="advertising_container">
        <form class="form-horizontal" method="post" action="advertise" role="form">
        {!! csrf_field() !!}
            <h2>Your advertising</h2>
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Information to display</label>
                <div class="col-sm-9">
                    <input type="text" id="title" placeholder="Title" name="title" value="{{ old('title') }}" class="form-control" autofocus required="required">
                    <input type="text" id="url" placeholder="URL" name="url" value="http://" class="form-control" autofocus required="required">
                    <span class="help-block">Example: http://example.com</span>
                    <label for="startDate">Date :</label>
                    <input name="startDate" id="startDate" class="date-picker" />
                </div>

            </div>
        </form>
    </div>

@stop