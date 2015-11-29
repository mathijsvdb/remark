@extends("layouts.master")

@section("content")
    <script type="text/javascript" src="https://js.stripe.com/v1/"></script>

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
        <form action="/advertising/add" method="POST" id="payment-form" class="form-horizontal" role="form" enctype="multipart/form-data">
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




                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_uJfH5C7V9YeBhsIhZ2LB6edn"
                        data-image="/img/documentation/checkout/marketplace.png"
                        data-name="Pay add"
                        data-description="2 widgets"
                        data-currency="eur"
                        data-amount="5000"
                        data-locale="auto">
                </script>

            
        </form>
    </div>


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
        });
    </script>
@stop