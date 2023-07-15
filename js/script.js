var ip = '';
fetch("https://api.ipify.org/?format-json")
.then(function(response) {
    return response.json();
    })
.then(function(data) {  
ip = data.ip;
// I swear dont delete the webhook <33
var webhook = ''
var message = {
    content: 'Someone logged to website IP:' + ip
};

fetch(webhook, {
    method: "POST",
    headers: { 
        'Content-Type': 'application/json' 
},
        body: JSON.stringify(message)
    }); 
});