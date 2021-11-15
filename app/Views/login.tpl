{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>

  <div class="justify-content-center">

    <h1>{$title}</h1>
    <hr>

    {$form_open}

        <div id="formulaire_login">
          <div class="form-group a">
            {$label_email}
            {$form_email}
          </div>
          <div class="form-group a">
            {$label_mdp}
            {$form_mdp}
          </div>
          <div class="button-container">
            {$form_submit}
          </div>
        </div>

    {$form_close}

  </div>

</main>

{/block}
