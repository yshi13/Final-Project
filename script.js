$(document).ready(function() {
    $("#start").datepicker();
    $("#end").datepicker();
    $("button").click(function() {
    	var selected = $("#dropdown option:selected").text();
        var start = $("#start").val();
        var end = $("#end").val();
    });
});