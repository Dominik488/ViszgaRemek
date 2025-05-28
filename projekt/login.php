<!DOCTYPE html>


    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Bejelentkezés</title>   
        <meta name='description' content='Weiss pszihologus'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='pszihologus.css'>    
    </head>
<body>

    
</div>

    

</div>
<div class='loginFormContainer'>
    <form action='login_ir.php' method=post target='kisablak' class="zformok">
            <!-- Headings for the form -->
            <div class='headingsContainer'>
                <h3>Jelentkezzen be!</h3>
                
            </div>

            <!-- Main container for all inputs -->
            <div class='loginContainer'>
                <!-- Username -->
                <label for='username'>Felhasználónév/Email</label>
                <input  id="forminputok" placeholder='' name='email' required>

                <br><br>

                <!-- Password -->
                <label for='pswrd'>Jelszó</label>
                <input id="forminputok" type='password' placeholder='' name='pw' required>

                <!-- sub container for the checkbox and forgot password link --> 


                <!-- Submit button -->
                <button type='submit' id='loginformgomb'>Belépés</button>

                <!-- Sign up link -->
                <p class='register'>Még nincs regisztrálva? <a href='regisztracio'>Regisztráljon itt!</a></p>
                <!--<p class='forgotpsd'> <a href='#'>Elfelejtettem a jelszavam!</a></p> -->

            </div>

        </form>
    </div>
</body>
</html>
<?php



?>