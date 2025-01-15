$(function(){
    setTimeout(function() {
        $("header").css("display", "grid").hide().fadeIn(500);
        $("#loading").fadeOut(500,function(){
        })
        setTimeout(function() {
            $("#container").css("display", "grid").hide().fadeIn(500);
        }, 500);
    }, 500);
});

function redirect(url) {
    $("#container").fadeOut(500,function(){
        $("header").fadeOut(500,function(){
        })
        window.location.href = url;
        return false;
    })
};

function showHidden(e) {
    e.target.parentElement.className = "hidden show";
    setTimeout(function() {
        e.target.parentElement.className = "hidden";
    }, 3000);
}
