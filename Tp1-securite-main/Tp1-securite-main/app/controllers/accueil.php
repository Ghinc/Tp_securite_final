<?php
session_start();
function accueil(){
           
      require('app/views/accueil.php');
                

      $info = getAllByLogin($_SESSION['login']);
  

      echo '<div class="w3-content w3-padding-large w3-margin-top" >
                   <p > Coucou '. $_SESSION['login'].'</p>
            </div>';

      echo '<div class="w3-content w3-padding-large w3-margin-top" >
                  <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top"> 
                    <h3 class="w3-center">Description</h3>
                    <hr>
                    <p>'.$info['dsc'].'</p>
  
                   </div>
            </div>'
      ;

      afficherImages($info['id_user']);
      

      
}