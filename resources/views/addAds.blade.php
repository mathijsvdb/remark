@extends("layouts.master")

@section("content")
    <script type="text/javascript" src="https://js.stripe.com/v1/"></script>

    <div class="add-project-page">
        <div class="container">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="form-group has-error">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/advertising/add" method="POST" class="add-project-form" role="form" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <h1 class="text-center">Add your advertisement</h1>
                <p class="text-center">advertisements will be displayed for 30 days - €50</p>
                <div class="form-group">
                    <label for="title" class="control-label">Title</label>
                    <input type="text" id="title" placeholder="Title" name="title" class="form-control" autofocus required="required" />
                </div>

                <div class="form-group">
                    <label for="url">Url to website</label>
                    <input type="text" id="url" placeholder="http://" name="url" class="form-control" autofocus required="required" />
                    <span class="help-block">Please paste your full URL (e.g. http://www.yourwebsite.com</span>
                </div>

                <div class="form-group">
                    <label for="startDate">Date :</label>
                    <input name="data-picker" id="input" type="date" class="date-picker" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="fileToUpload">Your advertisement</label>

                    <div class="file-upload-container">
                        <div class="file-upload btn btn-default">
                            <span>Upload</span>
                            <input type="file" name="fileToUpload" id="btn-upload" class="upload">
                        </div>
                        <input id="upload-file" placeholder="Choose File" disabled="disabled" class="form-control">
                        <span class="error-img"></span>
                    </div>
                </div>

                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_uJfH5C7V9YeBhsIhZ2LB6edn"
                    data-image="/img/documentation/checkout/marketplace.png"
                    data-name="Pay add"
                    data-description="30 days = 50€"
                    data-currency="eur"
                    data-amount="5000"
                    data-locale="auto">
                </script>
            </form>
        </div>
    </div>
@stop


@section('scripts')
    <script>
        Stripe.setPublishableKey('pk_test_uJfH5C7V9YeBhsIhZ2LB6edn');
        function stripeResponseHandler(status, response) {
            if (response.error) {
                // re-enable the submit button
                $('.submit-button').removeAttr("disabled");
            } else {
                var form$ = $("#payment-form");
                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                // and submit
                form$.get(0).submit();
            }
        }

        $(document).ready(function() {
            $("#payment-form").submit(function(event) {
                // disable the submit button to prevent repeated clicks
                $('.submit-button').attr("disabled", "disabled");
                // createToken returns immediately - the supplied callback submits the form if there are no errors
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
                return false; // submit from callback
            });

            var _URL = window.URL || window.webkitURL;

            $("#btn-upload").change(function(e) {

                var image, file;

                if ((file = this.files[0])) {

                    image = new Image();

                    image.onload = function() {
                        if(!(this.width == 200 && this.height == 150)){
                            $('.error-img').html('Image has to be 200x150!').css('color', 'red');
                            $("#upload-file").replaceWith($("#upload-file").val('').clone(true));
                            $("#btn-upload").replaceWith($("#btn-upload").val('').clone(true));
                        } else {
                            $('.error-img').html('');
                        }
                    };

                    image.src = _URL.createObjectURL(file);


                }

            });
        });
    </script>

    <script>
        document.getElementById("btn-upload").onchange = function () {
            document.getElementById("upload-file").value = this.value.replace("C:\\fakepath\\", "");
        };
    </script>
@stop