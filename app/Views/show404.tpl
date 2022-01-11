{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>
  <div style="padding-top:100px;padding-bottom:150px;">
  <h1 class="display-1 ">404</h1>
  <p class="text-center">Cette page n'éxiste pas</p>
  <div class="PositionVbutton ">
    <a href="{site_url('Critic/home')}">
    <button id="Vbutton">Accueil</button>
    </a>
  </div>
</div>
</main>

{/block}
