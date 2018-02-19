<?php
    require_once('inc/init.php');

    if($_POST && estConnecte()){
        //enregistrer l'annonce
        $controleChamps=champVide($_POST);
        $errorInscription = $controleChamps['champsvides'];

        if($errorInscription['nbError']==0) {
            //il n'y a pas de champs vide donc je continue de tester les champs

            $verif_cp = preg_match('#^[0-9]{5}$#', $_POST['cp']);
            /*
                # - delimite l'expression au début et à la fin
                ^ signifie commence par tout ce qui suit
                $ signifie finit par tout ce qui précède
                [] pour delimiter les intervals
                + pour dire que les caractères sont accepté de 0 à x fois.
            */
            vdm($_FILES);
            if(!empty($_FILES['photo']['name'])){
                $uploadPhoto = UploadPhoto($_FILES['photo']);
                echo $uploadPhoto['message'];
                $listeChamps['photo']=$uploadPhoto['nom']; // le nom du fichier photo
            }elseif(empty($_FILES['photo']['name']) && empty($_POST['photo'])){
                $listeChamps['photo']='';
            }

            unset($listeChamps['categorie']);
            $listeChamps['membre_id']= $_SESSION['membre']['id_membre'];

            //pas d'erreur donc j'ajoute le membre dans la base
            $listeChamps =  $controleChamps['champsvalides'];
            $sql = "INSERT INTO annonce (titre, :description_courte, :description_longue, :prix,'', :pays,:ville,:adress, :cp, :membre_id, NULL, NULL  , CURDATE())";
          
            $listeChamps['membre_id']= $_SESSION['membre']['id_membre'];
        
            vdm($listeChamps);
            $insert = executeRequete($sql,$listeChamps);
            
        }
    }

/**
 * FORMULAIRE POUR DEPOSER UNE ANNONCE
 * 
 */
?>
<?php
ob_start();
?>
    <form id="ajoutAnnonce" action="" method="post">
        <div class="form-group <?= isset($errorInscription['titre']) ? 'has-error' : '' ?>">
            <label for="titre">titre</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="saisissez votre titre" 
            value="<?= $_POST['titre'] ?? '' ?>">
            <?= $errorInscription['titre'] ?? '' ?>
        </div>

        <div class="form-group <?= isset($errorInscription['description_courte']) ? 'has-error' : '' ?>">
            <label for="description_courte">description_courte</label>
            <input type="text" class="form-control" id="description_courte" name="description_courte" 
            placeholder="saisissez la description_courte de votre annonce" 
            value="<?= $_POST['description_courte'] ?? '' ?>">
            <?= $errorInscription['description_courte'] ?? '' ?>
        </div>

        <div class="form-group <?= isset($errorInscription['description_longue']) ? 'has-error' : '' ?>">
            <label for="description_longue">description_longue</label>
            <input type="text" class="form-control" id="description_longue" name="description_longue" 
            placeholder="saisissez la description_longue de votre annonce" 
            value="<?= $_POST['description_longue'] ?? '' ?>">
            <?= $errorInscription['description_longue'] ?? '' ?>
        </div>

        <div class="form-group <?= isset($errorInscription['prix']) ? 'has-error' : '' ?>">
            <label for="prix">prix</label>
            <input type="text" class="form-control" id="prix" name="prix" 
            placeholder="saisissez le prix de votre annonce" 
            value="<?= $_POST['prix'] ?? '' ?>">
            <?= $errorInscription['prix'] ?? '' ?>
        </div>

        <div class="form-group <?= isset($errorInscription['categorie']) ? 'has-error' : '' ?>">
            <label for="categorie">categorie</label>
            <input type="text" class="form-control" id="categorie" name="categorie" 
            placeholder="saisissez la categorie de votre annonce" 
            value="<?= $_POST['categorie'] ?? '' ?>">
            <?= $errorInscription['categorie'] ?? '' ?>
        </div>

        <div class="form-group">
        <label>photo</label>
        <label for="photo1">
            <div class="btn btn-default btn-lg">
                <span>photo1</span>
                <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
            </div>
        </label>
        <input type="file" class="typeFile" name="photo1" id="photo1">
        <label for="photo2">
            <div class="btn btn-default btn-lg">
                <span>photo2</span>
                <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
            </div>
        </label>
        <input type="file" class="typeFile" name="photo2" id="photo2">

        <label for="photo3">
            <div class="btn btn-default btn-lg">
                <span>photo3</span>
                <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
            </div>
        </label>
        <input type="file" class="typeFile" name="photo3" id="photo3">
        <label for="photo4">
            <div class="btn btn-default btn-lg">
                <span>photo4</span>
                <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
            </div>
        </label>
        <input type="file" class="typeFile" name="photo4" id="photo4">
        <label for="photo5">
            <div class="btn btn-default btn-lg">
                <span>photo5</span>
                <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
            </div>
        </label>
        <input type="file" class="typeFile" name="photo5" id="photo5">
    </div>

        <div class="form-group <?= isset($errorInscription['pays']) ? 'has-error' : '' ?>">
            <label for="pays">pays</label>
            <input type="text" class="form-control" id="pays" name="pays" 
            placeholder="saisissez le pays de votre annonce" 
            value="<?= $_POST['pays'] ?? '' ?>">
            <?= $errorInscription['pays'] ?? '' ?>
        </div>

        <div class="form-group <?= isset($errorInscription['ville']) ? 'has-error' : '' ?>">
            <label for="ville">ville</label>
            <input type="text" class="form-control" id="ville" name="ville" 
            placeholder="saisissez la ville de votre annonce" 
            value="<?= $_POST['ville'] ?? '' ?>">
            <?= $errorInscription['ville'] ?? '' ?>
        </div>

        <div class="form-group <?= isset($errorInscription['adresse']) ? 'has-error' : '' ?>">
            <label for="adresse">adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" 
            placeholder="saisissez l'adresse de votre annonce" 
            value="<?= $_POST['adresse'] ?? '' ?>">
            <?= $errorInscription['adresse'] ?? '' ?>
        </div>

        <div class="form-group <?= isset($errorInscription['cp']) ? 'has-error' : '' ?>">
            <label for="cp">cp</label>
            <input type="text" class="form-control" id="cp" name="cp" 
            placeholder="saisissez le code_postal de votre annonce" 
            value="<?= $_POST['cp'] ?? '' ?>">
            <?= $errorInscription['cp'] ?? '' ?>
        </div>

        <input type="submit" class="primary" value="enregistrer">
    </form> 

<?php 
$content = ob_get_clean();
?>

<?php
    include('inc/gabarit.php');
?>
