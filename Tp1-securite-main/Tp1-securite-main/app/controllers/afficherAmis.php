<?php
require_once'app/models/amitie.php';

function afficherMesAmis(){
      require('app/views/mesAmis.php');
      if(isset($_SESSION['id_user'])){
      
          $amis = afficherAmis($_SESSION['id_user']);
          echo '<div class="w3-content w3-padding-large w3-margin-top" >';
          foreach ($amis as $ami) {      
              echo  $ami['pseudo']."<br>";
              echo '<form method="POST" action="index.php?action=profil">';       
                 echo '<input type="hidden" name="id_user" value="'.$ami['id_user'].'"/>';
                 echo '<input type="submit" value="voirProfil">';
              echo '</form>';
              echo '<form method="POST" action="index.php?action=supprimerAmi">';       
                 echo '<input type="hidden" name="id_user" value="'.$ami['id_user'].'"/>';
                 echo '<input type="submit" value="supprimer">';
              echo '</form>';
          }

          echo '</div>';

      }


      
      
}

