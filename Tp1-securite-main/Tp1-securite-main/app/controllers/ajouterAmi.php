<?php
require_once'app/models/amitie.php';

function ajouterAmi(){

    if (isset($_POST['mail']) and (!empty($_POST['mail']))and(mailValide($_POST['mail']))){
        $mail = strtolower(estValidee($_POST['mail']));

        if(verifierMail($mail)){
            $id_rec = verifierMail($mail)['id_user'];
            $id_dem = getId($_SESSION['login']);
            
            envoyerDemande($id_dem,$id_rec);
        }

    }else{
        require('app/views/ajouterAmi.php');
    }
  
}