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
          Katalogai
        </p>
      </div>
    </div>

    <script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.search.submit();
        }
    }
</script>
    <div class="container">
      <div class="input-icons"> 
        <form name="search" action="account.php" method="GET">
        <i class="fa fa-search"> 
        </i> 
        <input type="text" name="searchtext" placeholder="Ieškoti..." id="searchBox" >
        <button id="add" type="button" class="add-object pull-right">+</button>
        </form>
      </div>
    </div>

    <!-- Modal Section for creating a folder-->
    <?php

    if (isset($_SESSION['message'])): ?>

      <div class="alert alert-<?php=$_SESSION['msg_type']?>">

        <?php
        echo ($_SESSION['message']);
        unset($_SESSION['message']);
        ?>

      </div>

    <?php endif ?>


    <div class="container">
      <?php
      $conn = new mysqli('localhost', 'root', '', 'mtalpykla') or die (mysqli_error($conn));
      $username=$_SESSION['username'];

      if(!empty($_GET['searchtext'])){
      $searchtext = trim($_GET['searchtext']);

      $result = $conn->query ("SELECT folders.id as id, folders.title as title 
      FROM folders 
      INNER JOIN teachers on teachers.id=folders.fk_TEACHERid 
      WHERE folders.title LIKE '%$searchtext%' 
      AND teachers.username='$username'") or die ($conn->error);
      }
      else{
        $result = $conn->query ("SELECT folders.id as id, folders.title as title 
      FROM folders INNER JOIN teachers on teachers.id=folders.fk_TEACHERid 
      WHERE teachers.username='$username'") or die ($conn->error);
      }
      ?>

      <div class="row justify-content-center">
        <table class="table table-hover table-striped table-bordered table-sm table-responsive{-sm|-md|-lg|-xl}">
          <thead>
            <tr>
              <th>Pavadinimas</th>
              <th colspan="2">Veiksmai</th>
            </tr>
          </thead>
          <?php
          while ($row = $result->fetch_assoc()): 
            ?> 
            <tr>
              <td> <a href="files.php?folder=<?php echo $row['id']; ?>" 
                    > <?php echo $row['title']; ?> </a> </td>
              <td> <a href="account.php?edit=<?php echo $row['id']; ?>"
                class="btn btn-info">Redaguoti</a>
                <a href="create_folder.php?delete=<?php echo $row['id']; ?>"
                 class="btn btn-danger">Ištrinti</a>
               </td>
             </tr>
           <?php endwhile; ?>
         </table>
       </div>

       <?php
       pre_r($result->fetch_assoc());
       pre_r($result->fetch_assoc());
       function pre_r( $array ){
        print_r($array);
      }
      ?> 
    </div>
    <?php
    if ($update == true):
      ?>
      <div class="add-modal" style="display: flex;">
        <?php else: ?>
          <div class="add-modal">
          <?php endif; ?>
          <div class="modal-content">
            <div class="close">+</div>
            <?php
            if ($update == true):
              ?>
              <h3 class="text-center">KEISTI KATALOGO PAVADINIMĄ</h3>
              <?php else: ?>
                <h3 class="text-center">SUKURTI KATALOGĄ</h3>
              <?php endif; ?>
              <form action="create_folder.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" placeholder="Katalogo pavadinimas" value="<?php echo $title; ?>" name="title" required="required">
                <div class="button btn-login">
                  <?php
                  if ($update == true):
                    ?>
                    <input type="submit" class="btn btn-info" name="update" value="Keisti"/>
                    <?php else: ?>
                      <input type="submit" class="btn btn-primary" name="create" value="Sukurti"/>
                    <?php endif; ?>
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
            <script src="js/script-acc.js"></script> 

          </body>
          </html>