<?php

require_once'app/models/amitie.php';

function supprimer(){
  
 
   if (isset($_POST['id_user']) and (!empty($_POST['id_user']))){
       echo $_POST['id_user'];
             $id_rec = $_POST['id_user'];
           echo $id_rec;
            $id_dem = getId($_SESSION['login']);
            echo $id_dem;            
            supprimerAmi($id_dem,$id_rec);
            header('Location: index.php?action=amis');
    }else{
      require('app/views/mesAmis.php');
    }
  
}


















