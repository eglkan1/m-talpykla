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

    <!-- Modal Section for creating a TEXT type question-->


    <div class="container">
        <div class="modal-content">
            <h1>Pridėti klausimą</h1>
            <form action="create_test.php" method="POST" enctype="multipart/form-data">
                <div class="dropdown">
                    <label for="questionType">Pasirinkite klausimo tipą:</label>
                    <select id="questionType" name="questionType">
                        <option selected>Pasirinkti</option>
                        <option value="open">Atviras klausimas</option>
                        <option value="radio">Žymimas langelis</option>
                        <option value="checkbox">Keli pasirinkimai</option>
                    </select>
                </div>
            </form>

            <div id="open" class="questions">
                <form action="create_test.php" method="POST" enctype="multipart/form-data">
                    <h2><input type="text" placeholder="Įrašykite klausimą" id="testName" required="required"></h2>
                    <input type="text" placeholder="Įrašykite atsakymą" id="textAnswer" required="required">

                    <input class="pull-right btn btn-danger" type="submit" name="addOpenQuestion" value="Išsaugoti klausimą">
                </form>
            </div>

            <!-- Modal Section for creating a RADIO type question-->
            <?php require_once 'create_test.php'; ?>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'mtalpykla') or die(mysqli_error($conn));
            $id=$_GET['add_question'];
            $query = "SELECT * FROM questions AS b 
            WHERE b.fk_TESTid = $id";
            $questions = mysqli_query($conn, $query);
            $total = mysqli_num_rows($questions);
            $next = $total + 1;
            ?>



            <div id="radio" class="questions">
                <form action="create_test.php" method="POST" enctype="multipart/form-data">
                    <p>
                        <label>Testo id:</label>
                        <input type="number" name="testid" value="<?php echo $id; ?>">
                    </p>
                    <p>
                        <label>Klausimo numeris:</label>
                        <input type="number" name="id" value="<?php echo $next; ?>">
                    </p>
                    <h2><input type="text" placeholder="Įrašykite klausimą" name="radio_question_text" id="testName" required="required"></h2>

                    <input type="text" name="answer1"><br>
                    <input type="text" name="answer2"><br>
                    <input type="text" name="answer3"><br>
                    <input type="text" name="answer4"><br>
                    <input type="text" name="answer5"><br>

                    <p>
                        <label>Teisingas atsakymas:</label>
                        <input type="number" name="correct_answer" value="">
                    </p>
                    <input type="hidden" name="id" value="<?php echo $next; ?>">
                    <input class="pull-right btn btn-danger" name="addRadioQuestion" type="submit" value="Išsaugoti klausimą">

                </form>
            </div>


            <!-- Modal Section for creating a MULTIPLE CHOICE type question-->


            <div id="checkbox" class="questions">
                <form action="">
                    <h2><input type="text" placeholder="Įrašykite klausimą" id="testName" required="required"></h2>

                    <input type="checkbox" id="checkboxAnswer1" name="answer" value="checkboxAnswer1">
                    <input for="checkboxAnswer1" placeholder="Atsakymas"></input><br>
                    <input type="checkbox" id="checkboxAnswer2" name="answer" value="checkboxAnswer2">
                    <input for="checkboxAnswer2" placeholder="Atsakymas"></input><br>
                    <input type="checkbox" id="checkboxAnswer3" name="answer" value="checkboxAnswer3">
                    <input for="checkboxAnswer3" placeholder="Atsakymas"></input><br>
                    <input type="checkbox" id="checkboxAnswer4" name="answer" value="checkboxAnswer4">
                    <input for="checkboxAnswer4" placeholder="Atsakymas"></input><br>
                    <input type="checkbox" id="checkboxAnswer5" name="answer" value="checkboxAnswer5">
                    <input for="checkboxAnswer5" placeholder="Atsakymas"></input><br>

                    <input class="pull-right btn btn-danger" name="addCheckBoxQuestion" type="submit" value="Išsaugoti klausimą">
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#questionType").on('change', function() {
                $(".questions").hide();
                $("#" + $(this).val()).fadeIn(700);
            }).change();
        });
    </script>

    <!-- Modal Section for finishing quiz-->

    <div class="container">
        <div class="modal-content">
            <h2>Testas paruoštas!</h2>

            <form action="">
                <input class="btn btn-info" type="button" value="Peržiūrėti">
            </form>
        </div>
    </div>


    <!-- jQuery (Bootstrap JS plugins depend on it) -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>