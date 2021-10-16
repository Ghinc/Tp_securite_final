<?php
require_once'app/models/user.php';

function editer(){
    $login=$_SESSION['login'];
   
    if (isset($_POST['login'])and (!empty($_POST['login']))and(loginValide($_POST['login']))){
        $newlogin = estValidee($_POST['login']);
        editerLogin($login,$newlogin);
    }
    if (isset($_POST['nom'])and(!empty($_POST['nom'])and(nomValide($_POST['nom'])))){
        $nom = ucfirst(strtolower(estValidee($_POST['nom'])));  
        editerNom($login,$nom);
    }       
    if (isset($_POST['prenom'])and(!empty($_POST['prenom']))and(nomValide($_POST['prenom']))){
        $prenom = ucfirst(strtolower(estValidee($_POST['prenom']))); 
        editerPrenom($login,$prenom);
    }
    if (isset($_POST['mail']) and (!empty($_POST['mail']))and(mailValide($_POST['mail']))){
        $mail = strtolower(estValidee($_POST['mail']));
        editerMail($login,$mail);
    }
    if (isset($_POST['tel']) and (!empty($_POST['tel'])) and(telValide($_POST['tel']))){
        $tel = estValidee($_POST['tel']);
        editerTel($login,$tel);
    }
    if (isset($_POST['adresse']) and (!empty($_POST['adresse'])) and (adresseValide($_POST['adresse']))){
        $adresse = estValidee($_POST['adresse']);
        editerAdresse($login,$adresse);
    }
  
    if (isset($_POST['password'])and(!empty($_POST['password']))and(passwordValide($_POST['password']))){
        $mdp = estValidee($_POST['password']);
        editerPassword($login,$mdp);
    }
    if (isset($_POST['dsc']) and(!empty($_POST['dsc']))and(dscValide($_POST['dsc']))){
        $dsc = estValidee($_POST['dsc']);
        editerDsc($login,$dsc);
    }
                                
    require('app/views/editer.php')  ;     
}