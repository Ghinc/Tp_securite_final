<?php
require_once'app/models/amitie.php';

function afficherProfil(){
    require('app/views/profil.php');
    if($_POST['id_user']){
   

        $ami = afficher($_POST['id_user']);

    

     
      
        echo '<div class="w3-content w3-padding-large w3-margin-top" >
                 <p>'.$ami['pseudo'] .'</p> <br>
                 <p >'. $ami['prenom_user'].' '.$ami['nom_user'].'</p>
             </div>';

           
    
        echo '<div class="w3-content w3-padding-large w3-margin-top" >
                  <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="contact">
       
                       <h3 class="w3-center">Description</h3>
                       <hr>
                        <p>'.$ami['dsc'].'</p>
    
                </div>
            </div>';
     afficherImages($ami['id_user']);

      
    }else{
        require('app/views/profil.php');
    }
       
       
      
      }


      
      
