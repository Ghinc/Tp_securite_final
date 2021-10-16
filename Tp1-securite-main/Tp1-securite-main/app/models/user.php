<?php

require 'app/models/db.php';

//créer un membre 
function creerMembre($nom,$prenom,$mail,$tel,$adresse,$login,$mdp,$dsc){
  if(!verifierLogin($login)){
  $bdd = getDatabase();
  $mdp_hache = password_hash($mdp,PASSWORD_DEFAULT); //hache le mot de passe
  $sql= $bdd->prepare("INSERT INTO users(pseudo,adr_user,mail_user,psw_user,prenom_user,nom_user,tel_user,dsc) VALUES (?,?,?,?,?,?,?,?)");
  try {       
    $sql->bindParam(1,$login,PDO::PARAM_STR);
    $sql->bindParam(2,$adresse,PDO::PARAM_STR);
    $sql->bindParam(3,$mail,PDO::PARAM_STR);
    $sql->bindParam(4,$mdp_hache,PDO::PARAM_STR);
    $sql->bindParam(5,$prenom,PDO::PARAM_STR);
    $sql->bindParam(6,$nom,PDO::PARAM_STR);
    $sql->bindParam(7,$tel,PDO::PARAM_INT);
    $sql->bindParam(8,$dsc,PDO::PARAM_STR);
    $sql->execute();
    echo "vous êtes bien inscrit";
    session_start();
    $_SESSION['login']=$login;
    $_SESSION['id_user']= getId($login);
    mkdir("./app/images/images_users/".$_SESSION['id_user'], 0700);
    mkdir("./app/images/images_users/".$_SESSION['id_user']."/public", 0700);
    mkdir("./app/images/images_users/".$_SESSION['id_user']."/private", 0700);
    mkdir("./app/images/images_users/".$_SESSION['id_user']."/restricted", 0700);
    header('Location: index.php?action=accueil');

    }
  catch (PDOException $e) {
    echo "vous n'avez pas pu être inscrit";
    header('Location: index.php?action=inscription');
}
  }else{
    header('Location: index.php?action=inscription');

  }
}





function verifierConnexion($login,$mdp){   

   if(verifierLogin($login)){
   
      $mdp_hache = getMdp($login);
      if(password_verify($mdp, $mdp_hache)) {
        session_start();
        $_SESSION['login']=$login;
        $_SESSION['id_user']= getId($login);
       
        header('Location: index.php?action=accueil');

      }else{   
        echo "login ou mot de passe incorrect";
       // header('Location: index.php?action=connexion'); // utilisateur ou mot de passe incorrect
      }
   }else
   {   
     echo "login ou mot de passe incorrect";
     header('Location: index.php?action=connexion'); // utilisateur ou mot de passe incorrect
   }
  
   
 } 

      

  function verifierLogin($login){
    $bdd = getDatabase();
    $stmt = $bdd->prepare("SELECT * FROM users WHERE pseudo=?");
    $stmt->bindParam(1,$login,PDO::PARAM_STR);
    $stmt->execute(); 
    $user = $stmt->fetch();
    return $user;
  }

  function verifierMail($mail){
    $bdd = getDatabase();
  
    $stmt = $bdd->prepare("SELECT * FROM users WHERE mail_user=?");
    $stmt->bindParam(1,$mail,PDO::PARAM_STR);
    $stmt->execute(); 
    $user = $stmt->fetch();
    return $user;

  }


  function afficher($id){
    $bdd = getDatabase();
    $stmt = $bdd->prepare("SELECT * FROM users WHERE id_user=?");
  
    $stmt->bindParam(1,$id,PDO::PARAM_STR);
    $stmt->execute();
   
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
  
    return $user; 
  }


  function envoyerMail($mail){
 
    ini_set('SMTP','smtp.orange.fr');
    ini_set('sendmail_from', 'johannafericean@gmail.com');
    $mdp = uniqid();
    $mdp_hache = password_hash($mdp,PASSWORD_DEFAULT);
    $message = "Bonjour, votre nouveau mot de passe est " .$mdp;
  

    if(mail($mail,"changement de mot de passe", $message)){ //si on reussie à envoyer le message
        $db = getDatabase();
        $sql =" UPDATE users SET psw_user = ? WHERE mail_user=?";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(1,$mdp_hache,PDO::PARAM_STR);
        $stmt->bindParam(2,$mail,PDO::PARAM_STR);
        $stmt-> execute();
        echo "mail envoyé";
    }else{
      echo "une erreur est survenue, le mail est ".$mail;
    }

  }


function getId($valeur){
 
  $bdd = getDatabase();
  $stmt = $bdd->prepare("SELECT id_user FROM users WHERE pseudo=?");

  $stmt->bindParam(1,$valeur,PDO::PARAM_STR);
  $stmt->execute();
 
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  return $user['id_user']; 
}

