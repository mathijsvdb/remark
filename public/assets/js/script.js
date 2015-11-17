//search function

$("#searchonfrontpage").submit(function(e){
    e.preventDefault()

    var whattosearch = $("#searchFRONT").val();
    console.log("searching... " + whattosearch + ".");

    $.ajax({
        type: "POST",
        //url: window.location,
        url: "/",   // This is what I have updated
        data: { whattosearch: whattosearch },
        success : function(data){
            console.log(data);
        }
    });

});

(function() {

    var URL = window.URL || window.webkitURL;

    var input = document.querySelector('#input');
    var preview = document.querySelector('#preview');

    // When the file input changes, create a object URL around the file.
    input.addEventListener('change', function () {
        preview.src = URL.createObjectURL(this.files[0]);
    });
})();

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

