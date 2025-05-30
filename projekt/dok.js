//event div movement
window.onload = function() {
    const div = document.getElementById('dok-event-container')
    const dokContent = document.getElementById('dok-container')

    const contentTopPosition = dokContent.getBoundingClientRect().top + window.scrollY
    div.style.top = contentTopPosition + 'px'

    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY
        let smoothTop = contentTopPosition - scrollPosition

        smoothTop = Math.max(smoothTop, 0)
        div.style.top = smoothTop + 'px'
    })
}

//event date 
document.addEventListener('DOMContentLoaded', function() {
    const eventDate = document.getElementById('event-date')
    const today = new Date().toISOString().split('T')[0]
    const dateInput = document.getElementById('dok-event-date')
    dateInput.setAttribute('min', today)

    document.querySelectorAll('input[name="add-event"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            eventDate.hidden = document.querySelector('input[name="add-event"]:checked').value != "igen"
        })
    })
})

//vote popup
const popup = document.getElementById('voteWindow')

function Vote() {
    popup.showModal()
}

document.getElementById('closeVote').addEventListener('click', function () {
    popup.close()
})

//vote new input
function addVote(){
    const currentName = this.name
    const currentIndex = parseInt(currentName.split('input')[1])
    const nextIndex = currentIndex + 1
    const nextName = 'input' + nextIndex
    
    const nextInput = document.querySelector(`input[name='${nextName}']`)

    if (!nextInput) {
        const newInput = document.createElement('input')
        newInput.type = 'text'
        newInput.maxLength = '26'
        newInput.name = nextName
        newInput.addEventListener('focus', addVote)
        newInput.addEventListener('onclick', addVote)

        document.getElementById('votes-container').appendChild(newInput)
        document.getElementById('votes-container').appendChild(document.createElement('br'))
    }
}

//file display
const fileInput = document.getElementById('post-file');
const fileList = document.getElementById('file-list');
let filesArray = [];

fileInput.addEventListener('change', function(event) {
    const newFiles = Array.from(event.target.files);
    filesArray = [...filesArray, ...newFiles];

    renderFileList();
});

function renderFileList() {
    fileList.innerHTML = '';
    filesArray.forEach((file, index) => {
        const li = document.createElement('li');
        li.textContent = file.name + ' ';
        const removeBtn = document.createElement('span');
        removeBtn.textContent = '❌';
        removeBtn.style.cursor = 'pointer';
        removeBtn.onclick = () => {
            filesArray.splice(index, 1);
            renderFileList();
        };
        li.appendChild(removeBtn);
        fileList.appendChild(li);
    });

    updateFileInput();
}

function updateFileInput() {
    const dataTransfer = new DataTransfer();
    filesArray.forEach(file => dataTransfer.items.add(file));
    fileInput.files = dataTransfer.files;
}

//post management
function Menu(e, postid) {
    let manageMenu = document.getElementById('postManageMenu'+postid)

    if (e.style.border != '1px solid grey') {
        e.style.border = '1px solid grey'
        e.style.backgroundColor = 'rgba(0, 0, 0, 0.2)'
        manageMenu.style.display= 'block'

        document.addEventListener('click', function closeMenu(event) {
            if (!manageMenu.contains(event.target) && event.target !== e) {
                e.style.backgroundColor = ""
                e.style.border = "none"
                manageMenu.style.display = "none"
                document.removeEventListener("click", closeMenu)
            }
        })
    } else {
        e.style.backgroundColor = "";
        e.style.border = "none"
        manageMenu.style.display= "none"
    }
}

const confirm = document.getElementById("confirmWindow")

function confirmWindow(postId, textId) {
    document.getElementById("dpostidInput").value = postId
    document.getElementById("dtextidInput").value = textId
    confirm.showModal()
}
document.getElementById("closeConfirm").addEventListener('click', function () {
    confirm.close()
})

function classButton(){
    let classIC = document.getElementById("classInputContainer")
    
    if (classIC.style.display == "none") classIC.style.display = "inline"
    else classIC.style.display = "none"
}

let classI = document.getElementById("classInput")
let classF = document.getElementById("classFeedback")

classI.addEventListener("input", () => {
    const value = classI.value.trim()
    
    if (value === "") {
        classF.textContent = ""
        return
    }

    const classes = value.split(",").map(c => c.trim().toUpperCase())
    const found = classes.every(c => wordList.includes(c))

    classF.textContent = found ? "✔" : "❌"
    classF.style.color = found ? "green" : "red"
})
