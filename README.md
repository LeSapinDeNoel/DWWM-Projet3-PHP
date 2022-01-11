# DWWM-Projet3-PHP

Aled : Page d'une critique / create_critic
# Listes des URL
- Infos --> Page/info
- Help --> Page
- Contact --> Page/contact
- Login --> User/login
- Création de compte --> User/create_account
- Modifier son profil --> User/edit_profile
- Liste utilisateurs --> User/admin_user
- Home --> Critic/home
- Critic --> Critic/
- Liste des critics --> critic/critic_moderate
- Mes critic --> critic/user_critic
- Affichage d'une critic --> critic/critic_details

# Methods à créer par controller

## User controller

- User_class : fonction Hydratation - Getters / Setters

- Login --> ok
  - find_user / verif_user / maj_session
- logout (session_destroy) --> ok
- create_account--> ok
  - save_user / verif_mail
- edit_profile--> ok
  - update_user / find_user / get_user
- delete_user
  - drop_user
- admin_user --> ok
  - find_user

## Critic controller

- Critic_class : fonction Hydratation - Getters / Setters

- home (affichage des dernières critiques limité 8) --> ok
  - find_critics
- critics (affichage des dernières critiques 12) --> ok
  - find_critics
- my_critics
  - delete_critic / edit_critic
!FindCritic affiche visibilé!
- create_critic --> ok
  - add_critic
- moderate_critic
  - find_critics / visibilty_critic

## Page controller

- Help --> ok
- Contact (mail réponse auto)
- Mentions légales --> ok
- Errors --> ok


- Javascript Drag&Drop


# Informations template

## Les couleurs
La sidebar et le footer :       #171926
Le rouge du logo :              #FF1C00
Le fond blanc :                 #000000

## la navigation
### Non connecté :
 - Les critiques
 - Se connecter
 - S'inscrire
 - Nous contacter

### Connecté en tant que visiteur :
 - Les critiques
 - Mes critiques
 - Se déconnecter
 - Nous contacter

### Connecté en tant que modérateur :
 - Les critiques
 - Modération
 - Se déconnecter
 - Nous contacter

### Connecté en tant que administrateur :
 - Les critiques
 - Les utilisateurs
 - Se déconnecter
 - Nous contacter


###Icon pour menu
- Les critiques :     <i class="far fa-newspaper"></i>
- Mes critiques :     <i class="far fa-sticky-note"></i>
- Se connecter :      <i class="fas fa-user"></i>
- S'inscrire :        <i class="fas fa-sign-in-alt"></i>
- Se déconnecter :    <i class="fas fa-sign-out-alt"></i>
- Modération :        <i class="fas fa-toggle-on"></i>
- Les utilisateurs :  <i class="fas fa-users"></i>
- Nous contacter :    <i class="fas fa-users"></i>
