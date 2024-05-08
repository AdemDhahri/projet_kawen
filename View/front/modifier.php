<?php 
include('../../Model/chercheur.php');
include('../../Model/JobControl.php');

include('../../Control/actions/updatejob.php');

?>
<!DOCTYPE html>
<html lang="en">

    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionnez le formulaire par son identifiant
            var form = document.getElementById('inscriptionForm');

            // Ajoutez un gestionnaire d'événement pour l'événement de soumission du formulaire
            form.addEventListener('submit', function(event) {
                var Titre = document.forms["inscriptionForm"]["Titre"].value;
                var Description = document.forms["inscriptionForm"]["Description"].value;
                var Categorie = document.forms["inscriptionForm"]["Categorie"].value;
                var Format = document.forms["inscriptionForm"]["Format"].value;
                var DatePost = document.forms["inscriptionForm"]["DatePost"].value;
                var DateExpir = document.forms["inscriptionForm"]["DateExpir"].value;
                var Langue = document.forms["inscriptionForm"]["Langue"].value;
                var Prix = document.forms["inscriptionForm"]["Prix"].value;
                var CompetencesAcquises = document.forms["inscriptionForm"]["CompetencesAcquises"].value;
                var Prerequis = document.forms["inscriptionForm"]["Prerequis"].value;
                var Certification = document.forms["inscriptionForm"]["Certification"].value;
                var Support = document.forms["inscriptionForm"]["Support"].value;
                // Empêchez le comportement par défaut du formulaire
                event.preventDefault();

                // Récupérez les données du formulaire
                var formData = new FormData(form);

                // Envoyez une requête AJAX au script ModifierCoursController.php
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../../Control/actions/ModifierCoursController.php', true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // La requête a réussi, vous pouvez afficher un message de succès ou effectuer d'autres actions
                        console.log('Notification SMS envoyée avec succès !');
                    } else {
                        // La requête a échoué, vous pouvez afficher un message d'erreur ou effectuer d'autres actions
                        console.error('Erreur lors de l\'envoi de la notification SMS.');
                    }
                };
                xhr.onerror = function() {
                    // Une erreur s'est produite lors de l'envoi de la requête
                    console.error('Erreur réseau lors de l\'envoi de la notification SMS.');
                };
                xhr.send(formData);
            });
        });
        </script>

<head>
    <meta charset="utf-8">
    <title>JobEntry - Job Portal Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../../assests/front/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../assests/front/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../assests/front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../assests/front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../assests/front/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <img src="../../assests/front/img/kaween3.png" alt="" width="200" height="50" />
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link">Accueil</a>
                    <a href="about.php" class="nav-item nav-link">A propos</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Cours</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="addchercheur.php" class="dropdown-item">ajouter cours</a>
                            <a href="gerercours.php" class="dropdown-item">les cours</a>
                    
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="category.php" class="dropdown-item">Job Category</a>
                            <a href="testimonial.php" class="dropdown-item">Nos offres</a>
                            <a href="404.php" class="dropdown-item">404</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contactez-nous</a>
                </div>
                <a href="login.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">S'inscrire<i
                        class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Cours List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page"> Cours List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

<!-- Section Annonce Chercheur d'Emploi -->
<!-- Formulaire pour l'annonce du chercheur d'emploi -->
<div class="container py-5">
    <h2>Modifier le cours</h2>
    <form id="inscriptionForm" action="#" method="post">
    <div class="mb-3">
            <label for="Titre" class="form-label">Titre:</label>
            <input type="text" class="form-control" id="Titre" name="Titre" required>
        </div>
        <div class="mb-3">
            <label for="Description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="Description" name="Description" required>
        </div>
        <div class="mb-3">
            <label for="Categorie" class="form-label">Categorie:</label>
            <input type="text" class="form-control" id="Categorie" name="Categorie" required>
        </div>
        <div class="mb-3">
            <label for="Format" class="form-label">Format:</label>
            <input type="text" class="form-control" id="Format" name="Format">
        </div>
        <div class="mb-3">
            <label for="DatePost" class="form-label">DatePost:</label>
            <input type="date" class="form-control" id="DatePost" name="DatePost">
        </div>
        <div class="mb-3">
            <label for="DateExpir" class="form-label">DateExpir:</label>
            <input type="date" class="form-control" id="DateExpir" name="DateExpir">
        </div>
        <div class="mb-3">
            <label for="Langue" class="form-label">Langue:</label>
            <input type="text" class="form-control" id="Langue" name="Langue">
        </div>
        <div class="mb-3">
            <label for="Prix" class="form-label">Prix:</label>
            <input type="number" class="form-control" id="Prix" name="Prix">
        </div>
        <div class="mb-3">
            <label for="CompetencesAcquises" class="form-label">CompetencesAcquises:</label>
            <input type="text" class="form-control" id="CompetencesAcquises" name="CompetencesAcquises">
        </div>
        <div class="mb-3">
            <label for="Prerequis" class="form-label">Prerequis:</label>
            <input type="text" class="form-control" id="Prerequis" name="Prerequis">
        </div>
        <div class="mb-3">
            <label for="Certification" class="form-label">Certification:</label>
            <input type="text" class="form-control" id="Certification" name="Certification">
        </div>
        <div class="mb-3">
            <label for="Support" class="form-label">Support:</label>
            <input type="file" class="form-control" id="Support" name="Support" accept=".pdf">
        </div>
        <div class="mb-3">
        <button type="submit" name="submit"href="../../Control/actions/updatejob.php?id=<?= $coursK['IdCours']; ?>" class="btn btn-primary" >Modifier cours</button>
        </div>
    </form>
</div>



       
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Company</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Your email">
                            <button type="button"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assests/front/lib/wow/wow.min.js"></script>
    <script src="../../assests/front/lib/easing/easing.min.js"></script>
    <script src="../../assests/front/lib/waypoints/waypoints.min.js"></script>
    <script src="../../assests/front/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../assests/front/js/main.js"></script>
</body>

</html>