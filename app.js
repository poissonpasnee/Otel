async function loadMessages(){

const res = await fetch("api.php")

const data = await res.json()

const box = document.getElementById("messages")

box.innerHTML=""

data.forEach(m => {

const div = document.createElement("div")

div.className="message"

div.innerText=m.text

box.appendChild(div)

})

}

async function sendMessage(){

const text = document.getElementById("messageInput").value

await fetch("api.php",{
method:"POST",
body:text
})

document.getElementById("messageInput").value=""

loadMessages()

}

setInterval(loadMessages,2000)

loadMessages()