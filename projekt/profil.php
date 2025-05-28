<!DOCTYPE html>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bejelentkezés</title>   
        <meta name="description" content="Weiss pszihologus">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="pszihologus.css">
        
    </head>
<body>

    
</div>

   

</div>

<?php

    $user = mysqli_fetch_array(mysqli_query($adb, "

                        SELECT * FROM user WHERE uid = '$_SESSION[uid]'

    "));



?>
<div class="profilFormContainer">
  <form action="profil_ir.php" method="post" target="kisablak" id="profilform" enctype="multipart/form-data">
    <div class="mainContainer">
      <div class="fejlecContainer">
        <h3>Profil adatlap</h3>
      </div>

      <div class="profil-kep" id="a">
        <h1 class="upload-icon">
          <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
        </h1>
        <input class="file-uploader" type="file" onchange="upload()" accept="image/*" name="uprofkep" />
      </div>

      <div id="nevekcim"><h2>NEVEK</h2></div>
      <div id="nevekinput">
        <input class="szinezendok" id="forminputok" type="text" placeholder="Felhasználónév" name="unick" required value="<?=$_SESSION['unick'];?>" />
        <input class="szinezendok" id="forminputok" type="text" placeholder="Teljes név" name="unev" value="<?=$user['unev'];?>" />
      </div>

      <div id="elerhetosegekcim"><h2>KONTAKTOK</h2></div>
      <div id="elerhetosegekinput">
        <input class="szinezendok" id="forminputok" type="email" placeholder="Email" name="uemail" value="<?=$user['uemail'];?>" />
        <p>
          <input class="szinezendok" id="forminputok" type="text" placeholder="vezeteknev.keresztnev" name="uwmail" value="<?=$user['uwmailtag'];?>" />
          @wm-iskola.hu
        </p>
        <input class="szinezendok" id="forminputok" type="text" placeholder="Osztály" name="uosztaly" value="<?=$user['uosztaly'];?>" style="text-transform: uppercase" />
      </div>

      <div id="azonositokcim"><h2>AZONOSÍTÓK</h2></div>
      <div id="azonositokinput">
        <input class="szinezendok" id="forminputok" type="text" placeholder="OM azonosító" name="uom" value="<?=$user['uom'];?>" />
        <p>
          <input class="neszinezd" id="forminputok" type="password" name="upw" required placeholder="Jelszava" />
          <button type="button" id="modositogomb">Módosítás</button>
        </p>
        <input id="forminputok" class="ujjelszoinput" type="password" name="upw2" placeholder="Új jelszava" />
        <input id="forminputok" class="ujjelszoinput" type="password" name="upw3" placeholder="Új jelszava mégegyszer" />
      </div>
    </div>

    <button type="submit" id="profilformgomb">Módosítások mentése</button>
  </form>
</div>
<script src="https://use.fontawesome.com/fe459689b4.js"></script>
<script src="profilkep.js"></script>
<script src="jelszovaltas.js"></script>
<script src="valtozas.js"></script>
<?php
    if($user['uprofkepnev'] != "")
    {
        print("<script>
                document.getElementById('a').style.backgroundImage = 'url(/profilkepek/$user[uprofkepnev])'   
        
                </script>
            ");
    } 
    else
    {
        print("<script>
                document.getElementById('a').style.backgroundImage = 'url(https://qph.cf2.quoracdn.net/main-qimg-f32f85d21d59a5540948c3bfbce52e68)'   
        
                </script>
            ");
    };

    
?>
</body>
</html>
