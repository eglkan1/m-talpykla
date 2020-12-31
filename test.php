<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Metodinės medžiagos talpykla</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles3.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <?php require_once 'create_folder.php'; ?>

    <header>
        <nav id="header-nav" class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="index.php" class="pull-left">
                        <div id="logo-img" alt="Logo image"></div>
                    </a>
                    <div class="navbar-brand">
                        <a href="index.php">
                            <h1>M-TALPYKLA</h1>
                        </a>
                        <p>
                            <span>metodinės medžiagos talpykla</span>
                        </p>
                    </div>
                </div>

                <ul id="nav-list" class="pull-right hidden-xs">
                    <li id="logout">
                        <a href="logout.php">Atsijungti</a>
                    </li>
                </ul>

                <ul id="nav-list-acc" class="pull-right hidden-xs">
                    <li id="folders">
                        <a href="account.php" id="folders">Mano katalogai</a>
                    </li>
                </ul>

                <ul id="nav-list-acc" class="pull-right hidden-xs">
                    <li id="folders">
                        <a href="my_tests.php" id="folders">Mano testai</a>
                    </li>
                </ul>
    </header>

    <div id="logout-btn" class="visible-xs text-center">
        <a href="logout.php">
            Atsijungti
        </a>
    </div>

    <div class="wrapper">
        <div class="title col-lg-12">
            <p>
                Sukurti testą
            </p>
        </div>
    </div>

    <?php

if (isset($_SESSION['message'])) : ?>

  <div class="container alert alert-<?php=$_SESSION['msg_type']?>">

    <?php
    echo ($_SESSION['message']);
    unset($_SESSION['message']);
    ?>

  </div>

<?php endif ?>


    <!-- Modal Section for creating a quiz-->
    <div class="container">
        <div class="modal-content">
        <form action="create_test.php" method="POST" enctype="multipart/form-data">
            <h2><input type="text" placeholder="Įrašykite testo pavadinimą" name="title" id="testName" required="required"></h2>
                <input type="hidden" name="test_id" value="<?php echo $id; ?>">
                <input class="btn btn-danger" name="start" type="submit" value="Pridėti">
        </form>
        </div>
    </div>



    <!-- jQuery (Bootstrap JS plugins depend on it) -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>