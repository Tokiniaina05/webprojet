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

$id = $_GET['email'];    
$req = mysqli_query($db, "SELECT * FROM users WHERE iduser = '$id'");
$res = mysqli_fetch_assoc($req);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    extract($_POST); // $titre, $auteur, etc.
    
    // Chemin de l'image actuelle
    $profil = $res['profil'];

    // Vérifie les champs obligatoires
    if (!empty($titre) && !empty($auteur)) {
        // Requête SQL sécurisée avec id ciblé
        $req = mysqli_query($db, "UPDATE users SET 
            titre = '$titre', 
            auteur = '$auteur', 
            annee = '$annee', 
            type = '$type', 
            page = '$page', 
            profil = '$profil' 
            WHERE email = '$id'");

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
                    <h3>Mot de passe Oublier</h3>
                    <p>Veillez remplire tous les champs!</p>
                    <form class="requires-validation" method="post" enctype="multipart/form-data" novalidate>

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
                            <label class="mb-3 mr-1" for="type">Types: </label>

                            <input type="radio" class="btn-check" value="Histoire" <?= ($res['type'] === 'Histoire') ? 'checked' : '' ?> name="type" value="Histoire" id="male"  autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="male" >Histoire</label>
                            
                            <input type="radio" class="btn-check" value="Document" <?= ($res['type'] === 'Document') ? 'checked' : '' ?>name="type" value="Document" id="female" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="female">Document</label>Religieux

                            
                            <div class="valid-feedback mv-up">You selected a type!</div>
                            <div class="invalid-feedback mv-up">Veillez selectionner un type!</div>
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