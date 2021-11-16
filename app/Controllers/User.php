<?php

namespace App\Controllers;


class User extends BaseController
{
	public function login()
	{
		// Création du formulaire_connexion
		$this->_data['form_open']    		= form_open('user/login');
		$this->_data['label_email']			= form_label('Email');
		$this->_data['form_email'] 			= form_input('email');
		$this->_data['label_mdp']			= form_label('Mot de passe');
		$this->_data['form_mdp'] 			= form_input('pwd');
		$this->_data['form_submit']    		= form_submit('envoyer', 'Se connecter','class = "button"');
		$this->_data['form_close']    		= form_close();

		//Données de la page
		$this->_data['title']	= "Se connecter";

        $this->display('login.tpl');
	}

	public function create_account()
	{
		// Création du formulaire_connexion
		$this->_data['form_open']    		= form_open('user/login');

		$this->_data['form_img'] 			= form_input(array('type'  => 'file',
														 'name'  => 'fileToUpload',
														 'id'    => 'fileToUpload'));

		$this->_data['label_nom']			= form_label('Nom');
		$this->_data['form_nom'] 			= form_input('name');

		$this->_data['label_prenom']		= form_label('Prénom');
		$this->_data['form_prenom'] 		= form_input('first_name');

		$this->_data['label_email']			= form_label('Email');
		$this->_data['form_email'] 			= form_input('email');

		$this->_data['label_mdp']			= form_label('Mot de passe');
		$this->_data['form_mdp'] 			= form_input('pwd');

		$this->_data['label_confirm_pwd']	= form_label('Confirmation du mot de passe');
		$this->_data['form_confirm_pwd'] 	= form_input('confirm_pwd');

		$this->_data['form_submit']    		= form_submit('envoyer', 'Se connecter','class = "button"');
		$this->_data['form_close']    		= form_close();

		//Données de la page
		$this->_data['title']	= "Créer un compte";

        $this->display('create_account.tpl');
	}

	public function edit_profile()
	{
        $this->display('edit_profile.tpl');
	}

	public function admin_user()
	{
        $this->display('admin_user.tpl');
	}
}
