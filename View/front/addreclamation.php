<?php
include '../../Model/reclamations.php';
include '../../Control/reclamationsC.php';
include '../../Control/addreclam.php';
$error = '';
$success = false;
?>
<!--
<script>
   document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form').addEventListener('submit', function(event) {
                var nom = document.forms["form"]["nom"].value;
                var phone = document.forms["form"]["phone"].value;



                // Utilisation d'une expression régulière pour vérifier que le nom contient uniquement des lettres alphabétiques
                var lettersOnly = /^[A-Za-z]+$/;
                var numericOnly = /^[0-9]+$/;

                if (!lettersOnly.test(nom) || nom.length < 2) {
                    alert("Veuillez entrer un nom valide (lettres uniquement et au moins 2 caractères).");
                    event.preventDefault(); // Empêche l'envoi du formulaire si la validation échoue
                }
                
                if (!numericOnly.test(phone) || phone.length !==8) {
                    alert("Veuillez entrer un numéro de téléphone valide (8 chiffres).");
                    event.preventDefault();
                }
               
                // Autres validations à ajouter si nécessaire
            });
        });
    </script>
    -->
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Envoyer une Réclamation</h1>
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
        <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                        style="width: 45px; height: 45px;">
                                        <i class="fa fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <span>12 Résidence Saint Germain 2045 La Marsa</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                        style="width: 45px; height: 45px;">
                                        <i class="fa fa-envelope-open text-primary"></i>
                                    </div>
                                    <span>KAWEN@gmail.com</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                        style="width: 45px; height: 45px;">
                                        <i class="fa fa-phone-alt text-primary"></i>
                                    </div>
                                    <span>+216 53 770 342</span>
                                </div>
                            </div>
                        </div>
                    </div>
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Envoyer une reclamation</h1>
                <?php
                if (!empty($error))
                    echo '<div class="alert alert-danger" role="alert">
                    ' . $error . '</div>'
                        ?>

<form id="form" name="form" action="#" method="post">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                <label for="nom">Nom</label>
                <div id="nomError" class="error-message"></div> <!-- Element pour afficher le message d'erreur -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="email" class="form-control" id="mail" name="mail" placeholder="Your Email">
                <label for="mail">Email</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                <label for="phone">Phone</label>
                <div id="phoneError" class="error-message"></div> <!-- Element pour afficher le message d'erreur -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <select class="form-select" id="retour" name="retour" aria-label="Select Schedule">
                    <option selected disabled>Veuillez choisir</option>
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
                <label for="retour">Voudriez-vous avoir un retour à cette réclamation</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input type="text" class="form-control" id="objet" name="objet" placeholder="Objet">
                <label for="objet">Objet</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a message here" id="description" name="description" style="height: 150px"></textarea>
                <label for="description">Description</label>
            </div>
        </div>
        <form id="form" name="form" href="mailing.php" method="post">
            <div class="row g-3">
                <!-- Vos champs de formulaire existants vont ici -->
                <div class="col-12">
                    <input type="hidden" name="email" id="email">
                    <input type="submit" id="submit" name="submit" class="btn btn-primary w-100 py-3" value="Envoyer la réclamation" onclick="document.getElementById('email').value = document.getElementById('mail').value;">
                    
                </div>
            </div>
        </form>



    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('form').addEventListener('submit', function(event) {
            var nom = document.forms["form"]["nom"].value;
            var phone = document.forms["form"]["phone"].value;

            var lettersOnly = /^[A-Za-z]+$/;
            var numericOnly = /^[0-9]+$/;

            var nomError = document.getElementById('nomError');
            var phoneError = document.getElementById('phoneError');

            nomError.innerHTML = ''; // Réinitialisation du message d'erreur
            phoneError.innerHTML = ''; // Réinitialisation du message d'erreur

            if (!lettersOnly.test(nom) || nom.length < 2) {
                nomError.innerHTML = "Veuillez entrer un nom valide (lettres uniquement et au moins 2 caractères).";
                event.preventDefault(); 
            }

            if (!numericOnly.test(phone) || phone.length !== 8) {
                phoneError.innerHTML = "Veuillez entrer un numéro de téléphone valide (8 chiffres).";
                event.preventDefault();
            }
        });
    });
</script>

<style>
    .error-message {
        color: red;
        font-size: 12px;
    }
</style>


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