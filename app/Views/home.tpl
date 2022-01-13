{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>

<div id="particles-js" class="backgroundH"></div>

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

{/block}
<script src="{base_url("assets/particle_js/particles.js")}"></script>
<script src="{base_url("assets/particle_js/particles_config.js")}"></script>
<script src="{base_url("assets/particle_js/particles.min.js")}"></script>
{block name="js_footer"}

{literal}
    <script>
    
    particlesJS.load('particles-js', 'particles.json', function() {
      console.log('particles.js loaded - callback');
    });

    </script>
{/literal}

{/block}
