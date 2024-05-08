    <?php
    // Inclure le fichier jobControl.php
    include '../../Model/offre.php';
    include '../../Control/jobControl.php';

    // Créer une instance de la classe JobControl
    $jobController = new JobControl();

    // Appeler la méthode getAllOffres() pour récupérer toutes les offres d'emploi
    $offres = $jobController->getAllOffres();


    // Vérification de la requête POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération de l'ID de l'offre à supprimer

        if (isset($_POST["id"])) {

            $id = $_POST['id'];

            echo $id;

            // Création d'une instance de JobControl
            $jobControl = new JobControl();

            // Suppression de l'offre
            if ($jobControl->deleteOffre($id)) {
                // Redirection vers job-list.php après la suppression
                $offres = array_filter($offres, function ($job) use ($id) {
                    return $job['id_o'] != $id;
                });
            } else {
                // Gestion de l'erreur en cas d'échec de la suppression
                echo "Erreur lors de la suppression de l'offre.";
            }
        }
    }
    ?>



    <!DOCTYPE html>
    <html lang="en">

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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="../../assests/front/css/bootstrap.min.css" rel="stylesheet">


        <!-- Template Stylesheet -->
        <link href="../../assests/front/css/style.css" rel="stylesheet">
        <link href="../../assests/front/css/job-list.css" rel="stylesheet">
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
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                    <img src="../../assests/front/img/kaween3.png" alt="" width="200" height="50" />
                </a>
                <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                        <a href="index.html" class="nav-item nav-link">Accueil</a>
                        <a href="about.html" class="nav-item nav-link">A propos</a>
                        <a href="job-list.php" class="nav-item nav-link">Jobs</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="category.html" class="dropdown-item">Job Category</a>
                                <a href="testimonial.html" class="dropdown-item">Nos offres</a>
                                <a href="404.html" class="dropdown-item">404</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contactez-nous</a>
                    </div>
                    <a href="login.html" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">S'inscrire<i
                            class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Header End -->
            <div class="container-xxl py-5 bg-dark page-header mb-5">
                <div class="container my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Header End -->

            <div class="container text-center mb-5">
                <a href="addjob.php" class="btn btn-primary">Add Job</a>
            </div>

    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="row">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                            href="#tab-1" data-bs-target="#tab-1">
                            <h6 class="mt-n1 mb-0">Featured</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill"
                            href="#tab-2" data-bs-target="#tab-2">
                            <h6 class="mt-n1 mb-0">Full Time</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                            href="#tab-3" data-bs-target="#tab-3">
                            <h6 class="mt-n1 mb-0">Part Time</h6>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="tab-1">
                <div class="row">
                    <?php
                    // Afficher chaque offre dans une liste
                    foreach ($offres as $index => $offre) {
                        ?>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $offre['titre']; ?></h5>
                                    <p class="card-text">Email du recruteur: <?php echo $offre['email_r']; ?></p>
                                    <p class="card-text">Salaire: <?php echo $offre['salaire']; ?></p>
                                    <p class="card-text">Localisation: <?php echo $offre['localisation']; ?></p>
                                    <p class="card-text">Horaire: <?php echo $offre['horaire']; ?></p>
                                    <div class="btn-row">
                                        <!-- Ajouter ici les boutons pour les actions -->
                                        <button type="button" class="btn btn-primary">
                                            <a href="modifier.php?id=<?php echo $offre['id_o']; ?>">
                                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-dark">
                                            <a href="job-detail.php?id=<?php echo $offre['id_o']; ?>">
                                                <i class="fa-solid fa-info"></i> Détails
                                            </a>
                                        </button>
                                        <form action="" id="deleteForm" name="deleteForm" method="post">
                                            <input type="hidden" name="id" value="<?php echo $offre['id_o']; ?>">
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->



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

        <?php
        // Inclure le fichier jobControl.php et les autres dépendances nécessaires
        include_once "../../Control/jobControl.php";

        // Vérifier si l'offre a été publiée avec succès
        if (isset($success) && $success) {
            echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Success",
                    text: "Offre publiée avec succès",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            });
        </script>';
        }
        ?>
        <script>
   document.addEventListener("DOMContentLoaded", function() {
    // Récupérer les liens des onglets pour Full Time et Part Time
    var allTab = document.querySelector('[data-bs-target="#tab-1"]');
    var fullTimeTab = document.querySelector('[data-bs-target="#tab-2"]');
    var partTimeTab = document.querySelector('[data-bs-target="#tab-3"]');

    // Ajouter des écouteurs d'événements de clic sur les onglets
    allTab.addEventListener("click", function() {
        showAllJobs();
    });

    fullTimeTab.addEventListener("click", function() {
        filterJobs("full-time");
    });

    partTimeTab.addEventListener("click", function() {
        filterJobs("part-time");
    });

    // Fonction pour afficher toutes les offres d'emploi
    function showAllJobs() {
        // Récupérer toutes les cartes d'offres d'emploi
        var jobCards = document.querySelectorAll("tab-1 .col-md-6 mb-4");

        // Afficher toutes les cartes
        jobCards.forEach(function(card) {
            card.style.display = "block";
        });
    }

    // Fonction pour filtrer les offres d'emploi en fonction du type de contrat
    function filterJobs(contractType) {
        // Récupérer toutes les cartes d'offres d'emploi
        var jobCards = document.querySelectorAll("tab-1 .col-md-6 mb-4");

        // Parcourir toutes les cartes et masquer celles qui ne correspondent pas au type de contrat sélectionné
        jobCards.forEach(function(card) {
            var jobContractType = card.querySelector(".card").textContent.trim();
            if (jobContractType !== contractType) {
                card.style.display = "none";
            } else {
                card.style.display = "block"; // Rétablir l'affichage par défaut
            }
        });
    }
});





    </script>

    </body>

    </html>