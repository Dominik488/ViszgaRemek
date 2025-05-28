<?php


    print "<hr>" ;

    if( $_POST['uemail']=="" )  
		die( "<script> alert('Nem adtad meg az e-mail címed!') </script>" ) ;

    if( strlen($_POST['upw1']) < 8 )  
		die( "<script> alert('A jelszónak min. 8 karakter hosszúságúnak kell lennie!') </script>" ) ;

    if( $_POST['upw1']!=$_POST['upw2'] )  
		die( "<script> alert('Nem egyeznek a jelszavaid!') </script>" ) ;

	

    print_r ( $_POST ) ;

    include("kapcsolat.php") ;


	mysqli_query($adb, "
    
						UPDATE user
						SET ustatusz   = 'L'
						WHERE ustatusz = 'E'
						AND TIME_TO_SEC(TIMEDIFF(NOW(), udatum)) > 18*60


				")  ;              

	$sorokszama = mysqli_num_rows( mysqli_query( $adb , " 

							SELECT * FROM user 
							WHERE uemail='$_POST[uemail]' 
							AND (ustatusz='A' OR ustatusz='F' OR ustatusz='E') 
	" ) ) ;

	if( $sorokszama>0 )  
		die( "<script> alert('Ezzel az e-mail címmel már regisztráltál!') </script>" ) ;

    $_POST["unick"] = str_replace(" ", "", $_POST["unick"]);
    
	if( mysqli_num_rows( mysqli_query( $adb , " 

							SELECT * FROM korabbinev 
							WHERE kunick='$_POST[unick]' 
	" ) ) )
		die( "<script> alert('Ez a felhasználónév már foglalt!') </script>" ) ;


	$md5pw = md5( $_POST['upw1'] ) ;

	$strid = randomstr(10) ;

	mysqli_query( $adb , "

		INSERT INTO user (uid ,  ustrid  ,         unick  ,     upw ,         unev    , uwmail,         uemail  , 	      uom   , udatum,  uip , ustatusz, ukomment) 
		VALUES           (NULL, '$strid' , '$_POST[unick]', '$md5pw', '$_POST[unev]'  , ''    , '$_POST[uemail]', '$_POST[uom]' , NOW() , '$ip', 'A'     , ''      )


	" ) ;
	
	$useruid = mysqli_fetch_array(mysqli_query($adb, "
	
							SELECT uid FROM user
							WHERE uemail = '$_POST[uemail]'

	"));

	

	mysqli_query( $adb , "

		INSERT INTO korabbinev (kid  ,  kuid     ,         		 kunick , kdatum , kstatusz) 
		VALUES                 (NULL ,  '$useruid[0]' ,  '$_POST[unick]', NOW()  , ''      )


	");

	
	
	$uzenet = "Kedves szöveg.... https://weissesvagyok.hu/regisztracio-megerosites/" . $strid . "

	" ;


//	mail( $_POST['uemail'] , "Regisztráció megerősítése" , $uzenet , "From:ne-valaszolj@weissesvagyok.hu" ) ;


	print  "<script> 

				alert('Regisztrációd sikeresen megtörtént.') 
				parent.location.href='belepes'

			</script>"  ;


    mysqli_close( $adb ) ;
?>