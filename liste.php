<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="list/style.css">
    <link href="font-image/Sans-font.png" rel="icon">
    <title>Liste des livres</title>
</head>   

<body>
  <?php include_once "include/db.php";?>
  <div class="container">
    <div class="bar">
      <div class="nav">        
        <div class="item" id="selected">Disponible</div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
      </div>
    </div>
    <form action="">
        <div class="stream-content">
        
        <div class="games">
          <h3>La liste <span class="title-highlight">Des livres</span></h3>
          <div class="games-carousel">
            <?php 
              $req = $db->query("SELECT * FROM livre");
              while($res = $req->fetch_assoc()){
            ?>

            <div class="game">
              <div class="game-cover">
                <?php echo'<img style="height:8cm; width:5cm;" src="./images/'.$res['profil'].'" >'; ?>
              </div>
              <div class="game-info">
                <p class="game-title"><?php echo $res['titre']?></p>
                <p class="game-viewership"><?php echo $res['auteur']?>, <?php echo $res['annee']?></p>
              </div> 
              <div class="game-categories">
                <?php
                  $types = explode(',', $res['type'] ?? '');
                  foreach ($types as $type) {
                      echo '<span>' . htmlspecialchars(trim($type)) . '</span> ';
                  }
                ?>
              </div>
            </div>
            
            <?php } ?>
          </div>
        </div>
        <div class="divider">
          <div class="bar"></div>
          <div class="show-more">
            Show more <i class="fa fa-chevron-down"></i>
          </div>
          <div class="bar"></div>
        </div>
        
      </div>
    </form>
  </div>
</body>

</html>