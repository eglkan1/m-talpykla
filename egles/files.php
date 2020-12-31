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
  <link rel="stylesheet" href="css/styles2.css">
  <link rel="stylesheet" href="css/mybootstrap.css">
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
  </header>

  <div id="logout-btn" class="visible-xs text-center">
    Labas
    <a href="#">
      Atsijungti
    </a>
  </div>

  <div class="wrapper">
    <div class="title col-lg-12">
      <p> <?php echo $title; ?> </p>
    </div>
  </div>


  <div class="container">
    <div class="input-icons">
      <i class="fa fa-search">
      </i>
      <input type="text" placeholder="Ieškoti..." id="searchBox">
      <div class="dropdown  pull-right">
  <button class="dropdown-toggle btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Daugiau
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="create_test.php">Kurti testą</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Rūšiuoti nuo naujausio</a></li>
    <li><a href="#">Rūšiuoti nuo seniausio</a></li>
  </ul>
</div>
      <button id="add" type="button" class="add-object pull-right">+</button>
    </div>
  </div>

  <!-- Modal Section for creating a folder-->
  <?php

  if (isset($_SESSION['message'])) : ?>

    <div class="alert alert-<?php=$_SESSION['msg_type']?>">

      <?php
      echo ($_SESSION['message']);
      unset($_SESSION['message']);
      ?>

    </div>

  <?php endif ?>
  <?php
  $conn = new mysqli('localhost', 'root', '', 'mtalpykla') or die (mysqli_error($conn));


  if(!empty($_GET['searchtext'])){
    $searchtext = trim($_GET['searchtext']);
   
    $result = $conn->query ("SELECT * FROM files
    WHERE title LIKE '%$searchtext%' 
    AND fk_FOLDERid = $id") or die ($conn->error);
    }
    else{
      $result = $conn->query ("SELECT * 
      FROM files AS b 
      WHERE b.fk_FOLDERid = $id") or die ($conn->error);
    }

  ?>
  <?php
  while ($row = $result->fetch_assoc()) :
  ?>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4 files-in-a-rows">
          <a href="../m-talpykla/images/"> 
          <?php echo $row['title']; ?> </a><br>
          <img src="../m-talpykla/images/file.png" alt="File icon" width="100" height="100">
        <div class="wrapper-icons"> <br>
          <a href="account.php?edit=<?php echo $row['id']; ?>"
                class="btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="create_folder.php?delete=<?php echo $row['id']; ?>"
                 class="btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                 <a href="download.php?id=<?php echo $row['id']; ?>" download
                 class="btn"><i class="fa fa-download" aria-hidden="true"></i></a>
        </div>
        </div> 
      <?php endwhile; ?>
      </div>
    </div>

  <?php 
  $files = scandir("images");
  for ($a=2; $a < count($files); $a++) {

  } 
   
  ?>

    <?php
    pre_r($result->fetch_assoc());
    pre_r($result->fetch_assoc());
    function pre_r($array)
    {
      print_r($array);
    }
    ?>
    <?php
    if ($update == true) :
    ?>
      <div class="add-modal" style="display: flex;">
      <?php else : ?>
        <div class="add-modal">
        <?php endif; ?>
        <div class="modal-content">
          <div class="close">+</div>
          <?php
          if ($update == true) :
          ?>
            <h3 class="text-center">KEISTI KATALOGO PAVADINIMĄ</h3>
          <?php else : ?>
            <h3 class="text-center">ĮKELTI FAILĄ</h3>
          <?php endif; ?>
          <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="Failo pavadinimas" value="<?php echo $title; ?>" name="title" required="required">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <div class="button btn-login">
              <?php
              if ($update == true) :
              ?>
                <input type="submit" class="btn btn-info" name="update" value="Keisti" />
              <?php else : ?>
                <input type="submit" class="btn btn-primary" name="upload" value="Įkelti failą" />
              <?php endif; ?>
            </div>
          </form>
        </div>
        </div>
      </div>
     


        <!-- Footer -->

        <!-- jQuery (Bootstrap JS plugins depend on it) -->
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script-acc.js"></script>

</body>

</html>