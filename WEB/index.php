<?php
session_start();

require 'spoj.php';
?>




<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glazbena škola</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="functions.js"></script>
</head>
<body class="gradijent">
    <div class="row">
        <div class="col1-2"><img class="header-image" src="pictures/ss_sivo.png" alt="Logo"></div>
        <div class="col2-10"><h1>Glazbena škola - <small>Djuka</small></h1></div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">Glazbena škola</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item-right"><a class="nav-link" href="Store.php">Store</a></li>
                    <li class="nav-item-right"><a class="nav-link" href="Login.php">Login</a></li>
                    <li class="nav-item-right"><a class="nav-link" href="Signup.php">Sign-up</a></li>
                    <li class="nav-item-right"><a class="nav-link">
                        <?php if(isset($_SESSION['prijavljen'])) echo htmlspecialchars($_SESSION['ime'] . ' ' . $_SESSION['prezime']); 
                    else{
                        echo htmlspecialchars(' ');
                    }
                    ?></a></li>
                    <li class="nav-item-right"><a class="nav-link" href="Odjava.php">
                        <?php if(isset($_SESSION['prijavljen'])) echo htmlspecialchars('Odjava');
                    else {
                        echo htmlspecialchars(' ');
                    }
                    ?></a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div id="slider">
        <figure>
            <img src="pictures/1.jpg">
            <img src="pictures/2.jpg">
            <img src="pictures/3.jpg">
            <img src="pictures/4.jpg">
            <img src="pictures/1.jpg">
        </figure>
    </div>

    <div class="container-fluid mt-1">
        <h3 class="text-lowered">Dobrodošli na našu stranicu, vaše odredište za vrhunsku glazbenu edukaciju! Bez obzira jeste 
            li početnik ili iskusni glazbenik, ovdje ćete pronaći širok izbor glazbenih lekcija prilagođenih vašim potrebama. Naši iskusni 
            instruktori pružaju individualiziranu podršku kako biste unaprijedili svoje vještine i uživali u svijetu glazbe. 
            Pridružite nam se i započnite svoje glazbeno putovanje već danas!</h3>
    </div>

  
    <article>
        <div class="row">

            <div class="col-md-2">
                <img src="pictures/opasnaslika.jpg" width="250", height="250">
            </div>
            <div class="col-md-8">
                <div class="col-md-2"><h2 class="text-gray text-lowered">O nama:</h2></div>
                <h3 >
                    Glazbena škola Đuka osnovana je davne 2019. godine. 
                    Osnovač ove škole je mladi 
                    Apostol Marko koji je htjeo prenjeti svoje znanje na iduće generacije glazbenika. 
                    Tako je započela njegova učiteljska karijera. Danas škola broji tisuće 
                    i tisuće mladih glabenika. Iz Đukine škole je izašao jedan od najboljih 
                    bendova ikad u povijesti. Candyflip.  
                </h3>
            </div>
        </div>

        <div class="row">

            <div class="col-md-2">
                <h3 class="text-gray">Sponzori: </h3>
                <img src="pictures/logo.jpg"  width="250", height="250">  
                <p> Jedan od mnogo sponzora.</p>
            </div>
            <div class="col-md-8">
                <h3 class="text-lowered">
                    Ovo je jedan od prvih sponzora ove škole. Vjerovali su u Đuku od samog početka i donirali su stotine gitara i pun gepek trzalica.
                    Ostali sponzori su: Gibson, Yamaha, Ibanez, Peavey, Orange, Adidas, Supreme.
                    </h3>
            </div>
        </div>

        <footer>
            <p1 class="center">Glazbena škola - <small>Djuka</small></p1>

        </footer>

</body>
</html>