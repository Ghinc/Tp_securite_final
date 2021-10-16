<?php

function envoyerDemande($id_dem,$id_rec){
    $sql = "INSERT INTO amitie(id_envoyeur,id_receveur,statut) VALUES (?,?,?)";
    $bdd = getDatabase();
    $stmt= $bdd->prepare($sql);
    $statut = 1;
  try {       
    $stmt->bindParam(1,$id_dem,PDO::PARAM_INT);
    $stmt->bindParam(2,$id_rec,PDO::PARAM_INT);
    $stmt->bindParam(3,$statut,PDO::PARAM_INT);
   
    $stmt->execute();
   
    header('Location: index.php?action=ajouterAmi');

    }catch (PDOException $e){
    echo $e->getMessage();
    header('Location: index.php?action=ajouterAmi');

    }

}



function afficherAmis($id_user){   
        $bdd = getDatabase();
        $sql =("SELECT * FROM amitie INNER JOIN users ON id_receveur = id_user WHERE id_envoyeur= ? UNION ALL SELECT * FROM amitie INNER JOIN users ON id_envoyeur = id_user WHERE id_receveur= ?");
        $stmt = $bdd->prepare($sql);        
        $stmt->bindParam(1,$id_user,PDO::PARAM_INT);
        $stmt->bindParam(2,$id_user,PDO::PARAM_INT);
       $stmt->execute();
        $demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $demandes;    
         
      
}


function supprimerAmi($id_user,$id_ami){
  $bdd = getDatabase();

  $sql =(" DELETE  FROM amitie WHERE id_receveur=? AND id_envoyeur=?");
  try {   
  $stmt = $bdd->prepare($sql);        
  $stmt->bindParam(1,$id_user,PDO::PARAM_INT);
  $stmt->bindParam(2,$id_ami,PDO::PARAM_INT);
  $stmt->execute();
}catch (PDOException $e){
  echo $e->getMessage();
 
  }
  try { 
  $sql2 =("DELETE  FROM amitie WHERE id_receveur=? AND id_envoyeur=?");
  $stmt2 = $bdd->prepare($sql2);        
  $stmt2->bindParam(1,$id_ami,PDO::PARAM_INT);
  $stmt2->bindParam(2,$id_user,PDO::PARAM_INT);
  $stmt2->execute();
}catch (PDOException $e){
  echo $e->getMessage();

  }

}


