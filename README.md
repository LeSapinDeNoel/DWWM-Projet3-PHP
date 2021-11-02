# DWWM-Projet3-PHP

Aled : Page d'une critique / create_critic
# Listes des URL
- Infos --> Page/info
- Help --> Page
- Contact --> Page/contact
- Login --> User/login
# Methods à créer par controller

## User controller

- User_class : fonction Hydratation - Getters / Setters

- Login
  - FindUser / verifUser / majSession
- logout (session_destroy)
- create_account
  - saveUser / verifMail
- edit_profile
  - updateUser / findUser / getUser
- delete_user
  - dropUser 
- admin_user
  - FindUser

## Critic controller

- Critic_class : fonction Hydratation - Getters / Setters

- Home (affichage des dernières critiques limité 8)
  - findCritics
- Critics (affichage des dernières critiques 12)
  - findCritics
- MyCritics
  - deleteCritic / editCritic
!FindCritic affiche visibilé!
- create_critic
  - addCritic
- moderate_critic
  - findCritics / visibiltyCritic

## Page controller

- Help
- Contact (mail réponse auto)
- Mentions légales
- Errors


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
