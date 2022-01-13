{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>

  <h1>{$title}</h1>
  <hr>

  {$form_open}
    <div id="formulaire_search">
      <div class="form-group a">
        {$label_keyword}
        {$form_keyword}
      </div>

      <div class="form-group a">
        {$label_cat}
        {$form_cat}
      </div>
      <div class="form-group a">
        {$label_date}
        {$form_date}
      </div>
    </div>
    {$form_submit}

  {$form_close}



  <section id="galerie">

    <div>
      {foreach from=$arrCritics item=$objCritic}
        {include file="my_critic_card.tpl"}
      {/foreach}
    </div>

  </section>

  <div class="PositionVbutton">
    <button id="Vbutton">VOIR PLUS</button>
  </div>

</main>

{/block}