function getMdp($login){
  $bdd = getDatabase();
  $stmt = $bdd->prepare("SELECT psw_user FROM users WHERE pseudo=?");
  $stmt->bindParam(1,$login,PDO::PARAM_STR);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user['psw_user'];  
 
}

function getAll() {
  $bdd = getDatabase();
  $stmt = $bdd->query("SELECT * FROM users");
  return $stmt;
 
   
}

function getAllByLogin($login){
  $bdd = getDatabase();
  $stmt = $bdd->prepare("SELECT * FROM users WHERE pseudo=?");
 
  try{

    $stmt->bindParam(1,$login,PDO::PARAM_STR);
    $stmt->execute(); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
     return $user;
  }catch (PDOException $e) {
  echo "Votre nom n'a pu être modifié";
 
  }
}

function editerNom($login,$nom){
  $bdd = getDatabase();
  $sql =" UPDATE users SET nom_user = ? WHERE pseudo=?";
  $stmt= $bdd->prepare($sql);
  try{

    $stmt->bindParam(1,$nom,PDO::PARAM_STR);
    $stmt->bindParam(2,$login,PDO::PARAM_STR);

    $stmt->execute();
    
  }catch (PDOException $e) {
  echo "Votre nom n'a pu être modifié";
 
  }
}

function editerPrenom($login,$prenom){
  $bdd = getDatabase();
  $sql =" UPDATE users SET prenom_user = ?   WHERE pseudo= ?";
  $stmt= $bdd->prepare($sql);
  try{

    $stmt->bindParam(1,$prenom,PDO::PARAM_STR);
    $stmt->bindParam(2,$login,PDO::PARAM_STR);

    $stmt->execute();
    
  }catch (PDOException $e) {
  echo "Votre prénom n'a pu être modifié";
 
  }
  
}


function editerMail($login,$mail){
  $bdd = getDatabase();
  $sql =" UPDATE users SET mail_user = ?   WHERE pseudo= ?";
  $stmt= $bdd->prepare($sql);
  try{

    $stmt->bindParam(1,$mail,PDO::PARAM_STR);
    $stmt->bindParam(2,$login,PDO::PARAM_STR);

    $stmt->execute();
    
  }catch (PDOException $e) {
  echo "Votre mail n'a pu être modifié";
 
  }
}


function editerTel($login,$tel){
  $bdd = getDatabase();
  $sql =" UPDATE users SET tel_user = ?   WHERE pseudo=?";
  $stmt= $bdd->prepare($sql);
  try{

    $stmt->bindParam(1,$tel,PDO::PARAM_INT);
    $stmt->bindParam(2,$login,PDO::PARAM_STR);

    $stmt->execute();
    
  }catch (PDOException $e) {
  echo "Votre numéro de téléphone n'a pu être modifié";
 
  }
}

function editerAdresse($login,$adresse){
  $bdd = getDatabase();
  $sql =" UPDATE users SET adr_user = ?   WHERE pseudo= ?";
  $stmt= $bdd->prepare($sql);
  try{

    $stmt->bindParam(1,$adresse,PDO::PARAM_STR);
    $stmt->bindParam(2,$login,PDO::PARAM_STR);

    $stmt->execute();
    
  }catch (PDOException $e) {
  echo "Votre adresse n'a pu être modifié";
 
  }
}

function editerPassword($login,$mdp){
  $bdd = getDatabase();
  $mdp = password_hash($mdp,PASSWORD_DEFAULT);
  $sql =" UPDATE users SET psw_user = ? WHERE pseudo = ?";
  $stmt= $bdd->prepare($sql);
  try{

    $stmt->bindParam(1,$mdp,PDO::PARAM_STR);
    $stmt->bindParam(2,$login,PDO::PARAM_STR);

    $stmt->execute();
    
  }catch (PDOException $e) {
  echo "Votre mot de passe n'a pu être modifié";
 
  }
}


function editerDsc($login,$dsc){
  $bdd = getDatabase();
  $sql =" UPDATE users SET dsc = ?   WHERE pseudo=?";
  $stmt= $bdd->prepare($sql);
  try{

    $stmt->bindParam(1,$dsc,PDO::PARAM_STR);
    $stmt->bindParam(2,$login,PDO::PARAM_STR);

    $stmt->execute();
    
  }catch (PDOException $e) {
  echo "Votre description n'a pu être modifié";
 
  }
}


function editerLogin($login,$newLogin){
  $bdd = getDatabase();
  if(!verifierLogin($login)){
  $sql =" UPDATE users SET pseudo = ? WHERE pseudo=?";
  $stmt= $bdd->prepare($sql);
  try{

    $stmt->bindParam(1,$newLogin,PDO::PARAM_STR);
    $stmt->bindParam(2,$login,PDO::PARAM_STR);

    $stmt->execute();

    $_SESSION['login'] = $newLogin;
    
  }catch (PDOException $e) {
  echo "Votre login n'a pu être modifié";
 
  }}
  else{
   echo "Votre login n'a pu être modifié";
  }
}

