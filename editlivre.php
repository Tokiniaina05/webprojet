<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link href="font-image/Sans-font.png" rel="icon">
    <title>Editer des livres</title>
</head>
<body id="target-element">
<?php 
include_once "include/db.php";

$id = $_GET['id'];    
$req = mysqli_query($db, "SELECT * FROM livre WHERE id = '$id'");
$res = mysqli_fetch_assoc($req);

// Transformer la chaîne CSV en tableau
$selectedTypes = explode(',', $res['type'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    extract($_POST); // $titre, $auteur, etc.
    
    // Ici $_POST['type'] est un tableau, on le convertit en chaîne CSV
    $typeArray = $_POST['type'] ?? [];

    // Sécurisation des valeurs du tableau
    $typeArray = array_map(function($val) use ($db) {
        return mysqli_real_escape_string($db, $val);
    }, $typeArray);
    $type = implode(',', $typeArray);

    // Chemin de l'image actuelle
    $profil = $res['profil'];

    // Vérifie si une nouvelle image est envoyée
    if (!empty($_FILES['profil']['name'])) {
        $file_name = $_FILES['profil']['name'];
        $tempname = $_FILES['profil']['tmp_name'];

        // Renomme le fichier (nom + date)
        $profil = date("Ymd_His") . "_" . basename($file_name);
        $folder = 'images/' . $profil;

        // Déplace le fichier uploadé
        if (!move_uploaded_file($tempname, $folder)) {
            $message = "Erreur lors du téléchargement de l'image.";
        }
    }
    

    // Vérifie les champs obligatoires
    if (!empty($titre) && !empty($auteur)) {
        // Requête SQL sécurisée avec id ciblé
        $req = mysqli_query($db, "UPDATE livre SET 
            titre = '$titre', 
            auteur = '$auteur', 
            annee = '$annee', 
            type = '$type', 
            page = '$page', 
            profil = '$profil' 
            WHERE id = '$id'");

        if ($req) {
            header("Location: table.php?message=ok");
            exit;
        } else {
            $message = "Erreur lors de la mise à jour.";
        }
    } else {
        $message = "Veuillez remplir tous les champs obligatoires.";
    }
}
?>



<div class="form-body">

    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <div class="row">
                        <div class="col-8">
                            <h3>Editer Lives</h3>
                        </div>
                        <div class="col-4 " >
                            <div class="text-end" style="margin-right: 2cm;">
                                <a href="table.php">
                                <img src="icone/retour.png" alt="Icône" 
                                    style="width: 40px; height: 40px; filter: brightness(0) invert(1);">
                                </a>
                            </div>

                        </div>
                  </div>
                    <p>Veillez remplire tous les champs!</p>
                    <form class="requires-validation" method="post" enctype="multipart/form-data" novalidate>

                        <div class="col-md-12">
                           <input class="form-control" type="text" value="<?= $res['titre'];?>" name="titre" placeholder="Titre de livre" required>
                           <div class="valid-feedback">Username field is valid!</div>
                           <div class="invalid-feedback">Le champ titre de livre ne peut pas être vide!</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" value="<?= $res['auteur'];?>" name="auteur" placeholder="Nom de l'auteur" required>
                            <div class="valid-feedback">Email field is valid!</div>
                            <div class="invalid-feedback">Le champ nom d’Auteur ne peut pas être vide!</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" value="<?= $res['annee'];?>" name="annee" placeholder="Année de publication" required>
                            <div class="valid-feedback">Email field is valid!</div>
                            <div class="invalid-feedback">Année de publication ne peut pas être vide!</div>
                        </div>

                        <div class="col-md-12"> 
                            <input class="form-control" type="text" value="<?= $res['page'];?>" name="page" placeholder="Page de livre" enctype="multipart/form-data" required>
                            <div class="valid-feedback">Email field is valid!</div>
                            <div class="invalid-feedback">combien de page!</div>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <?php if (!empty($res['profil'])): ?>
                                <div class="mb-2">
                                    <label class="form-label">Image actuelle :</label><br>
                                    <img src="images/<?= htmlspecialchars($res['profil']); ?>" alt="Image de profil" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                            <?php endif; ?>
                            <!-- Bouton pour demander si on veut changer l'image -->
                            <div class="mb-3">
                                <button type="button" class="btn btn-outline-primary btn-sm" id="changeImageBtn">
                                    Changer l’image de profil
                                </button>
                            </div>
                            
                            <!-- Champ input file masqué par défaut -->
                            <div class="mb-3" id="fileInputContainer" style="display: none;">
                                <label for="profil" class="form-label">Nouvelle image</label>
                                <input class="form-control" type="file" id="profil" name="profil" accept="image/*">
                                <div class="invalid-feedback">Veuillez sélectionner une image valide.</div>
                            </div>
                            
                        </div>

                        
                        
                        
                        <div class="col-md-12 mt-3">
                          <label class="mb-3 mr-1" for="type">Genres : </label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Histoire" 
                          <?= in_array('Histoire', $selectedTypes) ? 'checked' : '' ?> id="histoire" >
                          <label class="btn btn-sm btn-outline-secondary" for="histoire">Histoire</label>


                          <input type="checkbox" class="btn-check" name="type[]" value="Documentaire" 
                          <?= in_array('Documentaire', $selectedTypes) ? 'checked' : '' ?> id="Documentaire">
                          <label class="btn btn-sm btn-outline-secondary" for="documentaire">Documentaire</label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Romance" id="romance" 
                          <?= in_array('Romance', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="romance">Romance</label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Drame" id="drame" 
                          <?= in_array('Drame', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="drame">Drame</label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Science-fiction" id="sciencefiction" 
                          <?= in_array('Science-fiction', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="sciencefiction">Science-fiction</label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Fantastique" id="fantastique"
                          <?= in_array('Fantastique', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="fantastique">Fantastique</label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Policier" id="policier"
                          <?= in_array('Policier', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="policier">Policier</label>
                          <br>

                          <input type="checkbox" class="btn-check" name="type[]" value="Thriller" id="thriller"
                          <?= in_array('Thriller', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="thriller">Thriller</label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Aventure" id="aventure" 
                          <?= in_array('Aventure', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="aventure">Aventure</label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Biographie" id="biographie" 
                          <?= in_array('Biographie', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="biographie">Biographie</label>
                          
                          <input type="checkbox" class="btn-check" name="type[]" value="Poesie" id="poesie" 
                          <?= in_array('Poésie', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="poesie">Poésie</label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Classique" id="classique"
                          <?= in_array('Classique', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="classique">Classique</label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Horreur" id="horreur"
                          <?= in_array('Horreur', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="horreur">Horreur</label>

                          <input type="checkbox" class="btn-check" name="type[]" value="Philosophie" id="philosophie"
                          <?= in_array('Philosophie', $selectedTypes) ? 'checked' : '' ?> autocomplete="off">
                          <label class="btn btn-sm btn-outline-secondary" for="philosophie">Philosophie</label>

                          <div class="valid-feedback mv-up">Vous avez sélectionné au moins un genre !</div>
                          <div class="invalid-feedback mv-up">Veuillez sélectionner au moins un genre !</div>
                        </div>
                        

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" name="edit" class="btn btn-primary">Modifier et Enregistré</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<!--Scriptr-->
<script>
(function () {
'use strict'
const forms = document.querySelectorAll('.requires-validation')
Array.from(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

<script>
    document.getElementById('changeImageBtn').addEventListener('click', function () {
        document.getElementById('fileInputContainer').style.display = 'block';
        this.style.display = 'none'; // Cacher le bouton après clic
    });
</script>
<script>
  window.onload = () => window.scrollTo(0, document.body.scrollHeight);
</script>
</html>