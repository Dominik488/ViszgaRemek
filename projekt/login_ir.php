<?php

    session_start();    

    print ($_POST);
    
    print "<hr>";

    include("kapcsolat.php");

    $md5pw = md5( $_POST['pw'] ) ;
    
    // $sorokszama = mysqli_num_rows( mysqli_query( $adb , " 

    //                     SELECT * FROM user 
    //                     WHERE ( uemail='$_POST[email]'  OR unick='$_POST[email]' )
    //                     AND     upw   ='$md5pw'
    //                     AND     ustatusz='E' 
    // " ) ) ;
    // if( $sorokszama==1 )  
    //     die( "<script> alert('Fejezd be a regisztrációdat az e-mailben kapott link alapján!') </script>" ) ;


    $user =  mysqli_fetch_array( mysqli_query( $adb , " 

                        SELECT * FROM user 
                        WHERE ( uemail='$_POST[email]'  OR unick='$_POST[email]' OR uwmail='$_POST[email]')
                        AND     upw   ='$md5pw'
                        AND   ( ustatusz='A' OR ustatusz='F' OR ustatusz='D') 
                        
    " ) ) ;

    if( $user['uid']=="" )  
		die( "<script> alert('Hibás belépési adatok!') </script>" ) ;





	$_SESSION['uid']        =  $user['uid']        ;
	$_SESSION['unick']      =  $user['unick']      ;
	$_SESSION['umail']      =  $user['uemail']     ;
    $_SESSION['unev']       =  $user['unev']       ;
    $_SESSION['uosztaly']   =  $user['uosztaly']   ;



	print  "<script>
                
                alert('Sikeresen bejelentkeztél!')
                parent.location.href='kezdolap'
                
            </script>"  ;


    mysqli_close( $adb ) ;


?>