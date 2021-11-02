{extends file="layout/content.tpl"}

{block name="content"}

<main>

  <div class="justify-content-center">

    <h1>Se connecter</h1>
    <hr>
    <form action="#" method="post">
      <div id="formulaire_login">

        <div class="form-group email-group">
          <label for="email">Email</label>
          <input id="email" type="text">
        </div>

        <div class="form-group">
          <label for="pwd">Mots de passe</label>
          <input id="pwd" type="text">
        </div>
        
        <div class="button-container">
          <button class="button">Se connecter</button>
        </div>

      </div>
    </form>

  </div>

</main>

{/block}
