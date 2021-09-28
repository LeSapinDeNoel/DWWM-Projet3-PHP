<?php
  // J'affiche le header
  include("header.php");
?>

<main>
  <div class="justify-content-center">
    <h1>Mon profil</h1>
    <hr>
  </div>

<div class="conteneur_profil">

  <form action="#" method="post" enctype="multipart/form-data">

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
    		<button class="button">Enregister les modifications</button>
    	</div>
  </form>

</div>

<style>


/* IMAGES AVATAR  */
#image_profil{
  text-align: center;
}
/* mises en form de l'images */
.profile-pic {
    border-radius: 50%;
    height: 150px;
    width: 150px;
    background-size: cover;
    background-position: center;
    background-blend-mode: multiply;
    vertical-align: middle;
    text-align: center;
    color: transparent;
    transition: all .3s ease;
    text-decoration: none;
    cursor: pointer;
}

/* images qui devient sombre au hover */
.profile-pic:hover {
    background-color: rgba(0,0,0,.5);
    z-index: 10000;
    color: #fff;
    transition: all .3s ease;
    text-decoration: none;
}


/* texte changement d'images */
.profile-pic span {
    display: inline-block;
    padding-bottom: 4.5em;
}

/* Pour faire disparaitre le "choisir un fichier" */
form input[type="file"] {
        display: none;
        cursor: pointer;
 }


/* FIN IMAGES AVATAR */


/* Style du formulaire */

.conteneur_profil {
  width: 80%;
  margin: 0 auto;
}



.form-group {
	margin-top: 25px;
	display: flex;
	flex-direction: column;
}

.form-group [type],
.textarea-group textarea {
	border: 1px solid #d2d6db;
	border-radius: 6px;
	padding: 15px;
}



.button {
	font-weight: bold;
	line-height: 19px;
	background: #FF1C00;
	border: none;
	padding: 15px 25px;
	border-radius: 6px;
	color: white;
	width: 100%;
	margin-top: 24px;
}

.button:hover {
	background: #db1500;
}
.button:focus {
	background: #db1500;
}


@media screen and (min-width: 1024px) {

  .conteneur_profil {
      margin-top: 50px;
  }


	.grid {
		display: grid;
		grid-gap: 24px;
		grid-template-columns: 1fr 1fr 1fr;
		grid-auto-rows: 1fr;
	}



	.button-container {
		text-align: right;
	}

	.button {
		width: auto;
	}
}
/* Fin Style du formulaire */
</style>

</main>
<?php
  // j'affiche le footer
 include("footer.php");
?>
