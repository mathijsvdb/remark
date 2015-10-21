@extends("layouts.master")

@section("content")

    <h1>Edit your profile</h1>

   	<form method="POST" action="/update" enctype="multipart/form-data">
      {!! csrf_field() !!}

   		<div>
       		<label for="firstname">Firstname</label>
        	<input type="firstname" name="firstname" value="{{ $user->firstname }}" class="form-control">
    	</div>

		<div>
			<label for="lastname">Lastname</label>
			<input type="lastname" name="lastname" value="{{ $user->lastname }}" class="form-control">
		</div>

    	<div>
       		<label for="email">E-mail</label>
        	<input type="email" name="email" value="{{ $user->email }}" class="form-control">
    	</div>

		<hr />
		<div>
			<h3>About you</h3>
			<label for="bio">biography</label><input class="form-control" value="{{ $user->bio }}" name="bio" type="text">
		</div>

		<hr />
		<div>
			<h3>Adding links</h3>
			<label for="facebook">Facebook</label><input class="form-control" value="{{ $user->facebook }}" name="facebook" type="text">
			<label for="twitter">Twitter</label><input class="form-control" value="{{ $user->twitter }}" name="twitter" type="text">
			<label for="website">Website</label><input class="form-control" value="{{ $user->website }}" name="website" type="text">
		</div>
		<br />

    	<div>
        	<input type="hidden" name="id" value="{{ $user->id }}" class="form-control">
    	</div>


    	<button>Submit!</button>

   	</form>
    
@stop