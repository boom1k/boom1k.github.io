// nejakej random ass anti scroll yk proste proc by jsi to delall??? jo neni to moje kys lol
document.addEventListener("keydown", function(e) {
    if (e.key === "F12" || (e.ctrlKey && e.shiftKey && e.key === "I") || (e.ctrlKey && e.shiftKey && e.key === "C") || (e.ctrlKey && e.key === "u") || (e.ctrlKey && e.key === "s") || (e.ctrlKey && e.key === "p") || (e.ctrlKey && e.key === "g") || (e.ctrlKey && e.key === "f") || (e.ctrlKey && e.key === "o") || (e.ctrlKey && e.key === "j") || (e.ctrlKey && e.key === "h") || (e.ctrlKey && e.key === "d") || (e.ctrlKey && e.key === "+") || (e.ctrlKey && e.key === "-")) {
        e.preventDefault();
    }
});
(function() {
    let SSWZ = function() {
        this.keyScrollHandler = function(e) {
            if (e.ctrlKey) {
                e.preventDefault();
                return false;
            }
        };
    };
    if (window === top) {
        let sswz = new SSWZ();
        window.addEventListener("wheel", sswz.keyScrollHandler, {
            passive: false
        });
    }
})();

// tohle meni title stranky kdyz uz to krades tak zmen 29 msg Maxos a dole mas timeout nebo si udelej variable
document.addEventListener("contextmenu", function(e) {
    e.preventDefault();
});
var msg = "";
msg = "Maxos " + msg;
var position = 0;

function scrolltitle() {
    document.title = msg.substring(position, msg.length) + msg.substring(0, position);
    position++;
    if (position > msg.length) position = 0;
    window.setTimeout(scrolltitle, 1000);
}
//to zapneme ne?
scrolltitle();


//no proste toto mas ze kdyz kliknes na presstoenter element s tim ideckem tak to ma transition a opacity na 0 a pak ti to pusti fajnu songu omg co crazy
function startAudio() {
    var audio = document.getElementById("audio");
    var pressToEnter = document.getElementById("pressToEnter");
    audio.play();
    pressToEnter.style.transition = "opacity 1s ease";
    pressToEnter.style.opacity = 0;
    setTimeout(() => {
        pressToEnter.style.display = "none";
    }, 1000);
}

/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
particlesJS.load('particles-js', 'assets/particles.json', function() {
    console.log('callback - particles.js config loaded');
  });