<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;
use App\Libraries\Hash;


class User extends BaseController
{

	/**
	 * Page de connexion. Qui permet donc à l'utilisateur de se connecter avec son compte.
	 * @return redirect
	 * @author Quentin Felbinger
	 */
	public function login()
	{
		// Création du formulaire_connexion.
		$this->_data['form_open']    		= form_open('user/login');

		$this->_data['label_email']			= form_label('Email');
		$this->_data['form_email'] 			= form_input(array('type'  => 'email',
															'name' => 'email',
															'id'    => 'email'),set_value('email'));

		$this->_data['label_mdp']			= form_label('Mot de passe');
		$this->_data['form_mdp'] 			= form_input(array('type'  => 'password',
															'name' => 'pwd',
															'id'    => 'pwd'));

		$this->_data['form_submit']    		= form_submit('envoyer', 'Se connecter','class = "button"');
		$this->_data['form_close']    		= form_close();

		if($this->request->getMethod() == 'post') {
			
			// Initialisation des règles et de la personnalisation des erreur.
			$arrRulesLogin = [
				'email' => [
					'rules'  => 'required|valid_email|is_not_unique[users.user_mail]',
					'errors' => [
						'required' => 'Veuillez renseigner votre email',
						'valid_email' => 'Veuillez renseigner des identifiants valides.',
						'is_not_unique' => 'Vous n\'êtes pas inscrit.'
					],
				],
				'pwd' => [
					'rules'  => 'required',
					'errors' => [
						'required' => 'Veuillez renseigner votre mot de passe.'
					]
				]
			];
	
			if(!$this->validate($arrRulesLogin)) {
	
					// permet d'afficher les erreurs.
				$this->_data['validation'] = $this->validator;
	
			}else {

					// On instancie l'objet
				$objUser_model = new User_model();

					// On récupère les valeurs du formulaire.
				$strEmail = $this->request->getVar('email');
				$strPwd = $this->request->getVar('pwd');

				$arrUserInfo = json_decode(json_encode($objUser_model->where('user_mail', $strEmail)->first()), true);
			
				$boolCheckpwd = Hash::check($strPwd, $arrUserInfo['user_pwd']);

				if(!$boolCheckpwd) {
					$session = session();
					
					session()->setFlashdata('fail', 'Mot de passe incorrect');
					
					return redirect()->to('user/login')->withInput();
				}else {
					$session = session();

					$strUserfullname = $arrUserInfo['user_firstname'] . " ". $arrUserInfo['user_name'];

					$session->set([
						'loggedUser' 		=> 	$arrUserInfo['user_id'],
						'user' 				=> 	$strUserfullname,
						'user_name' 		=> 	$arrUserInfo['user_name'],
						'user_firstname'	=> 	$arrUserInfo['user_firstname'],
						'user_mail' 		=> 	$arrUserInfo['user_mail'],
						'user_avatar' 		=> 	$arrUserInfo['user_avatar'],
						'user_role' 		=> 	$arrUserInfo['user_role']
					]);

					$session->setFlashdata('success', 'Vous êtes connecté.');

					return redirect()->to('user/edit_profile');
				}
			}
		}

			//Données de la page.
		$this->_data['title']	= "Se connecter";

        $this->display('login.tpl');
	}

