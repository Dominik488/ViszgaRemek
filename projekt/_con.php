<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <script src="social.js"></script>
    <link rel="stylesheet" href="social.css">

    <style>
        /* In case your CSS file doesn't have this, we add a fallback here */
        body {
            font-family: sans-serif;
            overflow-wrap: break-word;
            white-space: normal;
            word-break: break-word; /* fallback for older browsers */
            padding: 10px;
        }

        .message {
            margin-bottom: 8px;
        }
    </style>
<?php  
session_start();

include('kapcsolat.php');
$user_id = $_POST['ffid'];
$user_name = $_POST['ffnick'];

echo ' <input type="hidden" value="'.$user_name.'" id="nameHidden">';

echo '
        <div class="headingsContainer">
            <h3 id="currentchat"></h3>
        </div>
        <br>
        ';

        if ($user_id == ""){
            $query1 = mysqli_query($adb, "SELECT dtext, dclass, dstatus FROM dok WHERE dclass LIKE '%$_SESSION[uosztaly]%'");
            while ($messages = mysqli_fetch_assoc($query1)) {
                if ($messages['dstatus'] == 'I') $uzenet = "Ez a bejegyzés törlésre került!";
                else $uzenet = $messages['dtext'];
                
                echo "Meg lett említve itt:   ". $uzenet ."<hr> <br>";
            }
        }

        else{
            $query1 = mysqli_query($adb, "SELECT * fROM uzenetek INNER JOIN user ON uzenetek.uzuid = user.uid WHERE uzuid = '$_SESSION[uid]' AND uztouid = '$user_id' OR uzuid ='$user_id' AND uztouid = '$_SESSION[uid]'");

            while ($messages = mysqli_fetch_assoc($query1)) {   
                $uzenet = $messages['uztext'];
                $kuldo = $messages['unick'];
                echo $kuldo . ":   " .  $uzenet . "<hr> <br>";
            }
        }
?>
