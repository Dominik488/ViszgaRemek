

<!DOCTYPE html>
<?php
  session_start();
  include('kapcsolat.php');

?>  
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WEISSes vagyok</title>
        <meta name="description" content="Weiss pszihologus">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="pszihologus.css">
        <script src="java.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
    </head>
    <body>
      <div id="fejlec">
        <a href="kezdolap" id="cimerkep" title="WEISSesvagyok.hu - főoldal">
	      <img src="images/logo.png" alt="WEISSesvagyok.hu">
	      </a>

	    <div id="menu">
          
            <div id="felsorolas">
              
                <a href="meresek"> MÉRÉSEK </a>  <!-- digit. okt. , TE   -->
                <a href="tesztek"> TESZTEK </a>  <!-- személyiségtesztek -->
                <a href="portrek"> PORTRÉK </a>  <!-- személyiségtesztek -->
                <a href="palyaiv"> PÁLYAÍV </a>  <!-- ... ... ... ...    -->
                <?php
                if(isset($_SESSION['uid']))
                  {
                    print '
                    <div class="dropdown">

                    <div class="mcontainer" onclick="menu(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                            
                    </div>

                      <div class="dropdown-content">
                        <a href="pszichologus">Pszichológus</a>
                        <a href="adokveszek">Adok-Veszek</a>
                        <a href="social">Social</a>
                        <a href="dok">DÖK</a> 
                         
                         
                        
                       
                        
                       
                        
                        
                          
                        
                        
                      </div>
                   
                    </div> 
                     
                    ';
                  }
                ?> 
                     
                <div id="belepes">
                  <?php 
                      
                  if(!isset($_SESSION['uid']))
                  {
                    print '<a href="belepes"> <button type="button" id="belepesgomb" ></button></a>' ; //print "<a href='belepes'> BELÉPÉS </a>" ;
                  }
                  else
                  {
                    
                    $user = mysqli_fetch_array(mysqli_query($adb, "SELECT * FROM user WHERE uid='$_SESSION[uid]'"));  
                    if($user['uprofkepnev'] != "") $profilkep = 'profilkepek/'.$user['uprofkepnev'] ;
                    else                            $profilkep = "https://qph.cf2.quoracdn.net/main-qimg-f32f85d21d59a5540948c3bfbce52e68";
                    echo "
                          <a href='profil'> $_SESSION[unick] </a>
                          <img  src='$profilkep' id='profilkep'>";
                          //print "<a href='index.php'>. "$user['unick']" . </a>" ;
                    
                    print"
                      
                        <a href='javascript:' onclick='kisablak.location.href=\"logout.php\"'><button type='button' id='kilepesgomb'></button></a>
                        


                        ";
                  } 
                    ?>
              </div>
            
              
            </div>
          <button type="button" id="openmenu" onclick="menunyitas()"></button>
        
          
	    </div>
      
  
   

    
   


<div>
<?php


  $m1 = $_GET['m1'];  

    if( !isset( $_SESSION['uid'] ) )
    {
    if( $m1 == ""            )        include( "kezdolap.php"   ) ; else
    if( $m1 == "kezdolap"    )        include( "kezdolap.php"   ) ; else
    if( $m1 == "belepes"     )        include( "login.php"      ) ; else
    if( $m1 == "regisztracio")        include( "reg.php"        ) ; else
    if( $m1 == "pszichologus")        include( "bekellepni.php" ) ; else
    if( $m1 == "belsolap"    )        include( "bekellepni.php" ) ; else
    if( $m1 == "meresek"     )        include( "meresek.php"    ) ; else
    if( $m1 == "tesztek"     )        include( "tesztek.php"    ) ; else
    if( $m1 == "portrek"     )        include( "portrek.php"    ) ; else
    if( $m1 == "megerosites" )        include( "reg_confirm.php") ; else
    if( $m1 == "palyaiv"     )        include( "palyaiv.php"    ) ; else
                                      include( "404.php"        ) ;
    }
    else
    {
    if( $m1 == ""                  )        include( "belsolap.php"           ) ; else
    if( $m1 == "kezdolap"          )        include( "belsolap.php"           ) ; else
    if( $m1 == "idopontfoglalas"   )        include( "idopontfoglalas.php"    ) ; else
    if( $m1 == "pszichologus"      )        include( "pszichologus.php"       ) ; else
    if( $m1 == "profil"            )        include( "profil.php"             ) ; else
    if( $m1 == "meresek"           )        include( "meresek.php"            ) ; else
    if( $m1 == "tesztek"           )        include( "tesztek.php"            ) ; else
    if( $m1 == "portrek"           )        include( "portrek.php"            ) ; else
    if( $m1 == "palyaiv"           )        include( "palyaiv.php"            ) ; else
    if( $m1 == "social"            )        include( "social.php"             ) ; else
    if( $m1 == "barathozzaadas"    )        include( "socialfriendsearch.php" ) ; else
    if( $m1 == "osztalytarsak"     )        include( "osztalytars.php"        ) ; else
    if( $m1 == "index"             )        include( "kezdolap.php"           ) ; else
    if( $m1 == "dok"               )        include( "dok.php"                ) ; else
    if( $m1 == "adokveszek"        )        include( "adokveszek.php"         ) ; else
    if( $m1 == "feltoltes"         )        include( "feltoltes.php"          ) ; else
    if( $m1 == "kedvencek"         )        include( "kedvenc.php"            ) ; else
    if( $m1 == "sajathirdetes"     )        include( "sajathirdetes.php"      ) ; else
    if( $m1 == "termek"            )        include( "termek_reszletek.php"   ) ; else
                                            include( "404.php"                ) ;
    }




    
    
?>
</div>

<iframe name='kisablak' id="kisablak"></iframe>
 

  </body>
</html>