<?php
  // J'affiche le header
  include("header.php");
?>

<main>
  <div class="justify-content-center">
    <h1>Nous contacter</h1>
    <hr>
    <form action="#" method="post">
      <div id="formulaire_contact">

        <div class="form-group a">
          <label for="name">Nom</label>
          <input id="name" type="text">
        </div>

        <div class="form-group b">
          <label for="first-name">Prénom</label>
          <input id="first-name" type="text">
        </div>

        <div class="form-group email-group">
          <label for="email">Email</label>
          <input id="email" type="text">
        </div>

        <div class="form-group email-group">
          <label for="message">Message</label>
          <textarea id="message" type="text"></textarea>
        </div>



        <div class="button-container">
          <button class="button">Envoyer</button>
        </div>
      </div>
    </form>
  </div>

</main>
<?php
  // j'affiche le footer
 include("footer.php");
?>
