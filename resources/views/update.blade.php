@extends("layouts.master")

@section("content")
	<div id="updateform" style="padding: 45px;">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li class="form-group has-error">{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<h2>Edit profile</h2>

		<form method="POST" action="/update" enctype="multipart/form-data">
			{!! csrf_field() !!}

			<div class="form-group">

				@if($user->image == 'default.jpg')
					<img class="img-circle" id="preview" style="width: 150px; height:150px; padding: 5px; margin-right: auto; margin-left: auto; display: block;background-color: whitesmoke;" src="/assets/images/{!! $user->image !!}" alt="">
				@else
					<img class="img-circle" id="preview" style="width: 150px; height:150px; padding: 5px; margin-right: auto; margin-left: auto; display: block;background-color: whitesmoke;" src="/uploads/profilepictures/{!! $user->image !!}" alt="">
				@endif

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
			<div id="emailpreferences">
				<h4>Email preferences</h4>
				<label for="commentmail">Email on comment</label><br><input type="radio" name="commentmail" id="commentmail_yes" value="commentmail_yes" checked><label for="commentmail_yes" class="updatemaillable"> Mail me when someone comments</label><br>
																	 <input type="radio" name="commentmail" id="commentmail_no" value="commentmail_no"><label for="commentmail_no" class="updatemaillable"> Don't email me when someone comments</label><br>
				<label for="highlightmail">Highlight email</label><br><input type="radio" name="highlightmail" id="highlightmail_weekly" value="highlightmail_weekly" checked><label for="highlightmail_weekly" class="updatemaillable">  Weekly</label><br>
				   												       <input type="radio" name="highlightmail" id="highlightmail_monthly" value="highlightmail_monthly"><label for="highlightmail_monthly" class="updatemaillable"> Monthly</label><br>
				                                                       <input type="radio" name="highlightmail" id="highlightmail_none" value="highlightmail_none"><label for="highlightmail_none" class="updatemaillable"> None</label><br>
			</div>
			<br />

			<div>
				<input type="hidden" name="id" value="{{ $user->id }}" class="form-control">
			</div>


			<button>Submit!</button>

		</form>
	</div>
@stop