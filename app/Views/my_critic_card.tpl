<article>
  <a href="{site_url('critic/critic_details')}?art={$objCritic->critic_id}" class="text-center text-dark">
    <img src="{base_url("assets/images")}/{$objCritic->critic_img}">
    <h2><a href="#" class="DeleteCritic" title="Supprimer"><i class="fas fa-minus-square"></i></a>&nbsp;{$objCritic->critic_title}</h2>
    <p class="text-secondary mt-2 text-right mr-3 cat"><strong>{$objCritic->critic_createdate}<br/>{$objCritic->cat_name}</strong></p>
  </a>
</article>
