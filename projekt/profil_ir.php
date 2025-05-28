<?php
    session_start();

    print "<hr>" ;

    if(!isset($_SESSION['uid']))
                die( "<script> 
                        alert('Lejárt a munkamanet! Jelentkezz be ismét!')
                        parent.location.href='belepes'

                        
                    </script>" );   

    print_r ( $_POST ) ;
    print   ("<hr>");
    print_r ( $_FILES ) ;


   

    include("kapcsolat.php") ;


	  

	$sorokszama = mysqli_num_rows( mysqli_query( $adb , " 

							SELECT * FROM user 
							WHERE uemail='$_POST[uemail]' 
							AND (ustatusz='A' OR ustatusz='F' OR ustatusz='D') 
                            AND uid!= '$_SESSION[uid]'
	" ) ) ;

	if( $sorokszama>0 )  
		die( "<script> alert('Ez az e-mail cím már használatban van!!') </script>" ) ;

    $_POST["unick"]  = str_replace(" ", "", $_POST["unick"]);
    $_POST["uemail"] = str_replace(" ", "", $_POST["uemail"]);
    $_POST["uwmail"] = str_replace(" ", "", $_POST["uwmail"]);
    $_POST["uosztaly"] = str_replace(" ", "", $_POST["uosztaly"]);
    $_POST["uom"] = str_replace(" ", "", $_POST["uom"]);
    $_POST["unev"] = trim(preg_replace('/[ ]{2,}/', ' ', $_POST['unev']));
    
    
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

    if(strlen($_POST['uosztaly']) > 6 )
            die("<script>alert('Az osztályod neve maximum 6 karakter hosszúságú lehet!')</script>");
            
    if (!empty($_POST['uosztaly'])) {
        $uosztaly = $_POST['uosztaly'];
        
        if (!preg_match('/^\d{1,2}\.[A-Z]+$/i', $uosztaly)) {
            die("<script>alert('Az osztályod évfolyamát és csoportját ponttal kell elválasztanod!')</script>");
        }
        else{
            $_SESSION['uosztaly'] = $uosztaly;
        }
    
    }
    else{
        $_SESSION['uosztaly'] = " ";
    }
            

    if ($sorokszama == 0)
            die("<script>alert('Hibás a megadott jelszavad!')</script>");


    if($_POST['upw2'] != $_POST['upw3'] )
    {
        die("<script>alert('A megadott jelszavaid nem egyeznek!')</script>");
    } 
    if(strlen($_POST['upw2']) < 8 && $_POST['upw2']!="")
    {
        die( "<script> alert('Az új jelszónak min. 8 karakter hosszúságúnak kell lennie!') </script>" ) ;
    }
    if($_POST['upw2'] == $_POST['upw3'] && $_POST['upw2']!="")
    {
        if($_POST['upw'] == $_POST['upw2']){
            die( "<script> alert('Az új jelszó nem egyezhet a régi jelszóval!') </script>" ) ;
        }
        else{
        $md5pw = md5( $_POST['upw2'] ) ;
        mysqli_query( $adb, "

                            UPDATE user
                            SET   upw            = '$md5pw'
                            WHERE uid    = '$_SESSION[uid]'

            ");
        }
    }


    
    
    $weisstag = "@wm-iskola.hu";
    if(trim($_POST['uwmail']) != "") {

        $weissemail = mysqli_num_rows( mysqli_query( $adb , " 

                                SELECT * FROM user 
                                WHERE uwmailtag = '$_POST[uwmail]' 
                                AND (ustatusz='A' OR ustatusz='F' OR ustatusz='D') 
                                AND uid != '$_SESSION[uid]'
        " ) ) ;

        if( $weissemail > 0) die("<script>alert('Ezzel a weisses email címmel már van megerősített fiók!')</script>");
    }

    else mysqli_query( $adb, "

                            UPDATE user
                            SET   unick                  = '$_POST[unick]'            , 
                                  unev                   = '$_POST[unev]'             ,
                                  uemail                 = '$_POST[uemail]'           ,
                                  uwmailtag              = '$_POST[uwmail]'           ,
                                  uwmail                 = '$_POST[uwmail]$weisstag'  ,
                                  uosztaly               = '$_POST[uosztaly])'         ,
                                  uom                    = '$_POST[uom]'

                            WHERE uid    = '$_SESSION[uid]'

            ");

    if($_POST['uwmail'] == ""){ 
    
    
            mysqli_query( $adb, "

                            UPDATE user
                            SET   unick                  = '$_POST[unick]'            , 
                                  unev                   = '$_POST[unev]'             ,
                                  uemail                 = '$_POST[uemail]'           ,
                                  uwmailtag              = '$_POST[uwmail]'           ,
                                  uwmail                 = ''                         ,
                                  uosztaly               = '$_POST[uosztaly]'         ,
                                  uom                    = '$_POST[uom]'

                            WHERE uid    = '$_SESSION[uid]'

            ");
    }
    
    else    mysqli_query( $adb, "

                            UPDATE user
                            SET   unick                  = '$_POST[unick]'            , 
                                  unev                   = '$_POST[unev]'             ,
                                  uemail                 = '$_POST[uemail]'           ,
                                  uwmailtag              = '$_POST[uwmail]'           ,
                                  uwmail                 = '$_POST[uwmail]$weisstag'  ,
                                  uosztaly               = '" . strtoupper($_POST['uosztaly']) . "' ,
                                  uom                    = '$_POST[uom]'

                            WHERE uid    = '$_SESSION[uid]'

            ");

    



    $sorokszama = mysqli_num_rows( mysqli_query( $adb, "
    
						
                            SELECT kunick FROM korabbinev
                            WHERE kuid !='$_SESSION[uid]' 
                        


    ")) ;
    if($_SESSION['unick'] != $_POST['unick']){
           
                mysqli_query( $adb , "

                INSERT INTO korabbinev ( kid  ,  kuid           ,         kunick      , kdatum , kstatusz) 
                VALUES                 ( NULL , '$_SESSION[uid]',      '$_POST[unick]', NOW()  , ''      )


                " );
                
            }
            

    $_SESSION['unick'] = $_POST['unick'];

    $kep = $_FILES['uprofkep'];
    if($kep['name'] != ""){

        $ujkepnev = $_SESSION['uid'] . "_" . date("ymdHis");
        if($kep['type'] == "image/jpeg")$ujkepnev .= ".jpg"; else
        if($kep['type'] == "image/png")$ujkepnev .= ".png";  else
        die("<script>alert('A kép csak JPG vagy PNG lehet!')</script>");
        move_uploaded_file( $kep['tmp_name'] , "./profilkepek/" . $ujkepnev);
        
        mysqli_query( $adb, "

                            UPDATE user
                            SET   uprofkepnev            = '$ujkepnev',
                                  uprofkep_eredetinev    = '$kep[name]'

                            WHERE uid    = '$_SESSION[uid]'

            ");
    } 
    




   

   
    
    print(
        "<script>
        
        alert('Az adataidat sikeresen módosítottuk!')
        parent.location.href='profil'
      

        </script>");
    mysqli_close( $adb ) ;
?>