<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Accueil</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <!-- Button /voir plus/ -->
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  
  <script src="assets/app.js"></script>
  <link rel="stylesheet" href="assets/style.css">

</head>

<body>
  <header id="sidebar">

    <!-- Le logo -->

    <div class="text-center d-flex flex-direction-row justify-content-around align-items-center">

      <a href="#" class="mb-2 mt-4" title="Accueil">
        <img src="assets/images/logo.svg" alt="REC" height="45">
      </a>
      <a href="#" id="burger"> <i class="fas fa-bars"></i></a>


    </div>
    <hr class="hr_header" />
    <!-- L'affichage profil si connecté -->
    <section class="deroule cache" >
      <div class="d-flex p-2 profil">

        <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="profil" height="70">

        <div class="d-flex flex-column p-2">

          <p><a href="#">Quentin Felbinger</a><br>
            <span>Administrateur</span>
          </p>

        </div>

      </div>

      <hr class="hr_header" />


      <!-- la navigation entière -->

      <nav class="">
        <ul>

          <li> <a href="#"> <i class="far fa-newspaper"></i> Les critiques</a></li>

          <li> <a href="#"> <i class="fas fa-user"></i> Se connecter</a></li>

          <li> <a href="#"> <i class="fas fa-sign-in-alt"></i> S'inscrire</a></li>

          <li> <a href="#"> <i class="far fa-sticky-note"></i> Mes critiques</a></li>

          <li> <a href="#"> <i class="fas fa-toggle-on"></i> Modération</a></li>

          <li> <a href="#"> <i class="fas fa-users"></i> Les utilisateurs</a></li>

          <li> <a href="#"> <i class="fas fa-sign-out-alt"></i> Se déconnecter</a></li>

          <li> <a href="#"> <i class="fas fa-users"></i> Nous contacter</a></li>
        </ul>
      </nav>
    </div>
  </header>
