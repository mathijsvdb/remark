@extends("layouts.master")

@section("content")
	<div id="updateform" style="padding: 45px;">
		<h2>Edit profile</h2>

		<form method="POST" action="/update" enctype="multipart/form-data">
			{!! csrf_field() !!}

			<div class="form-group">
				<img class="img-circle" id="preview" style="width: 150px; height:150px; padding: 5px; margin-right: auto; margin-left: auto; display: block;background-color: whitesmoke;" src="/uploads/profilepictures/{!! $user->image !!}" alt="">
				<input type="file" style="margin-top: 15px;" name="fileToUpload" id="input">
			</div>

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
				<h4>About me</h4>
				<label for="bio">biography</label><input class="form-control" value="{{ $user->bio }}" name="bio" type="text">
			</div>

			<hr />
			<div>
				<h4>Adding links</h4>
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
	</div>
@stop