{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>
	<div class="justify-content-center">
		<h1>{$title}</h1>
		<hr>
	</div>

	<div class="conteneur_profil">

		{$form_open}
		{csrf_field()}
		
			<div id="image_profil">
				<label for="fileToUpload">
					<div class="profile-pic" style="background-image: url('https://fakeimg.pl/150x150/')">
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
				<div class="form-group email-group">
					{$label_email}
					{$form_email}

					{if isset($validation)}
						<span class="text-danger" role="alert">
							{display_error($validation,'email')}
						</span>
					{/if}

				</div>
				<div class="form-group">
					{$label_mdp}
					{$form_mdp}

					{if isset($validation)}
						<span class="text-danger" role="alert">
							{display_error($validation,'pwd')}
						</span>
					{/if}

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

		<div>
			<a href="{base_url('user/login')}" class="btn btn-light">Déjà inscrit ?</a>
		</div>

	</div>

	{if count($smarty.post) > 0}
		<pre>
			{$smarty.post|var_dump}
		</pre>
	{/if}
	
</main>

{/block}