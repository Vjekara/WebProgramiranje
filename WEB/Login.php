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


    <div class="container">
        <h1 class="littleleft">Login!</h1>
        <form action="" method="post">
            <br>
            <label for="name">Username: </label>
            <input type="text" name="korisnicko_ime" id="korisnicko_ime" required>
            <br>
            <label for="name">Password: </label>
            <input type="password" name="lozinka" id="lozinka" required>
            <br>
            <button type="submit">Login!</button>
        </form>
    </div>


    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
    <?php
require 'spoj.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];

    $stmt = $conn->prepare("SELECT * FROM korisnici WHERE k_ime = ? AND lozinka = ?");
    $stmt->bind_param("ss", $korisnicko_ime, $lozinka);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        $_SESSION['prijavljen'] = true;
        $_SESSION['username'] = $user['k_ime'];
        $_SESSION['ime'] = $user['ime'];
        $_SESSION['prezime'] = $user['prezime'];
        $_SESSION['uloga'] = $user['uloga'];


        if ($user['uloga'] === 'admin') {
            header("Location: index.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        echo "Neispravno korisničko ime ili lozinka.";
    }
}
?>
    </div>
</div>
</body>
</html>