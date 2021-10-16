<?php

require_once 'app/models/user.php';


function inscrire(){
 
    if (isset($_POST['nom'])and(!empty($_POST['nom'])and(nomValide($_POST['nom'])))){
        $nom = ucfirst(strtolower(estValidee($_POST['nom'])));   
 
        if (isset($_POST['prenom'])and(!empty($_POST['prenom']))and(nomValide($_POST['prenom']))){
            $prenom = ucfirst(strtolower(estValidee($_POST['prenom']))); 
            
            if (isset($_POST['mail']) and (!empty($_POST['mail']))and(mailValide($_POST['mail']))){
                $mail = strtolower(estValidee($_POST['mail']));
               
                if (isset($_POST['tel']) and (!empty($_POST['tel'])) and(telValide($_POST['tel']))){
                    $tel = estValidee($_POST['tel']);
      
                    if (isset($_POST['adresse']) and (!empty($_POST['adresse'])) and (adresseValide($_POST['adresse']))){
                        $adresse = estValidee($_POST['adresse']);
                      
                        if (isset($_POST['login'])and (!empty($_POST['login']))and(loginValide($_POST['login']))){
                            $login = estValidee($_POST['login']);
                        
                            if (isset($_POST['password'])and(!empty($_POST['password']))and(passwordValide($_POST['password']))){
                                $mdp = estValidee($_POST['password']);
                        
                                if (isset($_POST['dsc']) and(!empty($_POST['dsc']))and(dscValide($_POST['dsc']))){
                                    $dsc = estValidee($_POST['dsc']);
                                    
                                   
                                    creerMembre($nom,$prenom,$mail,$tel,$adresse,$login,$mdp,$dsc);
                                
                                }
                            }
                        }
                    }
                }
            }
        }
    }    
    else{
       require('app/views/inscription.php');
    }
   
    
}

//eviter les injections js, supprime les espaces inutiles et les antislashs
function estValidee($donnee){
    $donnee = trim($donnee);
    $donnee = stripslashes($donnee);
    $donnee = htmlspecialchars($donnee);
    return $donnee;
}


function nomValide($nom){
    $pattern ="/^[a-z ,.'-]+$/i";
    $nom = estValidee($_POST['nom']);
    if(preg_match($pattern,$nom)and(strlen($nom)<25)){
       
        return true;
    }
    return false;
}

function mailValide($mail){
 //   $mail = strtolower($mail);
    $mail = estValidee($_POST['mail']);
    $pattern = "/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i";

    if(preg_match($pattern,$mail)and(strlen($mail)<60)){
        return true;
    }
    return false;
}

function telValide($tel){
    $pattern = '/[0-9]{10}/i';
    $tel = estValidee($_POST['tel']);
    if(preg_match($pattern,$tel)and(strlen($tel)<11)){
        return true;
    }
    return false;
}

//FAUT VERIFIER CA
function loginValide($login){
    return true;
}

//FAUT VERIFIER CA
function adresseValide($adresse){
    $adresse = estValidee($_POST['adresse']);
    return true;
}

function passwordValide($mdp){
    $pattern ="/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,25})$/i";
    $mdp = estValidee($_POST['password']);
  
    if(preg_match($pattern, $mdp)){
        return true;
    }
    return false;
}

//FAUT VERIFIER CA
function dscValide($dsc){
    $dsc = estValidee($_POST['dsc']);
    return true;
}