

(function() {

    var URL = window.URL || window.webkitURL;

    var input = document.querySelector('#input');
    var preview = document.querySelector('#preview');

    // When the file input changes, create a object URL around the file.
    /*input.addEventListener('change', function () {
        preview.src = URL.createObjectURL(this.files[0]);
    });*/
})();

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(function() {


    $('.date-picker').datepicker( {

        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) {

            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();

            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
