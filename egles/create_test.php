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
  <link
  href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap"
  rel="stylesheet">
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
          <a href="index.php"><h1>M-TALPYKLA</h1></a>
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

    <!-- Modal Section for creating a test-->
    <h3>Vocabulary Quiz I</h3>

<form method="post" action="mailto:raizen@mail.utexas.edu?subject=Vocabulary Quiz 1" enctype="text/plain">

Check the answer to each multiple-coice question, and click on the "Send Form" button to submit the information.

<P>1. The word which means "house" is:<BR>
<input type="radio" name="1.The word which means house is" value="maison">maison<BR>
<input type="radio" name="1.The word which means house is" value="quatre">quatre<BR>
<input type="radio" name="1.The word which means house is" value="soleil">soleil<BR>
<input type="radio" name="1.The word which means house is" value="poisson">poisson<BR>
</p>

<P>2. The word which means "fish" is:<BR>
<input type="radio" name="2. The word which means fish is" value="maison">maison<BR>
<input type="radio" name="2. The word which means fish is" value="valise">valise<BR>
<input type="radio" name="2. The word which means fish is" value="soleil">soleil<BR>
<input type="radio" name="2. The word which means fish is" value="poisson">poisson<BR>
</p>

<P>3. The word which means "suitcase" is:<BR>
<input type="radio" name="3. The word which means suitcase is" value="renard">renard<BR>
<input type="radio" name="3. The word which means suitcase is" value="valise">valise<BR>
<input type="radio" name="3. The word which means suitcase is" value="soleil">soleil<BR>
<input type="radio" name="3. The word which means suitcase is" value="poisson">poisson<BR>
</p>

<br>
<br>
<br>
<br>
<input type="submit" value="Send Form">
<input type="reset" value="Clear Form">
</form>


            <!-- jQuery (Bootstrap JS plugins depend on it) -->         
            <script src="js/jquery-2.1.4.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/script-acc.js"></script> 

          </body>
          </html>