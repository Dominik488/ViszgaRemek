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
	background-color : #DDE           ;
	border           : solid 2px #097 ;
	border-radius    : 6px            ;
	color            : #333           ;
	text-decoration  : none           ;
    align-items:center;
    }

    a.ivlink:hover
    {
	background-color : #EEF           ;
	border           : solid 2px #0EB ;
	text-decoration  : none!important ;
    }

    a.ivlink h1 , a.ivlink h2 , a.ivlink h3
    {
	margin           : 0              ;
	color            : #555           ;
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

    #backToChatsBtn{
            
        }

    @media screen and (max-width: 1200px){
        #backToChatsBtn{
            width: 500px; 
            left: 100px; 
            position: relative;
        }
    }

</style>
<body>






<div class="addFriendBtnContainer">

    <div id="backToChatsBtn">
        <a class="ivlink" href="social"><img src="images/icons8-back-arrow-48.png"><h1>Beszélgetések</h1></a>
    </div>
</div><br><br><br><br><br><br><br><br><br>

<div class="socialSearchBarContainer">
    <input type="search" id="social-searchbar" placeholder="Keresés..." oninput="searchResult()">
</div>

<script>
function searchResult() {
    const query = document.getElementById("social-searchbar").value.toLowerCase();
    const people = document.querySelectorAll(".personForm");

    people.forEach(person => {
        const name = person.getAttribute("data-name");
        if (name.includes(query)) {
            person.style.display = "block";
        } else {
            person.style.display = "none";
        }
    });
}
</script>
<div class="userSearchContainer">

<div id="peopleDiv">


<?php
$query = mysqli_query($adb, "SELECT * from user WHERE uid != '$_SESSION[uid]' AND NOT EXISTS (
    SELECT * FROM friendship WHERE ffid = uid AND fuid = '$_SESSION[uid]'
)");



while ($users = mysqli_fetch_assoc($query)) {   
    $punick = $users['unick']; 
    $puid = $users['uid'];
    $puoszt = $users['uosztaly'];

    echo '
    <form action="socialsearch_ir.php" method="POST" target="kisablak" class="personForm" data-name="'.strtolower($punick).'">
        <input type="hidden" name="ffid" value="'.$puid.'">
        <input type="hidden" name="ffnick" value="'.$punick.'">
        <button type="submit" class="ivlink personBtn" data-uid="'.$puid.'" data-unick="'.$punick.'">
            <h1>'.$punick.' '.$puoszt.'</h1>
        </button>
    </form>
    ';
}

?>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const params = new URLSearchParams(window.location.search);
    const targetUid = params.get("user_id");

    document.querySelectorAll(".personBtn").forEach(button => {
        const uid = button.getAttribute("data-uid");
        const unick = button.getAttribute("data-unick");

        
        button.addEventListener("click", (e) => {
            realffidInput.value = uid;
            const state = {user_id: uid, user_name: unick};
            const url = `?user_id=${uid}`;

            
            
        });

        
        if (targetUid && uid === targetUid || targetUid && unick === targetUid) {
            setTimeout(() => {
                button.click();
            }, 0);
        }
        if(uid != targetUid && targetUid != null){
            parent.location.href=`social?user_id=${targetUid}`
        }
        
    });
});
</script>

</div>
</div>

</body>
</html>