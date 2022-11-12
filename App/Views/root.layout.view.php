<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>

        <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Condensed&display=swap" rel="stylesheet">

    <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/navBar.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ml-3 mb-auto ml-lg-auto " href="?c=domov">Body INN</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-left " id="navbarNav">
                <ul class="navbar-nav ml-3 mb-2 ml-lg-5">
                    <li class="nav-item active">
                        <a class="nav-link" href="?c=domov">Fitnescentrum<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=domov&a=treningy">Tréningy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=rezervaciePriestor">Rezervácia priestoru</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-3 mb-2 ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link"  id="Kontakty" href="?c=domov&a=kontakty">
                            Kontakty
                        </a>
                    </li>
                    <li class="icons d-none d-lg-flex">
                        <a href="https://www.instagram.com/bodyinn_gym_zvolen/" target="_blank">
                            <img  src = "../../public/icons/square-instagram.svg" alt="Instagram contact" id="instagramIcon">
                        </a>
                    </li>
                    <li class="icons d-none d-lg-flex">
                        <a href="https://www.facebook.com/Body-INN-106794408867905" target="_blank">
                            <img src = "../../public/icons/square-facebook.svg" alt="Facebook contact" id="facebookIcon">
                        </a>
                    </li>
                    <li class="icons d-none d-lg-flex">
                        <a href="tel:0915552573">
                            <img src = "../../public/icons/square-phone-solid.svg" alt="Phone contact" id="phoneIcon">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<div class="container-fluid">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>

<footer class="bg-white">
    <!-- Copyrights -->
    <div class="bg-light">
        <div id="footer-text"  class="container-fluid text-center">
            <p class="text-muted mb-0">© 2022 Created by Maros Gorny</p>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
