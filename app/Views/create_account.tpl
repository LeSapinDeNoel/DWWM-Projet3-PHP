{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>
	<div class="justify-content-center">
		<h1>{$title}</h1>
		<hr>
	</div>

	<div class="conteneur_profil">

	{* {if isset($validation)}
		<div class="alert alert-danger" role="alert">
			{$validation->listErrors()}
		</div>
	{/if} *}

		{$form_open}

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
			<a href="{site_url('user/login')}" class="btn btn-light">Déjà inscrit ?</a>
		</div>

		{* <form action="#" method="post" enctype="multipart/form-data">

				<div id="image_profil">
					<label for="fileToUpload">
						<div class="profile-pic" style="background-image: url('https://fakeimg.pl/150x150/')">
							<span></span>
							<span>Modifier votre avatar</span>
						</div>
					</label>
					<input type="File" name="fileToUpload" id="fileToUpload">
				</div>

				<div class="grid">
					<div class="form-group a">
						<label for="name">Nom</label>
						<input id="name" type="text">
					</div>

					<div class="form-group b">
						<label for="first-name">Prénom</label>
						<input id="first-name" type="text">
					</div>

					<div class="form-group email-group">
						<label for="email">Email</label>
						<input id="email" type="text">
					</div>

					<div class="form-group">
						<label for="role">Role</label>
						<input id="role" type="text">
					</div>

					<div class="form-group">
						<label for="pwd">Mots de passe</label>
						<input id="pwd" type="text">
					</div>

					<div class="form-group">
						<label for="confirm_pwd">Confirmation du mots de passe</label>
						<input id="confirm_pwd" type="text">
					</div>
				</div>

				<div class="button-container">
					<button class="button">Créer mon compte</button>
				</div>
		</form> *}
	</div>

	{if count($smarty.post) > 0}
	<pre>
	{$smarty.post|var_dump}
	</pre>
	{/if}
	
</main>

{/block}