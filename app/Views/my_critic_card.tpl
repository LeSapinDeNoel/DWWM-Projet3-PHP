<article>
  <a href="{site_url('critic/critic_edit')}?art={$objCritic->critic_id}" class="text-center text-dark">
    <img src="{base_url("assets/images")}/{$objCritic->critic_img}">
    <h2 class="text-center"><a href="{site_url('critic/critic_delete')}?art={$objCritic->critic_id}" class="DeleteCritic mx-auto d-block text-center" title="Supprimer"><i class="fas fa-minus-square"></i></a>{if $objCritic->critic_status != 1}<i class="far fa-eye-slash" title="Non publié"></i>&nbsp;{/if}{$objCritic->critic_title}</h2>
    <p class="text-secondary mt-2 text-right mr-3 cat"><strong>{$objCritic->critic_createdate}<br/>{$objCritic->cat_name}</strong></p>    
  </a>
</article>
