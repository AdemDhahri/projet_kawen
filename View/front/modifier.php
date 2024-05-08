<?php

include '../../Model/offre.php';
include '../../Control/jobControl.php';

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    // Retrieve the ID from the URL
    $offer_id = $_GET['id'];

    // Créer une instance de la classe JobControl
    $jobController = new JobControl();

    $offer = $jobController->getOffreById($offer_id);
}

$jobController = new JobControl();
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs sont remplis
    if (
        isset($_POST['titre']) && !empty($_POST['titre']) &&
        isset($_POST['email_r']) && !empty($_POST['email_r']) &&
        isset($_POST['salaire']) && !empty($_POST['salaire']) &&
        isset($_POST['localisation']) && !empty($_POST['localisation']) &&
        isset($_POST['horaire']) && !empty($_POST['horaire']) &&
        isset($_POST['description']) && !empty($_POST['description']) &&
        isset($_POST['niveau']) && !empty($_POST['niveau']) &&
        isset($_POST['nbrP']) && !empty($_POST['nbrP'])
    ) {
        // Créer un tableau avec les détails du job
        $jobDetails = new Offre(
            $_POST['titre'],
            $_POST['email_r'],
            $_POST['salaire'],
            $_POST['localisation'],
            $_POST['horaire'],
            $_POST['description'],
            $_POST['niveau'],
            null,
            $_POST['nbrP'],
        );

        // Ajouter le job à la base de données
        if ($jobController->updateOffre($offer_id, $jobDetails)) {
            $success = true;
            unset($_POST);
            header('Location:job-list.php');
            $success = false;
        } else {
            $error = "Une erreur s'est produite lors de l'ajout de l'offre d'emploi.";
            unset($_POST);
        }
    } else {
        $error = "Veuillez saisir tout les champs";
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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../assests/front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../assests/front/css/style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>
       function validatetitle() {
                var titre = document.getElementById("titre").value;
                var titreSpan = document.getElementById("titreSpan");
                if (titre.length > 0) {
                titreSpan.innerText = "Le titre est valide.";
                titreSpan.style.color = "green";
                } else {
                titreSpan.innerText = "Le titre doit avoir moins de 20 caractères.";
                titreSpan.style.color = "red";
                }
                return false; r
            }

        function validmail() {
    var email = document.getElementById("email_r").value;
    var emailSpan = document.getElementById("email_r_span");
    // Vérification de la validité de l'email avec une expression régulière
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (email.length === 0) {
        emailSpan.innerText = "Veuillez saisir une adresse e-mail.";
        emailSpan.style.color = "red";
    } else if (!emailPattern.test(email)) {
        emailSpan.innerText = "Veuillez saisir une adresse e-mail valide.";
        emailSpan.style.color = "red";
    } else {
        emailSpan.innerText = "L'email est valide.";
        emailSpan.style.color = "green";
    }
    
    return false; // Retourne false pour empêcher le formulaire de se soumettre
}
function valids() {
    var salaire = document.getElementById("salaire").value;
    var salaireSpan = document.getElementById("salaireSpan");
    
    if (salaire.length === 0) {
        salaireSpan.innerText = "Veuillez saisir le salaire.";
        salaireSpan.style.color = "red";
    } else if (isNaN(salaire) || parseFloat(salaire) <= 0 || parseFloat(salaire) < 300) {
        salaireSpan.innerText = "Le salaire doit être un nombre valide supérieur à 300.";
        salaireSpan.style.color = "red";
    } else {
        salaireSpan.innerText = "Le salaire est valide.";
        salaireSpan.style.color = "green";
    }
    
    return false; // Retourne false pour empêcher le formulaire de se soumettre
}
function validLoc() {
    var localisation = document.getElementById("localisation").value;
    var localisationSpan = document.getElementById("Lspan");
    
    if (localisation.length === 0) {
        localisationSpan.innerText = "Veuillez saisir la localisation.";
        localisationSpan.style.color = "red";
    } else {
        localisationSpan.innerText = "La localisation est valide.";
        localisationSpan.style.color = "green";
    }
    
    return false; // Retourne false pour empêcher le formulaire de se soumettre
}
function validNiveau() {
    var niveau = document.getElementById("niveau").value;
    var niveauSpan = document.getElementById("Nspan");
    
    // Tableau des niveaux valides
    var niveauxValides = ["niveau secondaire", "bac", "bac+1", "bac+2", "bac+3", "bac+4", "bac+5", "bac+6", "bac+7", "bac+8", "bac+9", "bac+10"];
    
    // Vérifie si le niveau saisi est dans le tableau des niveaux valides
    if (niveauxValides.includes(niveau.toLowerCase())) {
        niveauSpan.innerText = "Le niveau d'expérience est valide.";
        niveauSpan.style.color = "green";
    } else {
        niveauSpan.innerText = "Veuillez saisir un niveau d'expérience valide (niveau secondaire, bac, bac+1, ...).";
        niveauSpan.style.color = "red";
    }
    
    return false; // Retourne false pour empêcher le formulaire de se soumettre
}

function validPost() {
    var nbrPostes = document.getElementById("nbrP").value;
    var postesSpan = document.getElementById("Pspan");
    
    // Vérifie si le nombre de postes est vide ou n'est pas un nombre positif
    if (nbrPostes === "" || isNaN(nbrPostes) || parseInt(nbrPostes) <= 0) {
        postesSpan.innerText = "Veuillez saisir un nombre valide de postes disponibles.";
        postesSpan.style.color = "red";
    } else {
        postesSpan.innerText = "Le nombre de postes est valide.";
        postesSpan.style.color = "green";
    }
    
    return false; // Retourne false pour empêcher le formulaire de se soumettre
}

function validDescription() {
    var description = document.getElementById("description").value;
    var descriptionSpan = document.getElementById("Dspan");
    
    // Vérifie si la description est vide
    if (description.trim() === "") {
        descriptionSpan.innerText = "Veuillez saisir une description.";
        descriptionSpan.style.color = "red";
    } else {
        descriptionSpan.innerText = "La description est valide.";
        descriptionSpan.style.color = "green";
    }
    
    return false; // Retourne false pour empêcher le formulaire de se soumettre
}









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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Edit job</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item text-white active" aria-current="page">Edit job </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Edit job</h1>
                <?php
                if (!empty($error))
                    echo '<div class="alert alert-danger" role="alert">
                    ' . $error . '
                </div>'
                        ?>

                    <form id="form" name="form" action="#" method="post" onsubmit="return validateForm()">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" value="<?php echo $offer['titre'] ?>" class="form-control" id="titre" onblur="validatetitle()"
                                    name="titre" placeholder="Title" required>
                                    <span id="titreSpan"></span>
                                <label for="titre">Titre de l'offre</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" value="<?php echo $offer['email_r'] ?>" class="form-control" onblur="validmail()"
                                    id="email_r" name="email_r" placeholder="Your Email" required>
                                    <span id="email_r_span"></span>
                                <label for="email_r">Email du recruteur</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input pattern="[0-9]*" type="number" min="0" value="<?php echo $offer['salaire'] ?>" onblur="valids()"
                                    class="form-control" id="salaire" name="salaire" placeholder="Salary" required>
                                    <span id="salaireSpan"></span>
                                <label for="salaire">Salaire</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="horaire" name="horaire" aria-label="Select Schedule"
                                    required>
                                    <option value="part-time" <?= $offer["horaire"] == 'part-time' ? ' selected="selected"' : ''; ?>>Part-time</option>
                                    <option value="full-time" <?= $offer["horaire"] == 'full-time' ? ' selected="selected"' : ''; ?>>Full-time</option>
                                    <!-- <option selected disabled>Select Schedule</option>
                                    <option value="part-time">Part-time</option>
                                    <option value="full-time">Full-time</option> -->
                                </select>
                                <label for="horaire">Horaire</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" value="<?php echo $offer['localisation'] ?>" class="form-control" onblur="validLoc()"
                                    id="localisation" name="localisation" placeholder="Location" required>
                                    <span id="Lspan"></span>
                                <label for="localisation">Localisation</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" value="<?php echo $offer['niveau'] ?>" class="form-control" onblur ="validNiveau()"
                                    id="niveau" name="niveau" placeholder="Experience" required>
                                    <span id="Nspan"></span>
                                <label for="niveau">Niveau d'expérience requis</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-floating">
                                    <input pattern="[0-100]*" min="1" value="<?php echo $offer['nbrP'] ?>" type="number" class="form-control" id="nbrP" name="nbrP" placeholder="Postes dispo"
                                        required  onblur ="validPost()">
                                       <span id="Pspan"></span>
                                    <label for="nbrP">Postes</label>
                                </div>
                            </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="description"  onblur="validDescription()"
                                    name="description" style="height: 150px" required>
                                        <?php echo htmlspecialchars($offer['description']) ?>
                                    </textarea>
                                     <span id="Dspan"></span>
                                <label for="description">Description</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- <button class="btn btn-primary w-100 py-3" type="submit">Post job</button> -->

                            <input type="submit" class="btn btn-primary w-100 py-3" value="Edit job">
                        </div>
                    </div>
                </form>

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


</body>

</html>