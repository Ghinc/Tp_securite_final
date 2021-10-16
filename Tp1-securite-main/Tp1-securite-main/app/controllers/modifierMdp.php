<?php

require_once'app/models/user.php';

function modifMdp(){
if(isset($_POST['mail'])){
    $mail = $_POST['mail'];
    if (verifierMail($mail)){
        envoyerMail($mail);
    }else{
        echo "aucun utilisateur avec ce mail";
        //require('app/views/modifierMdp.php');
    }
    
}else{
    require('app/views/modifierMdp.php');
}

}

