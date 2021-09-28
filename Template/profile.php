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
	background: #5850eb;
	border: none;
	padding: 15px 25px;
	border-radius: 6px;
	color: white;
	width: 100%;
	margin-top: 24px;
}

.button:hover {
	background: #6e67ee;
}
.button:focus {
	background: #4239e8;
}

@media screen and (min-width: 768px) {
	body {
		align-items: center;
		justify-content: center;
	}

	.container {
		margin: 2rem;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);
		border-radius: 4px;
		max-width: 32rem;
		padding: 2rem;
	}
}
@media screen and (min-width: 1024px) {
	.container {
		max-width: 80%;
		width: 100%;
	}

	.checkboxes {
		display: flex;
	}
	.checkboxes > :not(:first-child) {
		margin-left: 1rem;
	}

	.grid {
		display: grid;
		grid-gap: 24px;
		grid-template-columns: 1fr 1fr 1fr;
		grid-auto-rows: 1fr;
	}

	.email-group {
		grid-column: 1;
		grid-row: 2;
	}

	.phone-group {
		grid-column: 2;
		grid-row: 2;
	}

	.textarea-group {
		grid-column: 3;
		grid-row: span 2;
		margin-right: 2rem;
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
