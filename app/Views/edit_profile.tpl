{extends file="layout/content.tpl"}

{block name="content"}

<main>
  <div class="justify-content-center">
    <h1>{$title}</h1>
    <hr>
  </div>

  <div class="conteneur_profil">

    {if isset(session('success'))}
      <div class="alert alert-success" role="alert">
        {session('success')}
      </div>
    {/if}

    {$form_open}

      {csrf_field()}

      <div id="image_profil">
        <label for="fileToUpload">
          <div class="profile-pic" style="background-image: url('{base_url("assets/images")}/{session('user_avatar')}')">
            <span></span>
            <span>Modifier votre avatar</span>
          </div>
        </label>
        {$form_img}
      </div>

      <div class="grid">

        <div class="form-group a">
          {$label_nom}
          {$form_nom}

          {if isset($validation)}
            <span class="text-danger" role="alert">
              {display_error($validation,'name')}
            </span>
          {/if}

        </div>

        <div class="form-group b">
          {$label_prenom}
          {$form_prenom}

          {if isset($validation)}
						<span class="text-danger" role="alert">
							{display_error($validation,'first_name')}
						</span>
					{/if}

        </div>

        <div class="form-group">
          <h5>Votre rôle :</h5>
          <p>
            {if session('user_role') == 1}
              Administrateur
            {elseif session('user_role') == 2}
              Modérateur
            {else}
              Utilisateur
            {/if}
          </p>
        </div>

        <div class="form-group">
          {$label_mdp}
          {$form_mdp}
				</div>

				<div class="form-group">
					{$label_confirm_pwd}
					{$form_confirm_pwd}

					{if isset($validation)}
						<span class="text-danger" role="alert">
							{display_error($validation,'confirm_pwd')}
						</span>
					{/if}
				</div>

        <div class="button-container">
          <p></p>
          {$form_submit}
        </div>

      </div>

	      {$form_close}

  </div>
  
</main>

{/block}