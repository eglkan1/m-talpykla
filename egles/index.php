<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Metodinės medžiagos talpykla</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

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

      <?php
      session_start();
      if (isset($_SESSION['username'])) : ?>

        <ul id="nav-list" class="pull-right hidden-xs">
          <li id="account">
            <a href="account.php">Mano paskyra</a>
          </li>
        </ul>

      <?php else : ?>
        <ul id="nav-list" class="pull-right hidden-xs">
          <li id="login">
            <a href="#">Prisijungti</a>
          </li>
        </ul>

      <?php endif ?>

    </div>
</header>

<body>


  <div id="login-btn" class="visible-xs text-center">
    <a href="#">
      Prisijungti
    </a>
  </div>

  <div class="container-fluid"></div>
  <div class="row">
    <div class="banner-image col-sm-6">
    </div>
    <div class="banner-color col-sm-6">
      <p>
        Saugokite ir dalinkitės
        individualia metodine medžiaga su mokiniais ir studentais
      </p>
      <ul class="banner-links hidden-xs hidden-md hidden-sm">
        <li id="about"><a href="#">Sužinoti daugiau</a></li>
        <li id="register"><a href="#">Registruotis</a></li>
      </ul>

      <div class="banner-links-xs visible-xs visible-md visible-sm">
        <div id="about-btn" class="text-center">
          <a href="#">
            Sužinoti daugiau
          </a>
        </div>
        <div id="register-btn" class="text-center">
          <a href="#">
            Registracija
          </a>
        </div>
      </div>

    </div>
  </div>
  </div>



  <div id="title" class="container">
    <h1 class="text-center"> Apie mus</h1>
    <div class="row">
      <section class="col-sm-4">
        I'm a paragraph. Click here to add your own text and edit me. I’m a great place for you to tell a story and let your users know a little more about you.
        <hr class="visible-xs">
      </section>

      <section class="col-sm-4">
        I'm a paragraph. Click here to add your own text and edit me. I’m a great place for you to tell a story and let your users know a little more about you.
        <hr class="visible-xs">
      </section>

      <section class="col-sm-4">
        I'm a paragraph. Click here to add your own text and edit me. I’m a great place for you to tell a story and let your users know a little more about you.
        <hr class="visible-xs">
      </section>
    </div>
  </div>

  <!-- Modal Section for login-->
  <div class="bg-modal">
    <div class="modal-content">
      <div class="close">+</div>
      <h3 class="text-center">PRISIJUNGIMAS</h3>
      <form action="login.php" method="POST">
        <input type="text" placeholder="Prisijungimo vardas" name="username" required="required">
        <input type="password" placeholder="Slaptažodis" name="password" required="required">
        <input type="submit" value="Prisijungti" />
      </form>
      <div class="text-center">
        <li><a href="">Pamiršote slaptažodį?</a></li>
        <li><a href="">Registruotis</a></li>
      </div>
    </div>

  </div>

  <!-- Modal Section for registration-->
  <div class="bg-modal-reg">
    <div class="modal-content-reg">
      <div class="close close-reg">+</div>
      <h3 class="text-center">REGISTRACIJA</h3>
      <form action="server.php" method="POST">
        <input type="text" placeholder="Vardas" name="name" required="required">
        <input type="text" placeholder="Pavardė" name="surname" required="required">
        <input type="text" placeholder="Prisijungimo vardas" name="username" required="required">
        <input type="password" placeholder="Slaptažodis" name="password" required="required">
        <input type="text" placeholder="Elektroninis paštas" name="email" required="required">
        <input type="text" placeholder="Mokymo įstaiga" name="school" required="required">
        <input type="submit" value="Register" />
      </form>
    </div>
  </div>

  <!-- Footer -->

  <footer class="panel-footer">
    <div class="text-center">&copy; Copyright Kauno Technologijos Universitetas 2020</div>
  </footer>

  <!-- jQuery (Bootstrap JS plugins depend on it) -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>