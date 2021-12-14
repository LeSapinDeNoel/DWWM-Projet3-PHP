{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>

  <div class="justify-content-center">

    <h1>{$title}</h1>
    <hr>


    {$form_open}
    {csrf_field()}

        <div id="formulaire_login">

          {if isset($validation, 'email')}
            <div class="alert alert-danger" role="alert">
              {display_error($validation,'email')}
            </div>
          {/if}

          {if isset($validation, 'pwd')}
            <div class="alert alert-danger" role="alert">
              {display_error($validation,'pwd')}
            </div>
          {/if}
          
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
              <a href="{base_url('user/create_account')}" class="btn btn-light">Vous n'êtes pas inscrit ?</a>
            </p>
          </div>
          
        </div>

    {$form_close}

  </div>

  {if count($smarty.post) > 0}
		<pre>
			{$smarty.post|var_dump}
		</pre>
	{/if}

</main>

{/block}
