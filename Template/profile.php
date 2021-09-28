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

</div>
<style>

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
      margin-top: 100px;
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

</style>

</main>
<?php
  // j'affiche le footer
 include("footer.php");
?>
