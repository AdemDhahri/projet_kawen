<?php

include '../../Model/reclamations.php';
include '../../Control/reclamationsC.php';
$reclamationsC = new reclamationsC();
$reclamations = $reclamationsC->getAllreclamation();

$itemsPerPage = 10;

// Get the current page number from the URL, default to page 1
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $itemsPerPage;

// Retrieve reclamations for the current page
$reclamationsControl = new reclamationsC();
$reclamations = $reclamationsControl->getAllReclamationWithLimit($offset, $itemsPerPage);

// Calculate the total number of reclamations
$totalReclamations = $reclamationsControl->getTotalReclamations();
$totalPages = ceil($totalReclamations / $itemsPerPage);


// Vérification de la requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'ID de l'offre à supprimer

    if (isset($_POST["id"])) {

        $id = $_POST['id'];

        echo $id;
  
        $reclama = new reclamationsC();

        // Suppression de l'offre
        if ($reclama->deletereclamation($id)) {
            header("Location:liste_r.php");
            exit();
        } else {
            // Gestion de l'erreur en cas d'échec de la suppression
            echo "Erreur lors de la suppression de la réclamation.";
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
    <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <img src="../../assests/front/img/kaween3.png" alt="" width="200" height="50" />
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link">Accueil</a>
            <a href="about.html" class="nav-item nav-link">A propos</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">chercheur</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="les_chercheurs.php" class="dropdown-item">les chercheurs</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="category.html" class="dropdown-item">Job Category</a>
                    <a href="testimonial.html" class="dropdown-item">Nos offres</a>
                    <a href="404.html" class="dropdown-item">404</a>
                </div>
            </div>
            <a href="" class="nav-item nav-link">Réclamations</a>
        </div>
        <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">mon compte<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>

        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Vos réclamations</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Réclamations</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

        

        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="row">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Liste des réclamations</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a  class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                                href="#tab-1" data-bs-target="#tab-1">
                                <h6 class="mt-n1 mb-0">Featured</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a action="" class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill"
                                href="#tab-2" data-bs-target="#tab-2">
                                <h6 class="mt-n1 mb-0">Traitées</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a action="" class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                                href="#tab-3" data-bs-target="#tab-3">
                                <h6 class="mt-n1 mb-0">Non traitées</h6>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
    <div id="tab-1">
        <!-- Table HTML to display the reclamations -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Email </th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Objet</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reclamations as $reclamation): ?>
                    <tr>
                        <td><?php echo $reclamation['nom']; ?></td>
                        <td><?php echo $reclamation['mail']; ?></td>
                        <td><?php echo $reclamation['tel']; ?></td>
                        <td><?php echo $reclamation['objet']; ?></td>
                        <td><?php echo $reclamation['etat']; ?></td>
                        <td>
                        <div class="btn-row d-flex">
    <!-- Button to modify -->
    <button type="button" class="btn btn-primary me-2 btn-action">
        <a href="modifier_r.php?id=<?php echo $reclamation['id_r']; ?>" class="text-white">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
    </button>
    <!-- Button for details -->
    <button type="button" class="btn btn-dark me-2 btn-action">
        <a href="details_r.php?id=<?php echo $reclamation['id_r']; ?>" class="text-white">
            <i class="fa-solid fa-info"></i>
        </a>
    </button>
    <!-- Button to delete -->
    <form action="" id="deleteForm" name="deleteForm" method="post" class="me-2">
        <input type="hidden" name="id" value="<?php echo $reclamation['id_r']; ?>">
        <button class="btn btn-danger btn-action"><i class="fa-solid fa-trash"></i></button>
    </form>
</div>

<style>
    .btn-action {
        width: 40px; /* Réglez la largeur selon vos besoins */
        height: 40px; /* Réglez la hauteur selon vos besoins */
        padding: 0; /* Supprimer le remplissage pour ajuster la taille */
    }
</style>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="pagination justify-content-end mt-4">
    <style>
        /* Custom CSS for active page button */
        .active-btn {
            background-color: #6c757d; /* Lighter shade of blue */
            border-color: #6c757d; /* Match the border color with the background color */
            color: #fff; /* Text color */
        }
    </style>
    <ul class="pagination">
        <?php if ($currentPage > 1): ?>
            <li class="page-item">
                <a class="page-link btn btn-primary" href="?page=<?php echo ($currentPage - 1); ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($currentPage == $i) ? 'active' : ''; ?>">
                <a class="page-link btn btn-primary <?php echo ($currentPage == $i) ? 'active-btn' : ''; ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <li class="page-item">
                <a class="page-link btn btn-primary" href="?page=<?php echo ($currentPage + 1); ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</div>




                        <div class="container text-center mb-5">
                        <a href="addreclamation.php" class="btn btn-primary">Envoyer une réclamation</a>
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


</body>

</html>