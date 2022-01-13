{extends file="layout/content.tpl"}

{block name="content"}

<main>
  <div class="justify-content-center">
    <h1>{$title}</h1>
    <hr>

    {$form_open}
    <div id="formulaire_contact">

      <div class="form-group a">
        {$label_name}
        {$form_name}
      </div>

      <div class="form-group b">
        {$label_firstname}
        {$form_firstname}
      </div>

      <div class="form-group email-group">
        {$label_email}
        {$form_email}
      </div>

      <div class="form-group email-group">
        {$label_message}
        {$form_message}
      </div>

      <!-- <div class="button-container">
          <button class="button">Envoyer</button>
        </div> -->
      {$form_submit}

    </div>
    {$form_close}
  </div>

</main>

{/block}
