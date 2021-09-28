<?php
  // J'affiche le header
  include("header.php");
?>

<main>
  <div class="justify-content-center">
    <h1>Créer un compte</h1>
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
    		<button class="button">Créer mon compte</button>
    	</div>
  </form>

</div>

<style>


</style>

</main>
<?php
  // j'affiche le footer
 include("footer.php");
?>
