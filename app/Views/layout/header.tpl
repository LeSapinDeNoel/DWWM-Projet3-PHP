<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>{block name=title}REC - {/block}</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">

    <!-- Button /voir plus/ -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <script src="{base_url("assets/app.js")}"></script>
  <link rel="stylesheet" href="{base_url("assets/style.css")}">

</head>

<body>
  <header id="sidebar">

    <!-- Le logo -->

    <div class="text-center d-flex flex-direction-row justify-content-around align-items-center">

      <a href="{site_url()}" class="mb-2 mt-4" title="Accueil">
        <img src="{base_url("assets/images/logo.svg")}" alt="REC" height="45">
      </a>
      <a href="#" id="burger"> <i class="fas fa-bars"></i></a>


    </div>
    <hr class="hr_header" />
    <!-- L'affichage profil si connecté -->
    <section class="deroule cache" >

    {if isset(session('loggedUser'))}

      <div class="d-flex p-2 profil">

        <img src="{base_url("assets/images")}/{session('user_avatar')}" alt="profil" height="70">

        <div class="d-flex flex-column p-2">

          <p><a href="{base_url('user/edit_profile')}">{session('user')}</a><br>
            <span>
              {if session('user_role') == 1}
                Administrateur
              {elseif session('user_role') == 2}
                Modérateur
              {else}
                Utilisateur
              {/if}
            </span>
          </p>

        </div>

      </div>

    <nav>  
      <ul>
        <li> <a href="{base_url('user/logout')}"> <i class="fas fa-sign-out-alt"></i> Se déconnecter</a></li>
      </ul>
    </nav>

    {else}
      <nav>
        <ul>
          <li> <a href="{base_url('user/login')}"> <i class="fas fa-user"></i> Se connecter</a></li>            
          <li> <a href="{base_url('user/create_account')}"> <i class="fas fa-sign-in-alt"></i> S'inscrire</a></li>
        </ul>
      </nav>
    {/if}

      <hr class="hr_header" />



      <!-- la navigation entière -->

      <nav>
        <ul>

          <li> <a href="#"> <i class="far fa-newspaper"></i> Les critiques</a></li>
          

          {if isset(session('loggedUser'))}
          
            <li> <a href="{base_url('critic/user_critic')}"> <i class="far fa-sticky-note"></i> Mes critiques</a></li>
            
            <li> <a href="#"><i class="far fa-sticky-note"></i> Ecrire une critique</a></li>

            {if session('user_role') == 1}
              <li> <a href="{base_url('user/admin_user')}"> <i class="fas fa-users"></i> Les utilisateurs</a></li>
            {elseif session('user_role') == 2}
              <li> <a href="{base_url('critic/critic_moderate')}"> <i class="fas fa-toggle-on"></i> Modération</a></li>
            {/if}

          {/if}
          
          <li> <a href="{base_url('page/contact')}"> <i class="fas fa-users"></i> Nous contacter</a></li>


        </ul>
      </nav>
    </div>
  </header>
