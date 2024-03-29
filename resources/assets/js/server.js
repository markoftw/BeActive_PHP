var io = require("socket.io");
var socket = io.listen(1337, "192.168.1.4");
var people = {};

socket.on("connection", function (client) {
    client.on("join", function(name){
        people[client.id] = name;
        client.emit("update", "You have connected to the server.")
        socket.sockets.emit("update", name + " has joined the server.")
        socket.sockets.emit("update-clients", people)

        console.log(name + ' joined chat')
    });

    client.on("send", function(msg){
        socket.sockets.emit("command", people[client.id], msg);

        console.log('Message received');
    });

    client.on("disconnect", function(){
        socket.sockets.emit("update", people[client.id] + " has left the server.");
        delete people[client.id];
        socket.sockets.emit("update-clients", people);

        console.log('User disconnected');
    });
});