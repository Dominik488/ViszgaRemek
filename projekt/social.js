function updateChat(event, puid, punick) {
    event.preventDefault(); 

    let chatTitle = document.getElementById("currentchat");
    if (!chatTitle) {
        console.error("Element #currentchat not found!");
        return;
    }

    chatTitle.innerText = punick; 
}

function clearInput() {
    document.getElementById("chatTab").contentWindow.location.reload();
    setTimeout(() => {
        document.getElementById("message").value = "";
        
    }, 50);
}


addEventListener("load", function(){
    const iframe = document.querySelector('chatTab');
    if (iframe && iframe.contentWindow && iframe.contentDocument?.body) {
    iframe.contentWindow.scrollTo(0, iframe.contentDocument.body.scrollHeight);
    }
    const punick = document.getElementById("nameHidden").value;
    let chatTitle = document.getElementById("currentchat");
    chatTitle.innerText = punick;
})
