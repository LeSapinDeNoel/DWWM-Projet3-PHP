{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>

    <h1>Page aide</h1>
    <hr>

    {if isset(session('loggedUser'))}

        {if session('user_role') == 1}
                <!-- Aide admin -->

                <section class="container_help">
                    <h2>Vous êtes administrateur !</h2>
                    <p>
                        En tant qu'administrateur, vous avez le pouvoir de gérer tous les utilisateurs.<br>
                        C'est vous qui définissez les rôles de tous les inscrits au site. Et le pouvoir de
                        supprimer des utilisateurs.
                    </p>
                </section>
              {elseif session('user_role') == 2}
                <!-- Aide modo -->

                <section class="container_help">
                    <h2>Vous êtes modérateur !</h2>
                    <p>
                        En tant que modérateur, vous avez le pouvoir de publier ou dépublier des critiques.<br>
                        Vous aurez donc la charge et la responsabilité de vérifier toutes les critiques
                        des utilisateurs pour qu'elles puissent apparaître sur le site.
                    </p>
                </section>
              {else}
                <!-- Aide utilisateur -->

            <section class="container_help">
                <h2>Vous êtes utilisateurs !</h2>
                <p>
                    En tant qu'utilisateur, vous avez le pouvoir de créer des critiques.<br>
                    Elles seront vérifiées par un modérateur avant d'être rendu public. L'évolution
                    du statut de vos critiques sera visible dans la page "Mes critiques"
                </p>
            </section>
        {/if}
    {else}
        <section class="container_help">
            <h5>Connectez-vous où inscrivez-vous pour pouvoir partager vos critiques !</h5>
            <p>
              <a href="{base_url('user/login')}" class="btn btn-light">Je me connecte</a>
              <a href="{base_url('user/create_account')}" class="btn btn-light">Je m'inscrit</a>
            </p>
        </section>
    {/if}

</main>

{/block}
