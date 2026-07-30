$(document).ready(function() {
setTimeout(function () {
    $(".alert-{{ type }}").delay(5000).slideUp(500, function () {
        $(this).alert('close');
    });
}, 1000);
});