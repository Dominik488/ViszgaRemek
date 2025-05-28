<?php

    include("kapcsolat.php") ;

    $users = mysqli_query($adb, "
    
                            SELECT *, TIME_TO_SEC(TIMEDIFF(NOW(), udatum)) AS mikor
                            FROM user
                            WHERE ustrid = '$m2'
                            AND ustatusz = 'E'
    
    
    ")

    if (mysqli_num_rows($users)) {
        $user = mysqli_fetch_array($users);
        if($user['mikor']>15*60){

            mysqli_query($adb, "
    
                            UPDATE user
                            SET ustatusz = 'L'
                            WHERE ustrid = '$m2'
                            AND ustatusz = 'E'
    
    
                        ")                
            die("
                                                
                            <h2> Regisztrációd megerősítésének határideje lejárt!</h2>


                ");
        }
    }
    mysqli_query($adb, "
    
                            UPDATE user
                            SET ustatusz = 'A'
                            WHERE ustrid = '$m2'
                            AND ustatusz = 'E'
    
    
    ")




    mysqli_close( $adb ) ;

    print  "
    
            <h2> Regisztrációd megerősítésre került!</h2>
    
    
            Most már teljes joggal használhatod az oldalt, melyhez
            <a href='http://weisessvagyok.szakdoga.net/belepes'>be kell jelentkezned.</a>
				 
				

			</script>"  ;
?>