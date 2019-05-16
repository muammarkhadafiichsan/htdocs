function startApp() {
 // create websocket client
 var client = new WebSocket("ws://192.168.43.1:8989");
 // onOpen handler
 client.onopen = function (event) { var log = document.getElementById("log");
 log.textContent = log.textContent + "\n" + "Koneksi ke server berhasil";
 };
 // onClose handler
 client.onclose = function (event) {
 var log = document.getElementById("log");
 log.textContent = log.textContent + "\n" + "Koneksi ke server terputus";
 };
 // onError handler
 client.onerror = function (event) {
 var log = document.getElementById("log");
 log.textContent = log.textContent + "\n" + "Koneksi ke server error";
 };
}
window.onload = startApp;
// aksi tombol Send SMS
document.getElementById("send").onclick = function () { // mengambil value no tujuan 
	var to = document.getElementById("to").value;
 // mengambil value isi pesan sms
 var message = document.getElementById("message").value;
 // membuat json
 var json = {
 to: to,
 message: message
 };
 // mengirim ke server via websocket
 client.send(JSON.stringify(json));
}
// onMessage handler
client.onmessage = function (event) { var response = JSON.parse(event.data);
 switch (response.type) { case "success": // sukses mengirim sms ke server break;
 case "error" : // gagal mengirim sms ke server break;
 case "notification" : // laporan status pengiriman sms break;
 case "received" : // menerima sms
 break;
 }
};
switch (response.type) {
 case "success":
 // sukses mengirim sms ke server 
 alert(response.message); break;
 case "error" : // gagal mengirim sms ke server 
 alert(response.message);
 break;
 case "notification" : // laporan status pengiriman sms 
 var log = document.getElementById("log"); if (response.success) {
 log.textContent = log.textContent + "\n" + "Laporan sukses : " + response.message; } else {
 log.textContent = log.textContent + "\n" + "Laporan gagal : " + response.message; } break;
 case "received" : // menerima sms 
 if (confirm("Sms dari " + response.from + " : \n" + response.message + "\n" +
 "Apakah ingin dibalas?")) {
 document.getElementById("to").value = response.from;
 }
 break;
 // aksi tombol Send SMS
document.getElementById("send").onclick = function () { // mengambil value no tujuan 
var to = document.getElementById("to").value; // mengambil value isi pesan sms 
var message = document.getElementById("message").value;
 var splits = to.split(","); if (splits.length == 1) { // bukan broadcast
 // membuat json
 var json = { to: splits[0], message: message
 };
 // mengirim ke server via websocket 
 client.send(JSON.stringify(json));
 } else {
 // broadcast
 // membuat json broadcast
 var json = {
 to: splits, message: message
 };
 // mengirim ke server via websocket 
 client.send(JSON.stringify(json)); }
} 
}