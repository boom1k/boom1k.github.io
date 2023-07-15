var ip = '';
fetch("https://api.ipify.org/?format-json")
.then(function(response) {
    return response.json();
    })
.then(function(data) {  
ip = data.ip;
// I swear dont delete the webhook <33
var webhook = 'https://discord.com/api/webhooks/1129724428192841748/rUo7fRluQV5HdQi9XFTW0YX47scfjCHN5eTfvz8dAOeOyA_DI7P3UvXn242qLV5BKwAH'
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