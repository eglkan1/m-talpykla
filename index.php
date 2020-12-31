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
          <li id="logout">
            <a href="logout.php">Atsijungti</a>
          </li>
        </ul>
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
        <?php if (!isset($_SESSION['username'])) : ?>
          <li id="register"><a href="#">Registruotis</a></li>
        <?php endif; ?>
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
      Talpykla sklandžiai talpina norimus failus, 
      kurių formatai yra pdf, docx, jpeg, jpg ir jpeg.
        <hr class="visible-xs">
      </section>

      <section class="col-sm-4">
      Talpykloje taip pat galite pridėti testus, kuriuos yra paprasta ir patogu sukurti. 
      Be to, lengva dalintis su studentais
      ar moksleiviais!
        <hr class="visible-xs">
      </section>

      <section class="col-sm-4">
      Talpykla yra visiškai nemokama bei paprasto ir patogaus naudojimo. 
      Registruokitės ir pradėkite talpinti jau dabar!
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
        <input class="form-control" type="text" placeholder="Prisijungimo vardas" name="username" required="required">
        <input class="form-control" type="password" placeholder="Slaptažodis" name="password" required="required">
        <input class="log-button btn btn-info" type="submit" value="Prisijungti" />
      </form>
      <div class="text-center">

        <li><a href="">Pamiršote slaptažodį?</a></li>
        <li><a href="">Registruotis</a></li>
      </div>
    </div>

  </div>

  <!-- Modal Section for registration-->
  <div class="bg-modal-reg">
    <div class="modal-content">
      <div class="close close-reg">+</div>
      <h3 class="text-center">REGISTRACIJA</h3>
      <form class="form-inline" action="server.php" method="POST">
<div class="form-group">
        <input class="form-control" type="text" placeholder="Vardas" name="name" required="required">
        <input  class="form-control" type="text" placeholder="Pavardė" name="surname" required="required">
        <input class="form-control" type="text" placeholder="Prisijungimo vardas" name="username" required="required">
        <input class="form-control" type="password" placeholder="Slaptažodis" name="password" required="required">
        <input class="form-control" type="text" placeholder="Elektroninis paštas" name="email" required="required">
        <input class="form-control" type="text" placeholder="Mokymo įstaiga" name="school" required="required"> 
        <input class="reg-button pull-right btn btn-info" type="submit" value="Registruotis" />
</div>

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