	/**
	 * Page de création de compte. Qui permet donc à l'utilisateur de s'inscrire.
	 * @return redirect
	 * @author Quentin Felbinger
	 */
	public function create_account()
	{
		// Création du formulaire_inscription.
		$this->_data['form_open']    		= form_open('user/create_account');

		$this->_data['form_img'] 			= form_input(array('type'  => 'file',
														 'name'  => 'fileToUpload',
														 'id'    => 'fileToUpload'));

		$this->_data['label_nom']			= form_label('Nom');
		$this->_data['form_nom'] 			= form_input('name',set_value('name'));

		$this->_data['label_prenom']		= form_label('Prénom');
		$this->_data['form_prenom'] 		= form_input('first_name', set_value('first_name'));

		$this->_data['label_email']			= form_label('Email');
		$this->_data['form_email'] 			= form_input(array('type'  => 'email',
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
			$arrRules = [
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
						'min_length' => 'Votre mot de passe doit faire au moins 6 caractères',
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

			if(!$this->validate($arrRules)) {

				$this->_data['validation'] = $this->validator;

			}else {

					// On instancie l'objet
				$objUser_model = new User_model();
				
				// On prend les informations à sauvegarder
					//Image par défault si aucune ajoutée

				if($this->request->getVar('fileToUpload') == ""){
					$strAvatarDefault = "avatarDefault.jpg";
				}else {
					$strAvatarDefault = $this->request->getVar('fileToUpload');
				}

				$newData = [
					'user_avatar' => $strAvatarDefault,
					'user_name' => $this->request->getVar('name'),
					'user_firstname' => $this->request->getVar('first_name'),
					'user_mail' => $this->request->getVar('email'),
					'user_pwd' => Hash::make($this->request->getVar('pwd')),
					'user_role' => 3,
				];

				// var_dump($newData);die();

				$objUser_model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Inscription réussie');
				return redirect()->to('user/login');

			}
		};

		//Données de la page
		$this->_data['title']	= "Créer un compte";

        $this->display('create_account.tpl');
		
	}

	/**
	 * Page de profil. Qui permet à l'utilisateur de modifier son mot de passe, son nom, son prénom ou son image de profil.
	 * @return redirect
	 * @author Quentin Felbinger
	 */
	public function edit_profile()
	{

		if(session()->get('loggedUser') == '') {
			return redirect()->to('user/login');
		}

			// Création du formulaire_inscription
		$this->_data['form_open']    		= form_open('user/edit_profile');

		$this->_data['form_img'] 			= form_input(array('type'  => 'file',
														 'name'  => 'fileToUpload',
														 'id'    => 'fileToUpload',
														 'value'    => session()->get('user_avatar')));

		$this->_data['label_nom']			= form_label('Nom');
		$this->_data['form_nom'] 			= form_input(array('type'  => 'text',
														'name' => 'name',
														'id'    => 'name',
														'value'    => session()->get('user_name')));

		$this->_data['label_prenom']		= form_label('Prénom');
		$this->_data['form_prenom'] 		= form_input(array('type'  => 'text',
														'name' => 'first_name',
														'id'    => 'first_name',
														'value'    => session()->get('user_firstname')));

		$this->_data['label_mdp']			= form_label('Nouveau mot de passe');
		$this->_data['form_mdp'] 			= form_input(array('type'  => 'password',
													'name' => 'pwd',
													'id'    => 'pwd'));

		$this->_data['label_confirm_pwd']	= form_label('Confirmation du mot de passe');
		$this->_data['form_confirm_pwd'] 	= form_input(array('type'  => 'password',
													'name' => 'confirm_pwd',
													'id'    => 'confirm_pwd'));

		$this->_data['form_submit']    		= form_submit('envoyer', 'Modifier mon profil','class = "button"');
		$this->_data['form_close']    		= form_close();

		if($this->request->getMethod() == 'post') {

				// Initialisation des règles et de la personnalisation des erreur.
			$arrRules = [
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
				'confirm_pwd' => [
					'rules'  => 'matches[pwd]',
					'errors' => [
						'matches' => 'Le mot de passe et la confirmation doivent être identiques.',
					],
				]
			];
			if(!$this->validate($arrRules)) {

					// permet d'afficher les erreurs.
				$this->_data['validation'] = $this->validator;

			}else {

					// On instancie l'objet.
				$objUser_model = new User_model();
				
					//Image par défault si aucune n'est upload.
				if($this->request->getVar('fileToUpload') == ""){
					$strAvatarDefault = "avatarDefault.jpg";
				}else {
					$strAvatarDefault = $this->request->getVar('fileToUpload');
				}

					// On vérifie si l'utilisateur souhaite modifier son mdp ou non.
				if($this->request->getVar('pwd') == "") {
	
					$newData = [
						'user_avatar' => $strAvatarDefault,
						'user_name' => $this->request->getVar('name'),
						'user_firstname' => $this->request->getVar('first_name'),
					];

				}else {
	
					$newData = [
						'user_avatar' => $strAvatarDefault,
						'user_name' => $this->request->getVar('name'),
						'user_firstname' => $this->request->getVar('first_name'),
						'user_pwd' => Hash::make($this->request->getVar('pwd')),
					];
				}

					// On applique les modifications.
				$objUser_model->set($newData);
				$objUser_model->where('user_id', session()->get('loggedUser'));
				$objUser_model->update();
				

					// On met à jour la session avec les informations modifiées.
				$strUserfullname = $this->request->getVar('first_name') . " ". $this->request->getVar('name');
				session()->set([
						'user' 				=> 	$strUserfullname,
						'user_name' 		=> 	$newData['user_name'],
						'user_firstname'	=> 	$newData['user_firstname'],
				]);

				session()->setFlashdata('success', 'Modification réussie');
				return redirect()->to('user/edit_profile');

			}
		};

			//Données de la page.
		$this->_data['title']	= "Mon profil";

		$this->display('edit_profile.tpl');

	}

	public function admin_user()
	{
        $this->display('admin_user.tpl');
	}

	/**
	 * Permet de se déconnecter lorsque l'on est connecté...
	 * @return redirect
	 * @author Quentin Felbinger
	 */
	public function logout()
	{
		if(session()->has('loggedUser')){
			$session = session();
			$session->remove('loggedUser', 'user', 'user_avatar', 'user_role');

			$session->setFlashdata('deco', 'Vous êtes déconnecté.');
			
			return redirect()->to('user/login');
		}

	}
}
