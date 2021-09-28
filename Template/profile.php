<?php
  // J'affiche le header
  include("header.php");
?>

<main>
  <div class="justify-content-center">
    <h1>Mon profil</h1>
    <hr>
  </div>

  <form method="post">

        <label for="nom">Votre nom</label>
        <input type="Text" name="nom" id="nom" placeholder="Dienger">

        <br>

        <label for="prenom">Votre prénom</label>
        <input type="Text" name="prenom" id="prenom" placeholder="Julie">

        <br>

        <label for="email">Votre email</label>
        <input type="email" name="email" id="email" placeholder="julie.dienger@gmail.com">

        <br>

        <label for="role">Role</label>
        <input type="Text" name="role" id="role" placeholder="Administrateur">

        <br>

        <label for="pwd">Votre mots de passe</label>
        <input type="Text" name="pwd" id="pwd" placeholder="XXXXXX">

        <br>
        <input type="submit" name="show" id="show" class="bouton" value="Envoyer">
  </form>

<style>

form {
    margin-top: 50px;
    margin-bottom: 50px;
    text-align: left;
    margin: 0 auto;
    display: block;
}

label {
  
}

input {
    height: 56px;
    border-bottom: 3px solid #963042;
    border-top: none;
    border-right: none;
    border-left: none;
    margin-top: 15px;
    width: 400px;
}

</style>

</main>
<?php
  // j'affiche le footer
 include("footer.php");
?>
