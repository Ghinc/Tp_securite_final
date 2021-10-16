<?php

require_once'app/models/user.php';

function connecter(){

    if (isset($_POST['login'])){  
        $login = $_POST['login'];
        if (isset($_POST['password'])){
            $mdp = $_POST['password'];
            verifierConnexion($login,$mdp);
        }else{
            echo "veuillez entrer un mot de passe";
        }
   } else{
       require('app/views/login.php');
   }  
}