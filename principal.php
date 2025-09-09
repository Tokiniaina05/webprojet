<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Acceil - Gasibiblio</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="font-image/Sans-font.png" rel="icon">
  <link href="moderna-1.0.0/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="moderna-1.0.0/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="moderna-1.0.0/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="moderna-1.0.0/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="moderna-1.0.0/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="moderna-1.0.0/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="moderna-1.0.0/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<script>
    window.addEventListener("pageshow", function (event) {
        if (event.persisted) {
            // Si la page vient du cache (ex: retour arrière), on la recharge
            window.location.reload();
        }
    });
</script>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="principal.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="moderna-1.0.0/assets/img/logo.png" alt=""> -->
        <img src="font-image/Sans-font.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="principal.php" class="active">Acceil</a></li>
          <li><a href="#featured-services">Action</a></li>
          <li><a href="#features">Caractéristiques</a></li>
          <li><a href="#footer">Admin</a></li>
          <li class="dropdown"><a href="#"><span>Sortie</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="acceil/acceil.php">Déconnexion</a></li>              
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <!-- <img src="moderna-1.0.0/assets/img/affiche.jpg" alt="" data-aos="fade-in"> -->

      <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="container position-relative">

          <div class="carousel-item active">
            <div class="carousel-container">
              <h2>Bienvenue chez nous</h2>
              <p>Bienvenue sur notre plateforme de gestion des livres !
                Nous sommes ravis de vous accompagner dans l'organisation et 
                le suivi de votre bibliothèque.</p>
              <a href="#featured-services" class="btn-get-started">Voir</a>
            </div>
          </div><!-- End Carousel Item -->

          <div class="carousel-item">
            <div class="carousel-container">
              <h2>Fonctionnalitée</h2>
              <p>Ce site vous permet de gérer facilement votre collection de livres, 
                que vous soyez lecteur passionné ou responsable d'une bibliothèque. 
                Ajoutez, classez et consultez vos ouvrages en quelques clics.</p>
              <a href="#featured-services" class="btn-get-started">Voir</a>
            </div>
          </div><!-- End Carousel Item -->

          <div class="carousel-item">
            <div class="carousel-container">
              <h2>Objectif</h2>
              <p>Notre objectif est de rendre la gestion de votre bibliothèque plus simple, rapide et agréable.
                  Prenez plaisir à explorer et à gérer votre collection en toute autonomie.</p>
              <a href="#featured-services" class="btn-get-started">Voir</a>
            </div>
          </div><!-- End Carousel Item -->

          <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
          </a>

          <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
          </a>

          <ol class="carousel-indicators"></ol>

        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <div class="icon">
                <i class="bi bi-plus-circle"></i>
              </div>
              <a href="Ajouter.php" class="stretched-link">
                <h3>Ajouter Livres</h3>
              </a>
              <p>C'est ici que vous pouvez ajouter des livres dans cette gestion des livres. 
                Si vous souhaitez ajouter un nouveau livre, c'est ici que vous devez entrer.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <div class="icon">
                <i class="bi bi-pencil-square"></i>
              </div>
              <a href="table.php" class="stretched-link">
                <h3>Modifier des livres</h3>
              </a>
              <p>comporte deux parties : 
                d'abord, si vous souhaitez remplacer les informations sur le livre, 
                ensuite, si vous avez un livre que vous souhaitez supprimer, c'est ici que vous devez entrer.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <div class="icon">
                <i class="bi bi-journal-bookmark"></i>
              </div>
              <a href="liste.php" class="stretched-link">
                <h3>La liste des livres</h3>
              </a>
              <p>ici c'est juste voir des livres mais 
                vous n'avez pas des pouvoir modifié ou supprimé, juste voir les liste</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <div class="icon">
                <i class="bi bi-info-circle"></i> 
              </div>
              <a href="#footer" class="stretched-link">
                <h3>A propos</h3>
              </a>
              <p>Non et Prénom de créateur , Adresse et l'Université .</p>
              <a href="#footer" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->
        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Caractéristiques</h2>
        <p>Ce site est un projet conçu pour la gestion de bibliothèques sous forme virtuelle.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <img src="font-image/dernier.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            <h3>" Un livre par jour, une idée pour toujours. "</h3>
            <p class="fst-italic">
              Notre application de gestion des livres vous offre 
              plusieurs fonctionnalités pratiques qui facilitent votre quotidien.
            </p>
            <ul>
              <li><i class="bi bi-check"></i><span> Organisation efficace de la bibliothèque.</span></li>
              <li><i class="bi bi-check"></i> <span>Gain de temps.</span></li>
              <li><i class="bi bi-check"></i> <span>Suivi en temps réel du stock.</span></li>
            </ul>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="font-image/acceil.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
            <h3>Un court récit sur l’ancienne bibliothèque</h3>
            <p class="fst-italic">
              L’ancienne bibliothèque était un lieu paisible où régnaient silence et concentration. 
            </p>
            <p>
              
              Ses étagères en bois et ses livres anciens racontaient des histoires bien au-delà de leur contenu. 
              Elle offrait un espace de découverte, d’apprentissage et d’évasion. 
              Chaque recoin portait la mémoire de générations de lecteurs passionnés. 
              Ce lieu, chargé d’histoire, reste cher au cœur de ceux qui l’ont connu. 
              
            </p>
            <strong>
              <p class="fst-italic">
              Aujourd’hui, la bibliothèque existe sous forme virtuelle, 
              accessible à tous en quelques clics, perpétuant sa mission de diffusion du savoir. 
              </p>
            </strong>
          </div>
        </div><!-- Features Item -->

        
      </div>

    </section><!-- /Features Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Visite d'Admnistrateur</h4>
            <p>Service administrateur, Veillez entrer le code d'administration !</p>
            <form action="" method="post" class="php-email-form" >
              <div class="newsletter-form">
                <input type="email" id="code" name="code" maxlength="8" >
                <input type="submit" id="inputcode" value="Entrer et Visiter" required>
              </div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>
    

    <div class="container copyright text-center mt-4">
      <div class="footer-contact pt-3">
        <p>RANDRIAMAHAZO Tokiniaina Julio</p>
        <p>401- Mahajanga, Madagascar</p>
        <p class="mt-3"><strong>Phone:</strong> <span>+261 329 550 777</span></p>
        <p><strong>Email:</strong> <span>tokiniainarandriamahazo81@gmail.com</span></p>
        
      </div>
      <a href=""><i class="bi bi-twitter-x"></i></a>
      <a href=""><i class="bi bi-facebook"></i></a>
      <a href=""><i class="bi bi-instagram"></i></a>
      <a href=""><i class="bi bi-linkedin"></i></a>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Projet d'examen <a href="https://bootstrapmade.com/">OniFRa Mahajanga</a> Distributed by <a href="https://themewagon.com" target="_blank">Tokiniaina Julio</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="moderna-1.0.0/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="moderna-1.0.0/assets/vendor/php-email-form/validate.js"></script>
  <script src="moderna-1.0.0/assets/vendor/aos/aos.js"></script>
  <script src="moderna-1.0.0/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="moderna-1.0.0/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="moderna-1.0.0/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="moderna-1.0.0/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="moderna-1.0.0/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="moderna-1.0.0/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="moderna-1.0.0/assets/js/main.js"></script>
  <script>
    function verifierCode(event) {
      event.preventDefault(); // Empêche l'envoi du formulaire

      // Récupération de la valeur du champ code
      const codeSaisi = document.getElementById("code").value;

      // Vérification du code
      if (codeSaisi === "09122005") {
        // Redirection vers list.html
        window.location.href = "listeUser.php";
      } else {
        // Affichage d'une alerte en cas d'erreur
        alert("Erreur : Code administrateur incorrect");
      }
    }

    // Ajout de l'écouteur d'événement après le chargement de la page
    window.onload = function () {
      document.getElementById("inputcode").addEventListener("click", verifierCode);
    };
  </script>

  

</body>

</html>