<?php




function checkaut($oncherche){
    $link = getDatabase();

  
    $query = "SELECT id_envoyeur, id_receveur FROM amitie ";
    echo "<script>console.log('chekau')</script>";
    $result = $link->query($query);
    $seeable=0;
   
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $id_rec= $row["id_receveur"];
        $id_a = $row["id_envoyeur"];
        /**echo "seeable dans la boucle". $seeable . "<br>";
        echo "id receveur". $id_rec. "<br>";
        echo "id receveur". $id_a. "<br>";**/
        if(($id_a==$_SESSION['id_user'] && $id_rec==$oncherche)||
           ($id_rec==$_SESSION['id_user'] && $id_a==$oncherche) ){
            $seeable=1; 
           // echo "on est là";
        }
    }
    //echo($seeable);
    return($seeable);

}