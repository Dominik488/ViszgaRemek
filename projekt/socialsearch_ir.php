<?php

session_start();

include("kapcsolat.php") ;
include("socialfriendsearch.php") ;

mysqli_query( $adb , "

		INSERT INTO friendship (fid ,  fuid  ,         ffid  ,     fstatus)
		VALUES                 (NULL, '$_SESSION[uid]' , '$_POST[ffid]', 'P')


	" ) ;

	mysqli_query( $adb , "

		INSERT INTO friendship (fid ,  fuid  ,         ffid  ,     fstatus)
		VALUES                 (NULL, '$_POST[ffid]' , '$_SESSION[uid]', 'P')


	" ) ;


    print"

    
        <script>
            const ffid = '$_POST[ffid]'
            const state = {user_id: ffid};
            const url = `?user_id=${ffid}`;

            parent.location.href=`social?user_id=$_POST[ffid]`
    </script>
    ";
?>