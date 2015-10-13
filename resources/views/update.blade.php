@extends("layouts.master")

@section("content")

    <h1>Edit your profile</h1>

   	<form method="POST" action="/update">
      {!! csrf_field() !!}

   		<div>
       		<label for="name">Name</label>
        	<input type="name" name="name" value="{{ $user->name }}" class="form-control">
    	</div>

    	<div>
       		<label for="email">E-mail</label>
        	<input type="email" name="email" value="{{ $user->email }}" class="form-control">
    	</div>

    	<div>
        	<input type="hidden" name="id" value="{{ $user->id }}" class="form-control">
    	</div>

    	<button>Submit!</button>

   	</form>
    
@stop