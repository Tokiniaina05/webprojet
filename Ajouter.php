<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link href="font-image/Sans-font.png" rel="icon">
    
    <title>Ajouter des livres</title>
</head>
<body>
<?php include_once "include/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {

    //extraction des donnéé 
    extract($_POST);

    if(!empty($titre) && !empty($auteur))
    {      

      // Vérifie si au moins un genre est sélectionné
      $type_array = $_POST['type'] ?? [];
      if (empty($type_array)) {
          header("location:Ajouter.php?message=ertype");
          exit;
      }

      if(empty($_FILES["image_file"]["tmp_name"])){
      header("location:Ajouter.php?message=er");
      }

      $file_basename = pathinfo($_FILES["image_file"]["name"], PATHINFO_FILENAME);
      $file_extesion = pathinfo($_FILES["image_file"]["name"], PATHINFO_EXTENSION);
      $new_image_name = $file_basename ."_". date("Ymd_His") .".". $file_extesion;

      $new_image_name = $db->real_escape_string($new_image_name);

      // Convertit le tableau des genres en chaîne
      $type = implode(',', $type_array); // Exemple: "Romance,Drame"

      //requette de                            
      $req = mysqli_query($db , "INSERT INTO livre (titre, auteur, annee, type, page, profil) 
        VALUES ('$titre','$auteur','$annee','$type','$page','$new_image_name')");

      if($req){
        $target_directory = "images/";
        $target_path = $target_directory . $new_image_name;
        if(!move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_path)){
            header("location:Ajouter.php?message=er");
        }
        header("location:Ajouter.php?message=ok");

      }else {
        header("location:Ajouter.php?message=erreq");
      }
    } else{
      header("location:Ajouter.php?message=vide");
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
                      <h3>Ajouter Lives</h3>
                    </div>
                    <div class="col-4 " >
                      <div class="text-end" style="margin-right: 2cm;">
                        <a href="principal.php">
                          <img src="icone/retour.png" alt="Icône" 
                            style="width: 40px; height: 40px; filter: brightness(0) invert(1);">
                        </a>
                      </div>

                    </div>
                  </div>
                    

                    
                  <p>Veillez remplire tous les champs!</p>
                  <form class="requires-validation" method="post" enctype="multipart/form-data" novalidate>

                      <div class="col-md-12">
                          <input class="form-control" type="text" name="titre" placeholder="Titre de livre" required>
                          <div class="valid-feedback">Titre enregistrée avec succès!</div>
                          <div class="invalid-feedback">Le champ titre de livre ne peut pas être vide!</div>
                      </div>

                      <div class="col-md-12">
                          <input class="form-control" type="text" name="auteur" placeholder="Nom de l'auteur" required>
                          <div class="valid-feedback">Auteur enregistrée avec succès!</div>
                          <div class="invalid-feedback">Le champ nom d’Auteur ne peut pas être vide!</div>
                      </div>

                      <div class="col-md-12">
                          <input class="form-control" type="text" name="annee" placeholder="Année de publication" required>
                          <div class="valid-feedback">Email field is valid!</div>
                          <div class="invalid-feedback">Année de publication ne peut pas être vide!</div>
                      </div>

                      <div class="col-md-12"> 
                          <input class="form-control" type="text" name="page" placeholder="Page de livre" enctype="multipart/form-data" required>
                          <div class="valid-feedback">Email field is valid!</div>
                          <div class="invalid-feedback">combien de page!</div>
                      </div>

                      <div class="col-md-12">
                          <br>
                          <input class="form-control" type="file" name="image_file" accept="image/*" required>
                          <div class="valid-feedback">Email field is valid!</div>
                          <div class="invalid-feedback">Acune image selectionnée!</div>
                      </div>

                                            
                      <div class="col-md-12 mt-3">
                        <label class="mb-3 mr-1" for="type">Genres : </label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Histoire" id="histoire" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="histoire">Histoire</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Documentaire" id="documentaire" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="documentaire">Documentaire</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Romance" id="romance" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="romance">Romance</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Drame" id="drame" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="drame">Drame</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Science-fiction" id="sciencefiction" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="sciencefiction">Science-fiction</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Fantastique" id="fantastique" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="fantastique">Fantastique</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Policier" id="policier" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="policier">Policier</label>
                        <br>

                        <input type="checkbox" class="btn-check" name="type[]" value="Thriller" id="thriller" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="thriller">Thriller</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Aventure" id="aventure" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="aventure">Aventure</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Biographie" id="biographie" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="biographie">Biographie</label>
                        
                        <input type="checkbox" class="btn-check" name="type[]" value="Poésie" id="poesie" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="poesie">Poésie</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Classique" id="classique" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="classique">Classique</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Horreur" id="horreur" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="horreur">Horreur</label>

                        <input type="checkbox" class="btn-check" name="type[]" value="Philosophie" id="philosophie" autocomplete="off">
                        <label class="btn btn-sm btn-outline-secondary" for="philosophie">Philosophie</label>

                        <div class="valid-feedback mv-up">Vous avez sélectionné au moins un genre !</div>
                        <div class="invalid-feedback mv-up">Veuillez sélectionner au moins un genre !</div>
                      </div>

                      

                      <div class="form-button mt-3">
                          <button id="submit" type="submit" name="ajouter" class="btn btn-primary">Ajouter et Enregistré</button>
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
</html>