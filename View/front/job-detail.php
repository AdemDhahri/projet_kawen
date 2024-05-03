<?php
include '../../Model/offre.php';
include '../../Control/jobControl.php';
include '../../Model/condidature.php';
include '../../Control/condidaControl.php';




// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    // Retrieve the ID from the URL
    $offer_id = $_GET['id'];

    // Créer une instance de la classe JobControl
    $jobController = new JobControl();

    $offer = $jobController->getOffreById($offer_id);
}

$error = '';
$success = false;


$condiaControl = new CondidaControl();
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs sont remplis
    if (
        isset($_POST['CIN']) && !empty($_POST['CIN']) &&
        isset($_POST['nom']) && !empty($_POST['nom']) &&
        isset($_POST['prenom']) && !empty($_POST['prenom']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['phone']) && !empty($_POST['phone']) &&
        isset($_FILES['cv']) && !empty($_FILES['cv']) &&
        isset($_POST['competence']) && !empty($_POST['competence'])

    ) {
        $folder = "../../upload/";

        $target_file = $folder . basename($_FILES["cv"]["name"]);

        $filType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {

            // Créer un tableau avec les détails du job
            $condidature = new Condidature(
                $_POST['CIN'],
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $_POST['phone'],
                basename($_FILES["cv"]["name"]),
                $_POST['competence'],
                "EN COURS"
            );

            // Ajouter le job à la base de données
            if ($condiaControl->createC($condidature, $offer_id)) {
                $success = true;
                unset($_POST);
                unset($_FILES);
                header("Location:lista.php?id_o=$offer_id");
                $success = false;
            } else {
                $error = "Une erreur s'est produite lors de l'ajout de l'offre d'emploi.";
                unset($_POST);
                unset($_FILES);
            }
        }
    }
} else {
    $error = "Veuillez saisir tout les champs";
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
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.php" class="dropdown-item">Job List</a>
                            <a href="job-detail.php" class="dropdown-item active">Job Detail</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="category.html" class="dropdown-item">Job Category</a>
                            <a href="testimonial.html" class="dropdown-item"> Nos offres</a>
                            <a href="404.html" class="dropdown-item">404</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contactez-nous</a>
                </div>
                <a href="login.html" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">s'inscrire<i
                        class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <!--<img class="flex-shrink-0 img-fluid border rounded" src="/assests/front/img/com-logo-2.jpg"
                                alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3"></h3>
                                <span class="text-truncate me-3"><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i></span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full
                                    Time</span>
                                <span class="text-truncate me-0"><i
                                        class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                            </div>-->
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Titre de l'offre</h4>
                            <p><?php echo $offer['titre']; ?></p>
                            <h4 class="mb-3">discription</h4>
                            <p><?php echo $offer['description']; ?></p>
                            <h4 class="mb-3">niveau demandé</h4>
                            <p><?php echo $offer['niveau']; ?></p>
                             <form action="export.php" method="post">
        <input type="hidden" name="offer_id" value="<?php echo $offer_id; ?>">
                                <button type="submit" class="btn btn-primary">Exporter les données de l'offre</button>
                            </form>

                        </div>

                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form id="form" name="form" action="" method="post" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input name="nom" class="form-control" placeholder="Nom">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input name="prenom" class="form-control" placeholder="Prenom">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="number" name="CIN" pattern="[0-9]{8}" class="form-control"
                                            placeholder="CIN">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="file" name="cv" class="form-control bg-white">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input name="phone" type="tel" class="form-control" placeholder="Telephone">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="competence" class="form-control" rows="5"
                                            placeholder="Compétences"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On:
                                <?php echo $offer['date_p']; ?>
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Email du
                                recruteur:<?php echo $offer['email_r']; ?> </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Horaire:
                                <?php echo $offer['horaire']; ?>
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salarie:
                                <?php echo $offer['salaire']; ?> DT
                            </p>
                            <p><i
                                    class="fa fa-angle-right text-primary me-2"></i>Location:<?php echo $offer['localisation']; ?>
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>nombre des Places
                                disponibles:<?php echo $offer['nbrP']; ?>
                            </p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->


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