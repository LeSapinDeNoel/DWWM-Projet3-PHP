{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>

  <div class="justify-content-center">

    <h1>{$title}</h1>
    <hr>

    {if session()->get('success')}
      <div class="alert alert-success" role="alert">
        {session()->get('success')}
      </div>
	  {/if}

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
          <div>
            <p>
              <a href="#" class="btn btn-light">Mot de passe oublié ?</a>
            </p>
            <p>
              <a href="{site_url('user/create_account')}" class="btn btn-light">Vous n'êtes pas inscrit ?</a>
            </p>
          </div>
        </div>

    {$form_close}


  </div>

</main>

{/block}
