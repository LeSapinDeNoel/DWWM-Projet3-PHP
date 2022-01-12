{extends file="layout/content.tpl"}

{block name="content"}

<main>

  <h1>{$objCriticsInfo->critic_title}</h1>
  <hr>

  <section class="">
    <article class="">
        <img src="{base_url("assets/images")}/{$objCriticsInfo->critic_img}" alt="Image de mises en avant" class="mb-5 w-25 d-block mx-auto text-center">
        <p class="mb-2 w-50  d-block mx-auto text-left">{$objCriticsInfo->critic_content}</p>
        <ul class="d-flex justify-content-center text-secondary" style="list-style-type:none">
          <li class="m-3">{$objCriticsInfo->critic_createdate}</li>
          <li class="m-3">{$objCriticsInfo->cat_name}</li>
          <li class="m-3">{$objCriticsInfo->user_firstname} {$objCriticsInfo->user_name}</li>
        </ul>
    </article>
  </section>



</main>


{/block}
