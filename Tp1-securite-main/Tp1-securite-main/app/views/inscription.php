<!DOCTYPE html>
<html lang="fr">
    <head>
    <link href="public/css/style.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Page d'inscription</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

      
    </head>

    <body class="align">
        <div class="grid align__item">
            <div class="register">
                <div class = "logo">
                    <img src=public/img/index.png alt="logo" width="50%" height="50%" ></img>
                </div>
        
                <h2 style="font-size: 120%; margin-bottom: 10%;">Inscrivez vous </h2>
               
                <form method="POST" action='index.php?action=inscription'>  
                     
                    <div class="form__field">
                        <input name="nom" type="text" placeholder="nom" >
                    </div>

                     <div class="form__field">
                        <input name="prenom" type="text" placeholder="Prenom">
                    </div>

                    <div class="form__field">
                        <input name="mail" type="text" placeholder="Mail" >
                    </div>

                    <div class="form__field">
                        <input name="tel" type="text" placeholder="Numero de Telephone" >
                    </div>

                    <div class="form__field">
                        <input name="adresse" type="text" placeholder="Adresse">
                    </div>
                    
                    <div class="form__field">
                        <input name="login" type="text" placeholder="Votre Login" >
                    </div>

                    <div class="form__field">
                        <input name="password" type="password" placeholder="••••••••••••" >
                    </div>

                    <div class="form__field">
                        <input name="dsc" type="text" placeholder="description" >
                    </div>

                    <div class="form__field">
                        <input type="submit" value="inscription">
                    </div>

                </form>
            </div>
        </div>
    </body>
</html>