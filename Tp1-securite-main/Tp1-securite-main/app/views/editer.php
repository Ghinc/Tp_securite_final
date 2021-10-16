<?php include('app/views/layouts/header.php'); ?>

<div class="w3-content w3-padding-large w3-margin-top" >
                <h2 style="font-size: 120%; margin-bottom: 5%;">Modifier votre profil </h2>
               
                <form class="w3-container" method="POST" action='index.php?action=editerProfil'>  
                     
                    <div class="form__field">
                         <label class="w3-text-purple"><b>Nom </b></label>
                        <input class="w3-input w3-border" name="nom" type="text" placeholder="nom" >
                    </div>
                    <div class="form__field">
                        <input class="w3-btn w3-purple" type="submit" value="modifier">
                    </div>

                </form>
                <br>
                <form class="w3-container" method="POST" action='index.php?action=editerProfil'>  

                     <div class="form__field">
                     <label class="w3-text-purple"><b>Prénom</b></label>
                        <input class="w3-input w3-border" name="prenom" type="text" placeholder="Prenom">
                    </div>
                    <div class="form__field">
                        <input class="w3-btn w3-purple" type="submit" value="modifier">
                    </div>

                </form>
                <br>
                <form class="w3-container" method="POST" action='index.php?action=editerProfil'>  
                    
                    <div class="form__field">
                    <label class="w3-text-purple"><b>Mail </b></label>
                        <input class="w3-input w3-border" name="mail" type="text" placeholder="Mail" >
                    </div>
                    <div class="form__field">
                        <input class="w3-btn w3-purple" type="submit" value="modifier">
                    </div>

                </form>
                <br>
                <form class="w3-container" method="POST" action='index.php?action=editerProfil'>  
                    

                    <div class="form__field">
                    <label class="w3-text-purple"><b>Numéro de téléphone </b></label>
                        <input class="w3-input w3-border" name="tel" type="text" placeholder="Numero de Telephone" >
                    </div>

                    <div class="form__field">
                        <input class="w3-btn w3-purple" type="submit" value="modifier">
                    </div>

                </form>
                <br>
                <form class="w3-container" method="POST" action='index.php?action=editerProfil'>  
                    
                    <div class="form__field">
                    <label class="w3-text-purple"><b>Adresse </b></label>
                        <input class="w3-input w3-border" name="adresse" type="text" placeholder="Adresse">
                    </div>
                    
                    <div class="form__field">
                        <input class="w3-btn w3-purple" type="submit" value="modifier">
                    </div>

                </form>
                <br>
                <form class="w3-container" method="POST" action='index.php?action=editerProfil'>  
                    
                    <div class="form__field">
                    <label class="w3-text-purple"><b>Login</b></label>
                        <input class="w3-input w3-border" name="login" type="text" placeholder="Votre Login" >
                    </div>
                    <div class="form__field">
                        <input class="w3-btn w3-purple" type="submit" value="modifier">
                    </div>

                </form>
                <br>
                <form class="w3-container" method="POST" action='index.php?action=editerProfil'>  
                    

                    <div class="form__field">
                    <label class="w3-text-purple"><b>Mot de passe </b></label>
                        <input class="w3-input w3-border" name="password" type="password" placeholder="••••••••••••" >
                    </div>
                    <div class="form__field">
                        <input class="w3-btn w3-purple" type="submit" value="modifier">
                    </div>

                </form>
                <br>
                <form class="w3-container" method="POST" action='index.php?action=editerProfil'>  
                    
                    <div class="form__field">
                        <label class="w3-text-purple"><b>Description </b></label>
                        <input class="w3-input w3-border"name="dsc" type="text" placeholder="description" >
                    </div>
                    <div class="form__field">
                        <input class="w3-btn w3-purple" type="submit" value="modifier"  >
                    </div>
                </form>
              
            
                    

            </div>
        </div>
</div>

</html>