<?php
session_start();

if (!isset($_SESSION['prijavljen'])) {
    header("Location: Login.php");
    exit;
}

require 'spoj.php';


$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($search) {
    $stmt = $conn->prepare("SELECT * FROM proizvodi WHERE proizvod LIKE ? OR opis LIKE ?");
    $searchParam = "%" . $search . "%";
    $stmt->bind_param("ss", $searchParam, $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM proizvodi");
}
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
                    <li class="nav-item-right"><a class="nav-link" href="Signup.php">Sign-Up</a></li>
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
                    <li class="nav-item-right"><a class="nav-link" href="dodaj_proizvod.php"><?php
                      if(isset($_SESSION['prijavljen']) && $_SESSION['uloga'] == 'admin'){
                        echo htmlspecialchars('Dodaj artikl');
                      }
                    ?>
                    </a></li>
                    </ul>
            </div>
            <div class="cart-container">
              <button id="cart-button">
                🛒 Cart (<span id="cart-count">0</span>)
              </button>
              <div id="cart-dropdown" class="dropdown hidden">
                <ul id="cart-items">
                  <li class="empty-message">Your cart is empty.</li>
                </ul>
                <button id="checkout-button" class="checkout-btn hidden">Checkout</button>
              </div>
            </div>
    </nav>

    <body>
    <main class="container">
        <h2 class="my-4">Popis Proizvoda</h2>

        <form method="GET" action="Store.php" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Pretraži proizvode..." value="<?php echo htmlspecialchars($search); ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Pretraži</button>
                </div>
            </div>
        </form>

        <div class="row">
            <?php if ($result->num_rows > 0) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src=<?php echo htmlspecialchars($row['slika']); ?> alt="<?php echo htmlspecialchars($row['proizvod']); ?>" width=200 height=200>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['proizvod']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($row['opis']); ?></p>
                                <p class="card-text"><strong>Cijena: </strong><?php echo htmlspecialchars($row['cijena']); ?></p>
                                <button class="btn btn-primary add-to-cart" data-id="<?php echo htmlspecialchars($row['id']); ?>" data-name="<?php echo htmlspecialchars($row['proizvod']); ?>" data-price="<?php echo htmlspecialchars($row['cijena']); ?>">Dodaj u Košaricu</button>
                                <?php if (isset($_SESSION['prijavljen']) && $_SESSION['uloga'] == 'admin') { ?>
                                    <div class="mt-2">
                                        <a href="izmjena.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-warning btn-sm">Izmijeni</a>
                                        <a href="obrisi.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Jeste li sigurni da želite obrisati ovaj proizvod?');">Obriši</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="text-center w-100">Nema proizvoda za prikaz.</p>
            <?php } ?>
        </div>
    </main>

        <footer>
            <p1 class="center">Glazbena škola - <small>Djuka</small></p1>
        </footer>

        <script src="Script1.js"></script>
</body>
</html>