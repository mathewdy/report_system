$(document).ready(function($) {
    $(".clickable-list").click(function() {
        window.location = $(this).data("href");
    });
});