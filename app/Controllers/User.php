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

				$arrUserInfo = $objUser_model->where('user_mail', $strEmail)->get()->getResult();
				$objUserInfo = $arrUserInfo[0];
			
				$boolCheckpwd = Hash::check($strPwd, $objUserInfo->user_pwd);

				if(!$boolCheckpwd) {
					$session = session();
					
					session()->setFlashdata('fail', 'Mot de passe incorrect');
					
					return redirect()->to('user/login')->withInput();
				}else {
					$session = session();

					$strUserfullname = $objUserInfo->user_firstname . " ". $objUserInfo->user_name;

					$session->set([
						'loggedUser' 		=> 	$objUserInfo->user_id,
						'user' 				=> 	$strUserfullname,
						'user_name' 		=> 	$objUserInfo->user_name,
						'user_firstname'	=> 	$objUserInfo->user_firstname,
						'user_mail' 		=> 	$objUserInfo->user_mail,
						'user_avatar' 		=> 	$objUserInfo->user_avatar,
						'user_role' 		=> 	$objUserInfo->user_role
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
		$this->_data['form_open']    		= form_open('user/create_account',array('enctype' => 'multipart/form-data'));

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
					$strAvatarName = "avatarDefault.jpg";
				}else {
					$strAvatarName = $this->request->getVar('fileToUpload');
				}

				$newData = [
					'user_avatar' => $strAvatarName,
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

			// On vérifie que l'utilisateur est connecté
		if(session()->get('loggedUser') == '') {
			return redirect()->to('user/login');
		}

			// régler la durée de vie individuellement
		$smarty->caching = 2;

			// règle la durée de vie du cache a 15 minutes pour index.tpl
		$smarty->cache_lifetime = 0;


			// Création du formulaire_inscription
		$this->_data['form_open']    		= form_open('user/edit_profile',array('enctype' => 'multipart/form-data'));

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

			$file = $this->request->getFile('fileToUpload');
			
			if ($file->getName() != "" || $file->isValid() && !$file->hasMoved()) {
				$arrRules['fileToUpload'] = [
					'rules' => 'is_image[fileToUpload]|max_size[fileToUpload, 200]|ext_in[fileToUpload,jpg]|max_dims[fileToUpload,600,600]',
					'label' => 'The File',
					'errors' => [
						'is_image' => 'Vous devez envoyer une image.',
						'max_size' => 'Votre image est trop volumineuse (200ko max).',
						'ext_in' => 'Votre image doit être au format jpg.',
						'max_dims' => 'Votre image doit être d\'une dimension maximale de 600px par 600px.'
					],
				];
			}
			
			if(!$this->validate($arrRules)) {
				
				// permet d'afficher les erreurs.
				$this->_data['validation'] = $this->validator;

			}else {

					// On instancie l'objet.
				$objUser_model = new User_model();
				
					//Image par défault si aucune ajoutée
				if($file->isValid() && !$file->hasMoved()) {

					if($file->getName() == ""){
						$strAvatarName = session()->get('user_avatar');
					}else {
						
						$strAvatarName = 'avatar'. session()->get('user_name') . session()->get('loggedUser') . "." . $file->getExtension();
						$image = \Config\Services::image()
							->withFile($file)
							->fit(300, 300, 'center')
							->save('./assets/images/'. $strAvatarName);
					}

				} else {
					$strAvatarName = session()->get('user_avatar');
				}

					// On vérifie si l'utilisateur souhaite modifier son mdp ou non.
				if($this->request->getVar('pwd') == "") {
	
					$newData = [
						'user_avatar' => $strAvatarName,
						'user_name' => $this->request->getVar('name'),
						'user_firstname' => $this->request->getVar('first_name'),
					];

				}else {
	
					$newData = [
						'user_avatar' => $strAvatarName,
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
						'user_avatar'		=> 	$newData['user_avatar'],
				]);

				session()->setFlashdata('success', 'Modification réussie');
				return redirect()->to('user/edit_profile');

			}
		};

			//Données de la page.
		$this->_data['title']	= "Mon profil";

		$this->display('edit_profile.tpl');

	}

	/**
	 * Permet de gérer les utilisateurs si l'on est connecté en tant qu'administrateur.
	 * @return display
	 * @author Quentin Felbinger
	 */
	public function admin_user()
	{

			// On vérifie que l'utilisateur est connecté
		if(session()->get('loggedUser') == '') {
			return redirect()->to('user/login');
		}

			// On instancie l'objet.
		$objUser_model = new User_model();

			//Données de la page.
		$this->_data['arrUsersInfo']	= $objUser_model->findAll();

			// Création du formulaire_connexion.
		$this->_data['form_open']    		= form_open('user/admin_user');

		$this->_data['label_cat']			= form_label('');

		$this->_data['form_submit']    		= form_submit('envoyer', 'Mettre à jour','class = "button"');
		$this->_data['form_close']    		= form_close();
		
		if($this->request->getMethod() == 'post') {
			foreach($this->_data['arrUsersInfo'] as $objUserInfo) {
				$newData = [
					'user_role' => $this->request->getVar('role' . $objUserInfo->user_id)
				];
				$objUser_model->set($newData);
				$objUser_model->where('user_id', $objUserInfo->user_id);
				$objUser_model->update();
			}
			return redirect()->to('user/admin_user');
		}

		$this->_data['title']			= "Listes des utilisateurs";

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
			$session->destroy();

			$session->setFlashdata('deco', 'Vous êtes déconnecté.');
			
			return redirect()->to('user/login');
		}

	}
}
