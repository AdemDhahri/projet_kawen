<?php 
/*session_start();


if (isset($_POST['id_user']) && isset($_POST['mdp'])) 
{*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Emploi | KAWEN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/KAWENICO.ico" rel="icon">

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
                    <a href="index.html" class="nav-item nav-link active">Accueil</a>
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">gestion profil</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="#" class="dropdown-item"> afficher mon profil </a>
                        <a href="#" class="dropdown-item">modifier mon profil </a>
                        <a href="#" class="dropdown-item">desactiver mon profil </a>
                
                    </div>
                </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">gestion reclamation</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.html" class="dropdown-item">faire une reclamation </a>
                            <a href="job-detail.html" class="dropdown-item">lire une reclamation</a>
                    
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Mes affaires </a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Mes annonces</a>
                            <a href="" class="dropdown-item">mes employee</a>
                            <a href="" class="dropdown-item">les contrat </a>
                        </div>
                    </div>

                    <a href="contact.html" class="nav-item nav-link">Contactez-nous</a>
                </div>
                <a href="compte_chercheur.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">mon compte<i
                        class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="/assests/front/img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">
                                        Trouvez l'emploi parfait que vous méritez</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Décrochez l'emploi parfait que vous
                                        méritez avec notre plateforme d'emploi, où vos compétences rencontrent les
                                        meilleures opportunités professionnelles.</p>
                                    <a href=""
                                        class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Rechercher un
                                        emploi</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Trouver
                                        un talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="/assests/front/img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Trouvez le meilleur
                                        emploi de startup qui vous convient</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Explorez les opportunités
                                        passionnantes des startups et trouvez l'emploi idéal qui correspond à vos
                                        ambitions et à votre talent</p>
                                    <a href=""
                                        class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Rechercher un
                                        emploi</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Trouver
                                        un talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="/assests/front/img/imm.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Remises exclusives sur
                                        nos cours. Boostez votre carrière!</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Explorez nos offres et remises dès
                                        maintenant!</p>
                                    <a href="testimonial.html"
                                        class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Découvrir les
                                        Offres</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control border-0" placeholder="Keyword" />
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0">
                                    <option selected>Category</option>
                                    <option value="1">Category 1</option>
                                    <option value="2">Category 2</option>
                                    <option value="3">Category 3</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0">
                                    <option selected>Location</option>
                                    <option value="1">Location 1</option>
                                    <option value="2">Location 2</option>
                                    <option value="3">Location 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->


        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explorez nos différents services</h1>
                <div class="row g-4">

    <style>
        .weather-info {
            width: 300px;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .weather-info h1 {
            margin-top: 0;
        }

        .weather-info p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="weather-info">
        <h1>Current Weather</h1>
        <?php
        // Replace 'YOUR_API_KEY' with your actual API key
        $apiKey = '402cc9695f30e4e1c53af396f42c2518';
        $cityName = 'TUNIS';

        // Fetch the current weather data
        $weatherData = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q={$cityName}&units=metric&appid={$apiKey}");
        $data = json_decode($weatherData);

        // Display the weather information
        if (isset($data->name)) {
        ?>
            <p>City: <?php echo $data->name; ?></p>
            <p>Temperature: <?php echo $data->main->temp; ?>°C</p>
            <p>Feels Like: <?php echo $data->main->feels_like; ?>°C</p>
            <p>Humidity: <?php echo $data->main->humidity; ?>%</p>
            <p>Weather: <?php echo $data->weather[0]->description; ?></p>
        <?php
        }
        ?>
    </div>
</body>
</html>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h6 class="mb-3">Entretien Voiture</h6>
                            <p class="mb-0">90 Vacants</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h6 class="mb-3">Travaux et Bâtiments</h6>
                            <p class="mb-0">50 Vacants</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                            <h6 class="mb-3">Réparations Appareils électroniques et Informatiques</h6>
                            <p class="mb-0">200 Vacants</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                            <h6 class="mb-3">Aide Soignante</h6>
                            <p class="mb-0">66 Vacants</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                            <h6 class="mb-3">Garde Enfants</h6>
                            <p class="mb-0">150 Vacants</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                            <h6 class="mb-3">Education</h6>
                            <p class="mb-0">87 Vacants</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                            <h6 class="mb-3">Autres Services</h6>
                            <p class="mb-0">...</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="../../assests/front/img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="../../assests/front/img/about-2.jpg"
                                    style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="../../assests/front/img/about-3.jpg" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="../../assests/front/img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">Nous vous aidons à obtenir le meilleur emploi et à trouver un talent</h1>
                        <p class="mb-4">Découvrez nos différentes formations </p>
                        <p><i class="fa fa-check text-primary me-3"></i>Les formations qu'on assure</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Le suivi personnel </p>
                        <p><i class="fa fa-check text-primary me-3"></i>Les points Meeting</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="">Plus d'informations</a>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                 
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Liens Rapides</h5>
                        <a class="btn btn-link text-white-50" href="">Accueil</a>
                        <a class="btn btn-link text-white-50" href="">gestion profil</a>
                        <a class="btn btn-link text-white-50" href="">gestion Reclamations</a>
                        <a class="btn btn-link text-white-50" href="">Mes affaires</a>

                        <a class="btn btn-link text-white-50" href="">Contactez-nous</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>23 Rue des Jasmins, Lac 2, Tunis,
                            Tunisie</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>71 555 666</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>KAWEN@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Actualités</h5>
                        <p>Ne ratez plus rien de nos nouvelles</p>
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
<?php 
/*}else{
    // header("Location: login.php");
     exit();
}*/
 ?>