<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;
use App\Libraries\Hash;


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
		// Création du formulaire_inscription
		$this->_data['form_open']    		= form_open('user/create_account');

		$this->_data['form_img'] 			= form_input(array('type'  => 'file',
														 'name'  => 'fileToUpload',
														 'id'    => 'fileToUpload'));

		$this->_data['label_nom']			= form_label('Nom');
		$this->_data['form_nom'] 			= form_input('name',set_value('name'));

		$this->_data['label_prenom']		= form_label('Prénom');
		$this->_data['form_prenom'] 		= form_input('first_name', set_value('first_name'));

		$this->_data['label_email']			= form_label('Email');
		$this->_data['form_email'] 			= form_input(array('type'  => 'text',
													'name' => 'email',
													'id'    => 'email'),set_value('email'));

		$this->_data['label_mdp']			= form_label('Mot de passe');
		$this->_data['form_mdp'] 			= form_input(array('type'  => 'password',
													'name' => 'pwd',
													'id'    => 'pwd'));

		$this->_data['label_confirm_pwd']	= form_label('Confirmation du mot de passe');
		$this->_data['form_confirm_pwd'] 	= form_input(array('type'  => 'password',
													'name' => 'confirm_pwd',
													'id'    => 'confirm_pwd'));

		$this->_data['form_submit']    		= form_submit('envoyer', 'Créer mon compte','class = "button"');
		$this->_data['form_close']    		= form_close();

		if($this->request->getMethod() == 'post') {

				// Initialisation des règles et de la personnalisation des erreur.
			$rules = [
				'name' => [
					'rules'  => 'required|max_length[25]',
					'errors' => [
						'required' => 'Veuillez renseigner votre nom.',
						'max_length' => 'Votre nom est trop long :).',
					],
				],
				'first_name' => [
					'rules'  => 'required|max_length[20]',
					'errors' => [
						'required' => 'Veuillez renseigner votre prénom.',
						'max_length' => 'Votre prénom est trop long :).',
					],
				],
				'email' => [
					'rules'  => 'required|valid_email|max_length[100]|is_unique[users.user_mail]',
					'errors' => [
						'required' => 'Veuillez renseigner votre email.',
						'valid_email' => 'Veuillez renseigner un email valide.',
						'max_length' => 'Votre email est trop long.',
						'is_unique' => 'L\'email est déjà utilisé.',
					],
				],
				'pwd' => [
					'rules'  => 'required|min_length[6]',
					'errors' => [
						'required' => 'Veuillez renseigner votre mot de passe.',
						'min_length' => 'Votre mot de passe doit faire au moins 8 caractères',
					],
				],
				'confirm_pwd' => [
					'rules'  => 'required|matches[pwd]',
					'errors' => [
						'required' => 'Veuillez renseigner la confirmation de votre mot de passe.',
						'matches' => 'Le mot de passe et la confirmation doivent être identiques.',
					],
				]
			];

			if(!$this->validate($rules)) {

				$this->_data['validation'] = $this->validator;

			}else {

					// On instancie l'objet
				$user_model = new User_model();
				
				// On prend les informations à sauvegarder
					//Image par défault si aucune ajoutée

				if($this->request->getVar('fileToUpload') == ""){
					$AvatarDefault = "avatarDefault.jpg";
				}else {
					$AvatarDefault = $this->request->getVar('fileToUpload');
				}

				$newData = [
					'user_avatar' => $AvatarDefault,
					'user_name' => $this->request->getVar('name'),
					'user_firstname' => $this->request->getVar('first_name'),
					'user_mail' => $this->request->getVar('email'),
					'user_pwd' => Hash::make($this->request->getVar('pwd')),
					'user_role' => 3,
				];

				// var_dump($newData);die();

				$user_model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Inscription réussie');
				return redirect()->to('User/login');

			}
		};

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
