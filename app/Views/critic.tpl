{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>

  <h1>{$title}</h1>
  <hr>

  <form action="#" method="post">
    <div id="formulaire_search">

      <div class="form-group a">
        <label for="keyword">Mot clé</label>
        <input id="keyword" type="text">
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
      {foreach from=$arrCritics item=$objCritic}
        {include file="critic_card.tpl"}
      {/foreach}
    </div>

  </section>

  <div class="PositionVbutton">
    <button id="Vbutton">VOIR PLUS</button>
  </div>

</main>


{/block}
