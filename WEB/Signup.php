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
        <h1 class="littleleft">Sign-up</h1>
        <form action="" method="post">
            <br>
            <label for="korisnicko_ime">Username: </label>
            <input type="text" name="korisnicko_ime" id="korisnicko_ime" required>
            <br>
            <label for="ime">Ime: </label>
            <input type="text" name="ime" id="ime" required>
            <br>
            <label for="prezime">Prezime: </label>
            <input type="text" name="prezime" id="prezime" required>
            <br>
            <label for="email">Vaša e-mail adresa: </label>
            <input type="text" name="email" id="email" required>
            <br>
            <label for="password">Password: </label>
            <input type="password" name="lozinka" id="lozinka" required>
            <br>
            <button type="submit">Registriraj se</button>
        </form>
    </div>

    <?php
require 'spoj.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];
    $uloga = 'kupac'; 


    $stmt = $conn->prepare("SELECT * FROM korisnici WHERE k_ime = ?");
    $stmt->bind_param("s", $korisnicko_ime);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Korisničko ime već postoji. Odaberite drugo korisničko ime.";
    } else {

        $stmt = $conn->prepare("INSERT INTO korisnici (ime, prezime, e_mail, k_ime, lozinka, uloga) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $ime, $prezime, $email, $korisnicko_ime, $lozinka, $uloga);

        if ($stmt->execute()) {

            $_SESSION['prijavljen'] = true;
            $_SESSION['username'] = $korisnicko_ime;
            $_SESSION['ime'] = $ime;
            $_SESSION['prezime'] = $prezime;
            $_SESSION['uloga'] = $uloga;

            header("Location: index.php");
            exit;
        } else {
            echo "Greška prilikom registracije. Pokušajte ponovno.";
        }
    }
    $stmt->close();
}
?>

</body>
</html>