const webscoketPort = wsPort ? wsPort : 8080,
    conn = new WebSocket('ws://localhost:' + webscoketPort),
    idMessages = 'chatMessages';

conn.onopen = function(e) {
  console.log("Connection established!");
};

conn.onerror = function(e) {
  console.log("Connection fail!");
};

const chatMessages = document.getElementById(idMessages);

conn.onmessage = function(e) {

  chatMessages.value = `${e.data}\n${chatMessages.value}`;
};

const btn = document.getElementById('send');
const input = document.getElementById('message');

btn.addEventListener('click',event => {

  conn.send(input.value);
  event.preventDefault();
});