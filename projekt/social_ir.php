<?php
session_start();

include("kapcsolat.php") ;

$query = mysqli_query($adb, "SELECT * from user WHERE uid != '$_SESSION[uid]' AND EXISTS (
    SELECT * FROM friendship WHERE ffid = '$_POST[realffid]'
)");

while ($users = mysqli_fetch_assoc($query)) {   
    
    $punick = $users['unick']; 
    $puid = $_POST['realffid'];
}

$message = trim($_POST['message']);

if($puid == 0){
    die();
}

mysqli_query( $adb , "

		INSERT INTO uzenetek (uzid,  uzuid           ,   uztouid , uztext          , uzdatum,      uzfile) 
		VALUES               (NULL, '$_SESSION[uid]' ,    '$puid','$message',   NOW(), 'teszt.jpg')


	" ) ;

?>