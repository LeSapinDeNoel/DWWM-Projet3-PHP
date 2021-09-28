<?php

    // J'affiche le header
include("header.php");

?>

<main>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://fakeimg.pl/500x200/?text=oui" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://fakeimg.pl/500x200/?text=non" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://fakeimg.pl/500x200/?text=na" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<h1>Les dernières critiques</h1>
<hr>

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

</main>

<?php

  // J'affiche le footer
include("footer.php");

?>