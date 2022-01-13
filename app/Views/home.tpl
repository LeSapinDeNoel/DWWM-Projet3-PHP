{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>

<div class="backgroundH text-white " style="background-color:#171926; padding-top:40px; padding-bottom:40px;">

<p class="display-4 text-center mx-auto" style="width:80%;">
  Le premier site de critiques de films
  entièrement collaboratif
</p>

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
