$(document).ready(function() {
    var $h = $('h1');

    function runIt() {
        $h.animate({
            opacity:"0"
        }, 800, function() {
            $h.removeAttr("style");
            runIt();
        });
    }

    runIt();
});