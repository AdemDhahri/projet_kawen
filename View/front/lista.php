<?php
// Inclure le fichier jobControl.php
include '../../Model/offre.php';
include '../../Control/condidaControl.php';
include '../../Model/condidature.php';
include '../../Control/jobControl.php';
include './add_notifications.php';


$notifController = new NotificationController();

// Check if the ID parameter is set in the URL
if (isset($_GET['id_o'])) {
    // Retrieve the ID from the URL
    $offer_id = $_GET['id_o'];

    // Créer une instance de la classe JobControl
    $jobController = new JobControl();

    $offer = $jobController->getOffreById($offer_id);
}

// Créer une instance de la classe JobControl
$condidaControl = new CondidaControl();

// Appeler la méthode getAllOffres() pour récupérer toutes les offres d'emploi
$condidats = $condidaControl->getAllCByOffer($offer_id);

// Vérification de la requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'ID de l'offre à supprimer

    if (isset($_POST["CIN"])) {

        $CIN = $_POST['CIN'];


        // Suppression de l'offre
        if ($condidaControl->deleteC($CIN)) {
            // Redirection vers job-list.php après la suppression
            $condidats = array_filter($condidats, function ($job) use ($CIN) {
                return $job['cin'] != $CIN;
            });
            $notifController->addNotification(new Notif(null, "Vouz Avez supprimer le condida", null));
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function () {
            $('.decrease-posts').click(function () {
                const offerId = $(this).data('offer-id');
                const condId = $(this).data('cond-id');

                $.ajax({
                    url: 'decrease_posts.php',
                    type: 'POST',
                    data: { offer_id: offerId, condidatCIN: condId },
                    success: function (response) {
                        // Mettez à jour l'interface utilisateur si nécessaire
                        Swal.fire({
                            title: "Success",
                            text: "Condida accepté!",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: "Erreur",
                            text: "Une erreur s'est produite!",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            });
        });
    </script>

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
                    <a href="job-list.php" class="nav-item nav-link ">Nos offres</a>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">List des condidatures de cet offre</h1>
                <nav aria-label="breadcrumb">

                </nav>
            </div>
        </div>
        <!-- Header End -->



        <!-- Jobs Start -->
<div class="row">
    <div id="tab-1">
        <?php foreach ($condidats as $condidat) { ?>
            <!-- Affichage des détails de l'offre -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $condidat['titre']; ?></h5>
                    <p class="card-text">Nom: <?php echo $condidat['nom']; ?></p>
                    <p class="card-text">Prénom: <?php echo $condidat['prenom']; ?></p>
                    <p class="card-text">Email: <?php echo $condidat['email']; ?></p>
                    <p class="card-text">Téléphone: <?php echo $condidat['phone']; ?></p>
                    <p class="card-text">CV: <?php echo $condidat['cv']; ?></p>
                    <p class="card-text">Compétence: <?php echo $condidat['competence']; ?></p>

                    <!-- Actions pour chaque candidature -->
                    <div class="btn-group">
                        <?php if ($condidat['etat_C'] != 'A') { ?>
                            <!-- Bouton pour accepter la candidature -->
                            <button type="button" class="btn btn-primary decrease-posts"
                                data-offer-id="<?php echo $condidat['id_o']; ?>"
                                data-cond-id="<?php echo $condidat["cin"]; ?>">
                                <i class="far fa-check-circle"></i> Accepter
                            </button>
                        <?php } ?>

                        <!-- Bouton pour modifier la candidature -->
                        <button type="button" class="btn btn-primary">
                            <a href="modifierCondida.php?cin=<?php echo $condidat['cin']; ?>">
                                <i class="far fa-edit"></i> Modifier
                            </a>
                        </button>

                        <!-- Formulaire pour supprimer la candidature -->
                        <form action="" id="deleteForm" name="deleteForm" method="post">
                            <input type="hidden" name="CIN" value="<?php echo $condidat['cin']; ?>">
                            <button class="btn btn-danger">
                                <i class="far fa-trash-alt"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
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
    // Vérifier si l'offre a été publiée avec succès
    if (isset($success) && $success) {
        echo '
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


</body>

</html>