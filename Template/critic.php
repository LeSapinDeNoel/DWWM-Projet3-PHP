<?php

    // J'affiche le header
include("header.php");

?>

<main>

  <h1>Les critiques</h1>
  <hr>

  <form action="#" method="post">
    <div id="formulaire_search">

      <div class="form-group a">
        <label for="keyword">Mot clé</label>
        <input id="keyword" type="text">
      </div>
      <div class="form-group a">
        <label for="keyword">Catégorie</label>
        <input id="categorie" type="text">
      </div>
      <div class="form-group a">
        <label for="createur">Créateur</label>
        <input id="createur" type="text">
      </div>
      <div class="form-group a">
        <label for="date">Date exact</label>
        <input type="date" id="start" name="trip-start" value="">
      </div>
      <div class="form-group a">
        <label for="startdate">Date de début</label>
        <input id="startdate" type="date" name="startdate" />
      </div>
      <div class="form-group a">
        <label for="enddate">Date de fin</label>
        <input id="enddate" type="date" name="enddate" />
      </div>
    </div>
  </form>

  <section id="galerie">

    <div>

      <article>
        <img src="https://fakeimg.pl/320x220/?text=oui">
        <h2>Article 1</h2>
      </article>

      <article>
        <img src="https://fakeimg.pl/320x220/?text=oui">
        <h2>Article 1</h2>
      </article>

      <article>
        <img src="https://fakeimg.pl/320x220/?text=oui">
        <h2>Article 1</h2>
      </article>

      <article>
        <img src="https://fakeimg.pl/320x220/?text=oui">
        <h2>Article 1</h2>
      </article>

      <article>
        <img src="https://fakeimg.pl/320x220/?text=oui">
        <h2>Article 1</h2>
      </article>

      <article>
        <img src="https://fakeimg.pl/320x220/?text=oui">
        <h2>Article 1</h2>
      </article>

    </div>

  </section>

  <div class="PositionVbutton">
    <button id="Vbutton">VOIR PLUS</button>
  </div>

</main>

<?php

// j'affiche le footer
include("footer.php");

?>
