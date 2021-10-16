<?php
require_once'app/models/images.php';


function afficherMesImages(){   

  require('app/views/mesAmis.php');
  
    $id = $_SESSION['id_user'];
    $confidentialite = 'public';
    $confidentialite2 = 'private';
    $confidentialite3 = 'restricted';
    echo'<div class="w3-content w3-padding-large w3-margin-top" >';
    if ($handle = opendir('./app/images/images_users/'.$id.'/'. $confidentialite)) {
	    while (false !== ($entry = readdir($handle))) {
		    if ($entry != "." && $entry != "..") {
			
			
				echo "<img src=".showimg_public($entry,$id, $confidentialite, 'image/jpeg')." class='w3-image' width='500' height='250'>" ;
        
		    
      }
	    }
	    closedir($handle);
    }
    if ($handle = opendir('./app/images/images_users/'.$id.'/'. $confidentialite2)) {
	    while (false !== ($entry = readdir($handle))) {
		    if ($entry != "." && $entry != "..") {
			

				echo "<img src=".showimg_private($entry,$id, $confidentialite2, 'image/jpeg')." class='w3-image' width='500' height='250'>" ;

		    
      }
	    }
	    closedir($handle);
    }
    if ($handle = opendir('./app/images/images_users/'.$id.'/'. $confidentialite3)) {
	    while (false !== ($entry = readdir($handle))) {
		    if ($entry != "." && $entry != "..") {
			   
			
			    echo "<img src=".showimg_restricted($entry,$id, $confidentialite3, 'image/jpeg')." class='w3-image' width='500' height='250'>" ;
		    
      }
	    }
	    closedir($handle);
    }
    echo "</div>";
    
  }






function showimg_restricted($id,$cible, $mime) 
{  
  $seeable=checkaut($cible);
 // echo "seeable = ". $seeable;
  if ($seeable==1){
  $file="app/images/images_users/".$cible."/restricted/".$id;
  $contents = file_get_contents($file);
  $base64   = base64_encode($contents); 
  return ('data:' . $mime . ';base64,' . $base64);
  }
}

function showimg_public($id,$cible, $mime){
  $file="app/images/images_users/".$cible."/public/".$id;
  $contents = file_get_contents($file);
  $base64   = base64_encode($contents); 
  return ('data:' . $mime . ';base64,' . $base64);
}

function showimg_private($id,$cible, $mime){
   
  $file="app/images/images_users/".$cible."/private/".$id;
  $contents = file_get_contents($file);
  $base64   = base64_encode($contents); 
  return ('data:' . $mime . ';base64,' . $base64);
}


function afficherImages($id){   

   

  $confidentialite = 'public';
  $confidentialite2 = 'private';
  $confidentialite3 = 'restricted';
  echo'<div class="w3-content w3-padding-large w3-margin-top" >';
  if ($handle = opendir('./app/images/images_users/'.$id.'/'. $confidentialite)) {
    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
     
     
      echo "<img src=".showimg_public($entry,$id, $confidentialite, 'image/jpeg')." class='w3-image' width='500' height='250'>" ;
      
      
    }
    }
    closedir($handle);
  }
  if ($handle = opendir('./app/images/images_users/'.$id.'/'. $confidentialite2)) {
    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
     
      echo "<img src=".showimg_private($entry,$id, $confidentialite2, 'image/jpeg')." class='w3-image' width='500' height='250'>" ;

      
    }
    }
    closedir($handle);
  }
  if ($handle = opendir('./app/images/images_users/'.$id.'/'. $confidentialite3)) {
    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
        #echo "$entry\n";

        echo "<img src=".showimg_restricted($entry,$id, $confidentialite3, 'image/jpeg')." class='w3-image' width='500' height='250'>" ;
      
    }
    }
    closedir($handle);
  }
  echo'</div>';
}
