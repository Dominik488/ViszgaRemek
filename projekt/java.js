
function menunyitas(){
    document.getElementById("felsorolas").classList.toggle("open");
}
function menunyitas2(){
    document.getElementById("dropdown-content").classList.toggle("open");
}

function menu(x){
    const dropdownContent= document.querySelector('.dropdown .dropdown-content')
    x.classList.toggle("change")
    if (dropdownContent.style.display == "inline") dropdownContent.style.display = "none"
    else dropdownContent.style.display = "inline"
}

var element = document.getElementById("dropdown-content");
 


