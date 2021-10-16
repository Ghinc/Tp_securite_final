<?php include('app/views/layouts/header.php'); ?>


    
               
                <div class="w3-content w3-padding-large w3-margin-top" >
                <h2 style="font-size: 120%; margin-bottom: 5%;">Ajouter un ami </h2>
                <form class="w3-container" method="POST" action="index.php?action=ajouterAmi">  
                    
                     <div class="form__field">
                       <label class="w3-text-purple"><b>mail </b></label>
                        <input name="mail" type="text" placeholder="Mail" >
                    </div>  
                   
                    <div class="form__field">
                        <input class="w3-btn w3-purple" type="submit" value="Demander en ami">
                    </div>

                </a>
            </div>
               
              

         
    </body>
</html>