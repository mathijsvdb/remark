@extends("layouts.master")

@section("content")
	<div class="edit-profile-page">
		<form class="edit-profile-form" method="POST" action="/update" enctype="multipart/form-data">
			<h1 class="text-center">Edit your profile</h1>

			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li class="form-group has-error">{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			{!! csrf_field() !!}

			<div class="text-center">
				@if($user->image == 'default.jpg')
					<img class="img-circle img-profile" id="preview" src="/assets/images/{!! $user->image !!}" alt="">
				@else
					<img class="img-circle img-profile" id="preview" src="/uploads/profilepictures/{!! $user->image !!}" alt="">
				@endif

				<div class="form-group">
					<div class="file-upload-container">
						<div class="file-upload btn btn-default">
							<span>Upload</span>
							<input type="file" name="fileToUpload" id="btn-upload" class="upload" value={!! old('fileToUpload') !!}>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="firstname">Firstname</label>
				<input type="firstname" name="firstname" value="{{ $user->firstname }}" class="form-control">
			</div>

			<div class="form-group">
				<label for="lastname">Lastname</label>
				<input type="lastname" name="lastname" value="{{ $user->lastname }}" class="form-control">
			</div>

			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" name="email" value="{{ $user->email }}" class="form-control">
			</div>

			<h3>About me</h3>
			<hr>

			<div class="form-group">
				<label for="bio">Biography</label>
				<input class="form-control" value="{{ $user->bio }}" name="bio" type="text">
				<p class="help-block">What is so interesting about you?</p>
			</div>

			<div class="form-group">
				<label for="facebook">Facebook URL</label>
				<input placeholder="https://www.facebook.com/johndoe" class="form-control" value="{{ $user->facebook }}" name="facebook" type="text">
			</div>

			<div class="form-group">
				<label for="twitter">Twitter URL</label>
				<input placeholder="https://www.twitter.com/johndoe" class="form-control" value="{{ $user->twitter }}" name="twitter" type="text">
			</div>

			<div class="form-group">
				<label for="website">Website URL</label>
				<input placeholder="http://www.myportfolio.com" class="form-control" value="{{ $user->website }}" name="website" type="text">
			</div>

			<h3>Email preferences</h3>
			<hr>

			<div class="form-group">
                <p><strong>Email on comment</strong></p>
                <div class="checkbox">
                    <label>
                        @if($user->comment_mail == 1)
                            <input type="checkbox" name="commentmail_yes" id="commentmail_yes" value="yes" checked> Mail me when someone comments on my projects.
                        @else
                            <input type="checkbox" name="commentmail_yes" id="commentmail_yes" value="yes"> Mail me when someone comments on my projects.
                        @endif
                    </label>
                </div>
			</div>

            <div class="form-group">
                <p><strong>Highlight email</strong></p>
                <div class="checkbox">
                    <label>
                        @if($user->highlight_mail == 1)
                            <input type="checkbox" name="highlightmail_yes" id="highlightmail_yes" value="yes" checked> Mail me when someone comments on my projects.
                        @else
                            <input type="checkbox" name="highlightmail_yes" id="highlightmail_yes" value="yes" > Mail me when someone comments on my projects.
                        @endif
                    </label>
                </div>
            </div>


            <div>
				<input type="hidden" name="id" value="{{ $user->id }}" class="form-control">
			</div>


			<div class="form-group">
				<button class="btn btn-primary btn-block" type="submit">Save</button>
			</div>

		</form>
	</div>
@stop

@section('scripts')
	<script src="{{ URL::asset('assets/js/script.js') }}"></script>
@stop