<html>
    <head>
    <link rel="stylesheet" href="pszihologus.css">
    </head>

<?php

    $adb = mysqli_connect( "sql204.infinityfree.com", "if0_38415749", "wbEJgydD4SM", "if0_38415749_wv") ;

    function randomstr()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz' ;
        $randstring = '' ;
        for ($i = 0; $i < 10; $i++)
    {
            $randstring .= $characters[rand(0, strlen($characters))] ;
        }
        return $randstring;
    }
?>
</html>