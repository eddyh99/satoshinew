<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>

    <!-- Favicons -->
    <link href="<?= BASE_URL ?>assets/img/logo.png" rel="icon">
    <link href="<?= BASE_URL ?>assets/img/logo.png" rel="apple-touch-icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Odor+Mean+Chey&display=swap" rel="stylesheet">

    <!-- Icon Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Telephone Code -->
    <link href="<?= BASE_URL ?>assets/libs/intl-tel-input-master/build/css/intlTelInput.css" rel="stylesheet">
    

    <!-- Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/style/css/main.css">
</head>
<body>
    <!-- Start of Navbar -->
    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container">
            <a class="navbar-logo" href="<?= BASE_URL?>">
                <img class="logo" src="<?= BASE_URL?>assets/img/new-logo.png" alt="logo pnglobal">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="openbtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-0 me-xl-2">
                        <a class="nav-link" aria-current="page" href="<?=BASE_URL?>homepage/hotdeals">HOT DEAL</a>
                    </li>
                    <li class="nav-item me-0 me-xl-2">
                        <a class="nav-link" aria-current="page" href="<?=BASE_URL?>homepage/secret_formula">SECRET FORMULA</a>
                    </li>
                    <li class="nav-item me-0 me-xl-2">
                        <a class="nav-link" aria-current="page" href="<?=BASE_URL?>homepage/giveaway">GIVEAWAY</a>
                    </li>
                    <li class="nav-item me-0 me-xl-2">
                        <a class="nav-link" href="<?=BASE_URL?>?type=service">CONTACTS</a>
                    </li>
                    <li class="nav-item me-0 me-lg-3 d-flex align-items-center justify-content-center">
                        <a class="btn-navbar-contactform text-white text-center" href="<?= BASE_URL ?>">START MAKING <span class="d-block">MONEY</span></a>
                    </li>
                    <li class="nav-item mt-2 mt-lg-0 d-flex align-items-center justify-content-center">
                        <a class="btn-navbar-referral btn-navbar-contactform text-center" href="<?= BASE_URL ?>homepage/contactreferral">REFERRAL <span class="d-block">LOGIN</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of Navbar -->
