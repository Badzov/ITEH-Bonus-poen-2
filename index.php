<?php

require "model/dbBroker.php";
require "model/user.php";

session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {

    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $korisnik = new User(1, $uname, $pass);
    $odg = $korisnik->logInUser($korisnik, $conn);

    if($odg->num_rows != false && $odg->num_rows > 0) {
        echo "Uspesno ste se prijavili";

        $_SESSION['user_id'] = $korisnik->id;
        header('Location: home.php');
        exit();
    } else {
        ?>
        <body><h1>Neuspesno prijavljivanje!</h1></body>
        <?php
    }

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FON: Zakazivanje kolokvijuma</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="login-form">
        <div class="main-div card shadow-lg p-4">
            <h2 class="text-center">Prijava</h2>
            <form method="POST" action="#">
                <div class="form-group">
                    <label for="username">Korisničko ime</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4" name="submit">Prijavi se</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
