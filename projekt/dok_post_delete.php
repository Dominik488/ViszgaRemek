<?php
    include("kapcsolat.php");

    $dpostid = mysqli_real_escape_string($adb, $_POST['dpostid']);
    $dtextid = mysqli_real_escape_string($adb, $_POST['dtextid']);

    mysqli_query($adb, "UPDATE dok SET dstatus='I' WHERE dpostid='$dpostid' AND dtextid='$dtextid'");
    
    print("<script>setTimeout(function() {window.parent.location.reload()}, 100)</script>");
?>
