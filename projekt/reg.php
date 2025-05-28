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
<div class="regFormContainer">
    
    <form action='reg_ir.php' method=post target='kisablak' class="zformok">
        <!-- Headings for the form -->
        <div class="headingsContainer">
            <h3>Regisztráció</h3>
            
        </div>

        <!-- Main container for all inputs -->
        <div class="regContainer">
            <!-- Username -->
            <label for="unick">Felhasználónév</label>
            <input id="forminputok" type="text" placeholder="" name="unick" required>

            <!-- Username -->
            <label for="uemail">Email</label>
            <input  id="forminputok" placeholder="" name="uemail" required type='email'>
            <br>
            

            <br>

            <!-- Password -->
            <label for="upw1">Jelszava</label>
            <input id="forminputok" type="password" placeholder="Legalább 8 karakter" name="upw1" required>

            <!-- Password -->
            <label for="upw2">Jelszava mégegyszer</label>
            <input id="forminputok" type="password" placeholder="" name="upw2" required>


            <br><br>

            <!-- sub container for the checkbox and forgot password link -->



            <!-- Submit button -->
            <button type="submit" id='regformgomb'>Regisztráció</button>

            <!-- Login link -->
            <p class="register">Már van fiókja?  <a href="belepes">Jelentkezzen be itt!</a></p>


        </div>

    </form>
</div>
</body>
</html>
<?php



?>