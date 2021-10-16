<?php include('app/views/layouts/header.php'); ?>



<body>
<div class="w3-content w3-padding-large w3-margin-top" >
    <form class="w3-container" action="index.php?action=ajouterImage" method="post" enctype="multipart/form-data">
  
        <label class="w3-text-purple"><b>Sélectionner une image </b></label>
        <input type="file" name="fileToUpload" id="fileToUpload">
     
        <br/> Quelle visibilité voulez-vous accorder à la photo ? <br/>
        <input type="radio" id="private" name="visibility" value="private">
        <label for="private">Privée</label><br>
        <input type="radio" id="public" name="visibility" value="public">
        <label for="public">Publique</label><br>
        <input type="radio" id="restricted" name="visibility" value="restricted">
        <label for="restricter">Restreinte</label> <br> <br>
        
        <div class="form__field">
            <input class="w3-btn w3-purple" type="submit" value="Upload Image" name="submit">
        </div>
    </form>
</div>
</body>
</html>

