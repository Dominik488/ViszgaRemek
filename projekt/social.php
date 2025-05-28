<?php

    if (!isset($_SESSION['uid'])){
            include("bekellepni.php");
            die();
        }

    if($_SESSION['uosztaly'] == " "){
        die('<script>
        alert("Állíts be osztályt hogy használhasd a csevegő felületet!!");
        parent.location.href="http://weissesvagyok.infy.uk/profil";
        </script>');
    }

?>

<!DOCTYPE html>
<html lang="hu">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Weiss pszihologus">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="social.css">    
        <script src="social.js"></script>
        
    </head>
    <style>


    a.ivlink
    {
	display          : flex           ;
	margin           : 24px 60px      ;
	padding          : 12px 24px      ;
	background-color : #006b52           ;
	border           : solid 2px black ;
	border-radius    : 6px            ;
	color            : #333           ;
	text-decoration  : none           ;
    align-items:center;
    }

    a.ivlink:hover
    {
	background-color : #009B77           ;
	border           : solid 2px #0EB ;
	text-decoration  : none!important ;
    }

    a.ivlink h1 , a.ivlink h2 , a.ivlink h3
    {
	margin           : 0              ;
	color            : white           ;
	font-size        : 1em            ;
    }

    a.ivlink h2
    {
	font-weight      : normal         ;
    }

    a.ivlink img
    {
	
    
	width            : 72px           ;
	border-radius    : 50%            ;
	opacity          : 75%            ;
    }
    
    a.ivlink:hover img
    {
	opacity          : 1              ;
    }

    


</style>
<body>




<div class="chatsContainer">

<button id="wrapBtn"><img src="images/icons8-arrow-48.png" id="wrapBtnPic"></button>

<script>

    const wrapBtn = document.getElementById('wrapBtn');
    const wrapBtnPic = document.getElementById('wrapBtnPic');
    const chatMenu = document.querySelector('.chatsContainer');

    wrapBtn.addEventListener("click", () => {
        wrapBtn.classList.toggle("closed");
        chatMenu.style.transform = wrapBtn.classList.contains('closed') ? 'translateX(0)' : 'translateX(-220px)';
        wrapBtnPic.src = wrapBtn.classList.contains('closed') ? 'images/icons8-arrow-48 (1).png' : 'images/icons8-arrow-48.png';
    });

</script>

<div class="addFriendBtnContainer">
    
        <a class="ivlink" href="osztalytarsak" id="barat"><img src="images/icons8-group-48.png"><h1>Osztálytársak megtekintése</h1></a>
    </div>

<div class="addFriendBtnContainer">
    
        <a class="ivlink" href="barathozzaadas" id="barat"><img src="images/icons8-add-48.png"><h1>Barát hozzáadása</h1></a>
    </div>


<hr>

<div id="chatsFormContainer">

<form action="con.php" method="POST" target="chatTab" class="chatsForm">
    <input type="hidden" name="ffid" value="">
    <input type="hidden" name="ffnick" value="Rendszer">
    <button type="submit" class="ivlink personBtn"">
        <h1>Rendszer</h1>
    </button>
</form>

<?php
$query = mysqli_query($adb, "SELECT * FROM user INNER JOIN friendship ON user.uid = friendship.fuid WHERE ffid = '$_SESSION[uid]' AND fuid != '$_SESSION[uid]'");

while ($users = mysqli_fetch_assoc($query)) {   
    $punick = $users['unick']; 
    $puid = $users['uid'];
    $puoszt = $users['uosztaly'];
    
    echo '
    <form action="con.php" method="POST" target="chatTab" class="chatsForm">
        <input type="hidden" name="ffid" value="'.$puid.'">
        <input type="hidden" name="ffnick" value="'.$punick.'">
        <button type="submit" class="ivlink personBtn" data-uid="'.$puid.'" data-unick="'.$punick.'">
            <h1>'.$punick.' '.$puoszt.'</h1>
        </button>
    </form>
    ';
}
?>




</div>
</div>



</div>  



<?php  

echo '

<div class="chatFormContainer">

    <iframe name="chatTab" id="chatTab" style="overflow-wrap: break-word;">
        
    </iframe>

<script>
document.getElementById("chatTab").onload = function() {
    setTimeout(function() {
        var iframe = document.getElementById("chatTab");
        iframe.contentWindow.scrollTo(0, iframe.contentDocument.body.scrollHeight);
    });
};
</script>

    <script>
  setInterval(function() {
    document.getElementById("chatTab").contentWindow.location.reload();
  }, 900);
</script>
            
<br>
<div class="regContainer" id="chatSendContainer">
         
        <form onsubmit="clearInput()" action="social_ir.php" method="post" target="kisablak">

            <input type="text" placeholder="" id="message" name="message" autocomplete="off" maxlength="2000">

            <input type="hidden" name="realffid" id="realffid" value="">

            <br><br>

            <button type="submit" id="chatformgomb">Küldés</button>

            <!-- Login link -->
            
            </form>

             
        </div>
    
     ';

?>

    

 <script>
document.addEventListener("DOMContentLoaded", () => {
    const realffidInput = document.getElementById("realffid");
    const placeHolder = document.getElementById("message");

    const params = new URLSearchParams(window.location.search);
    const targetUid = params.get("user_id");

    document.querySelectorAll(".personBtn").forEach(button => {
        const uid = button.getAttribute("data-uid");
        const unick = button.getAttribute("data-unick");

        
        button.addEventListener("click", (e) => {
            realffidInput.value = uid;
            const state = {user_id: uid, user_name: unick};
            const url = `?user_id=${uid}`;

            window.history.pushState(state, "", url);
            placeHolder.placeholder = "Küldj üzenetet " + unick + "-nek...";
        });

        if (targetUid && uid === targetUid || targetUid && unick === targetUid) {
            setTimeout(() => {
                button.click();
            }, 0);
        }
        
        
        
    });
});
</script>

</body>
</html>