<?php

    // J'affiche le header
include("header.php");

?>

<main>

<h1>Page aide</h1>
<hr>

<!-- Aide utilisateur -->

<section>
    <h2>Vous êtes utilisateurs !</h2>
    <p>
        En tant qu'utilisateur, vous avez le pouvoir de créer des critiques.<br>
        Elles seront vérifiées par un modérateur avant d'être rendu public. L'évolution
        du statut de vos critiques sera visible dans la page "Mes critiques"
    </p>
</section>

<!-- Aide modo -->

<section>
    <h2>Vous êtes modérateur !</h2>
    <p>
        En tant que modérateur, vous avez le pouvoir de publier ou dépublier des critiques.<br>
        Vous aurez donc la charge et la responsabilité de vérifier toutes les critiques
        des utilisateurs pour qu'elles puissent apparaître sur le site.
    </p>
</section>

<!-- Aide admin -->

<section>
    <h2>Vous êtes administrateur !</h2>
    <p>
        En tant qu'administrateur, vous avez le pouvoir de gérer tous les utilisateurs.<br>
        C'est vous qui définissez les rôles de tous les inscrits au site. Et le pouvoir de
        supprimer des utilisateurs.
    </p>
</section>

</main>

<?php

    // J'affiche le header
include("footer.php");

?>