<form action="/projects/add" method="post">
    {!! csrf_field() !!}

    <label for="title">Project title</label>
    <input type="text" name="title">

    <label for="body">Project description:</label>
    <input type="text" name="body">

    <button type="submit">Add project</button>

</form>