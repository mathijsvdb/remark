/**
 * Created by Marijn on 21/11/15.
 */
$(document).ready(function(){


    $(".notification_checkbox").change(function () {

        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: "http://remark.dev/profile/1/activity",
            async: true,
            data: {
                likes: value // as you are getting in php $_POST['likes'];
            },
            success: function (msg) {
                alert('Success');
                if (msg != 'success') {
                    alert('Fail');
                }
            }
        });
    });
});
