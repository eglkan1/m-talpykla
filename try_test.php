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

    <?php require_once 'create_test.php'; ?>

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
                Testas
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

    <!-- Form for doing test -->

    <?php
    $conn = new mysqli('localhost', 'root', '', 'mtalpykla') or die(mysqli_error($conn));
    $number = $_GET['n'];
    $query = "SELECT * FROM questions WHERE id = $number";
    $result = mysqli_query($conn, $query);
    $question = mysqli_fetch_assoc($result);


    $query = "SELECT * FROM answers WHERE fk_QUESTIONid = $number";
    $choices = mysqli_query($conn, $query);

    $query = "SELECT * FROM questions";
    $total_questions = mysqli_num_rows(mysqli_query($conn, $query));

    ?>

    <div class="container">
    <div class="modal-content">
        <div class="current">Klausimas <?php echo $number; ?> iš <?php echo $total_questions; ?> </div>
        <p class="question"><?php echo $question['question']; ?> </p>
        <form method="POST" action="test_process.php">
            <ul class="choicess">
                <?php while ($row = mysqli_fetch_assoc($choices)) { ?>
                    <li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['answer']; ?></li>
                <?php } ?>


            </ul>
            <input type="hidden" name="number" value="<?php echo $number; ?>">
            <input type="submit" class="btn btn-danger" name="submit" value="Kitas klausimas">


        </form>
    </div>

    </div>

    <!-- jQuery (Bootstrap JS plugins depend on it) -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>