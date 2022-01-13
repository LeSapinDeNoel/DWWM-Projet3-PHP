{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>

<div class="backgroundH">

{* <p>VOUS ETES LA POUR :</p>
<p class="ecris-dyn"></p> *}

</div>

<h1>Les dernières critiques</h1>
<hr>

<section id="galerie">

  <div>
    {foreach from=$arrCritics item=$objCritic}
      {include file="critic_card.tpl"}
    {/foreach}
  </div>

</section>

</main>

{* {/block}

{block name="js_footer"} *}


{/block}
