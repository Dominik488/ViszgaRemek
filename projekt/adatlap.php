<?php
    session_start();

    print "<hr>" ;

    if(!isset($_SESSION['uid']))
                die( "<script> 
                        alert('Lejárt a munkamanet! Jelentkezz be ismét!')
                        parent.location.href='belepes'

                        
                    </script>" );

    print_r ( $_POST ) ;

    include("kapcsolat.php") ;


	  

	$sorokszama = mysqli_num_rows( mysqli_query( $adb , " 

							SELECT * FROM user 
							WHERE uemail='$_POST[uemail]' 
							AND (ustatusz='A' OR ustatusz='F' OR ustatusz='E') 
                            AND uid!= '$_SESSION[uid]'
	" ) ) ;

	if( $sorokszama>0 )  
		die( "<script> alert('Ez az e-mail cím már használatban van!!') </script>" ) ;


	if( mysqli_num_rows( mysqli_query( $adb , " 

							SELECT * FROM korabbinev 
							WHERE kunick='$_POST[unick]' 
                            AND kuid !='$_SESSION[uid]'
	" ) ) )
		die( "<script> alert('Ez a felhasználónév már foglalt!') </script>" ) ;


	$md5pw = md5( $_POST['upw'] ) ;

    $sorokszama = mysqli_num_rows( mysqli_query( $adb, "
    
						
                            SELECT * FROM user
                            WHERE uid='$_SESSION[uid]' 
                            AND upw ='$md5pw'


				")) ;
                
    if ($sorokszama == 0)
            die("<script>alert('Hibás a megadott jelszavad!')</script>");



    mysqli_query( $adb, "

                            UPDATE user
                            SET   unick  = '$_POST[unick]'  , 
                                  unev   = '$_POST[unev]'   ,
                                  uemail = '$_POST[uemail]' ,
                                  uwmail = '$_POST[uwmail]' ,
                                  uom    = '$_POST[uom]'    

                            WHERE uid    = '$_SESSION[uid]'

            ");
    


    $_SESSION['unick'] = $_POST['unick'];

    
    print(
        "<script>
        
        alert('Az adataidat sikeresen módosítottuk!')
        parent.location.href='http://weisessvagyok.szakdoga.net/kezdolap'

        </script>");
    mysqli_close( $adb ) ;
?>