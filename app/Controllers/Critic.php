<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Critic_model;
use App\Models\Category_model;
use App\Models\User_model;

class Critic extends BaseController
{




	/**
	 * Page d'accueil qui affiche les dernières critics
	 * @return display
	 * @author Julie Dienger
	 */
	public function home()
	{
		//Instancier l'objet
			$objCriticModel       				= new Critic_model();
		//Données de la page
			$this->_data['title']         = "Accueil";
			$this->_data['arrCritics']   	= $objCriticModel->findAllWithCat();
      $this->display('home.tpl');

	}

	/**
	 * Page qui affiche toutes les critics
	 * @return display
	 * @author Julie Dienger
	 */
	public function index()
	{
			//instancier l'objet category
			$objCatModel			= new Category_model();
			//Instancier l'objet
			$objCriticModel   = new Critic_model();
			$objUserModel    = new User_model();

			$arrCatList 			= $objCatModel->findAllCatForSelect();
			$arrUsersList			=	$objUserModel->findAllUsersForSelect();

			// Création du formulaire_search
			$this->_data['form_open']    			= form_open('critic/index');
			$this->_data['label_keyword']			= form_label('Mot clé');
	    $this->_data['form_keyword'] 			= form_input('keyword', set_value('keyword'));
			$this->_data['label_creator']			= form_label('Créateur');
			$this->_data['form_creator'] 			= form_dropdown('creator' ,$arrUsersList, 	set_value('creator'));
			$this->_data['label_cat']					= form_label('Catégories');
			$this->_data['form_cat'] 					= form_dropdown('cat', $arrCatList, set_value('cat'));
			$this->_data['label_date']				= form_label('Date exact');
			$this->_data['form_date'] 				= form_input(array('name'=>'date','type'=>'date'), set_value('date'));
			$this->_data['form_submit']    		= form_submit('envoyer', 'envoyer');
			$this->_data['form_close']    		= form_close();



			//Données de la page
			$this->_data['title']         = "Les critiques";
			$this->_data['arrCritics']   	= $objCriticModel->findAllWithCat();
			$this->display('critic.tpl');
	}

	public function critic_moderate()
	{
      $this->display('critic_moderate.tpl');
	}
	public function user_critic()
	{
      $this->display('user_critic.tpl');
	}



	/**
	 * Page qui affiche le details d'une critics
	 * @return display
	 * @author Julie Dienger
	 */
	public function critic_details()
	{
			$objCriticModel       							 = new Critic_model();
			//Données de la page
			$this->_data['arrCriticsInfo']       = $objCriticModel->where('critic_id',$_GET['art'])->findAllWithCat();
		//	echo "<pre>";var_dump($this->_data['arrCriticsInfo']);die();echo "</pre>";
			$this->_data['objCriticsInfo']			 = $this->_data['arrCriticsInfo'][0];

			$this->display('critic_details.tpl');
			// echo "<pre>";var_dump($this->_data['objCriticsInfo']);echo "</pre>";
	}



	/**
	 * Page qui affiche le details d'une critics
	 * @return display
	 * @author Julie Dienger
	 */
	public function critic_create()
	{
			// régler la durée de vie individuellement
			$smarty->caching = 2;

			// règle la durée de vie du cache a 15 minutes pour index.tpl
			$smarty->cache_lifetime = 0;

			//instancier l'objet category
			$objCatModel			= new Category_model();
			$arrCatList 					= $objCatModel->findAllCatForSelect();
			//instancier l'objet critic
			$objCriticModel  	= new Critic_model();

			// Création du formulaire de création de critic
			$this->_data['form_open']    			= form_open('critic/critic_create',array('enctype' => 'multipart/form-data'));
			$this->_data['form_img']					=	form_input(array('type'  => 'file',
																													 'name'  => 'fileToUpload',
																													 'id'    => 'fileToUpload',));
			$this->_data['label_title']				= form_label('Titre');
			$this->_data['form_title'] 				= form_input('title', set_value('title'));
			$this->_data['label_cat']					= form_label('Catégories');
			$this->_data['form_cat'] 					= form_dropdown('cat', $arrCatList, set_value('cat'));
			$this->_data['label_content']			=	form_label('Contenu');
			$this->_data['form_content']			=	form_textarea('content', set_value('content'));
			$this->_data['form_submit']    		= form_submit('envoyer', 'envoyer', "class = 'button mb-5 mr-5'");
			$this->_data['form_close']    		= form_close();

			if($this->request->getMethod() == 'post') {
                // Initialisation des règles et de la personnalisation des erreur.
            $rules = [
                'title' => [
                    'rules'  => 'required|max_length[200]',
                    'errors' => [
                        'required' => 'Veuillez renseigner votre titre.',
                        'max_length' => 'Votre titre est trop long :).',
                    ],
                ],

								'cat' => [
										'rules'  => 'greater_than[0]',
										'errors' => [
												'greater_than' => 'Veuillez renseigner une catégorie valide.',
										],
								],
								'content' => [
										'rules'  => 'required|max_length[1200]',
										'errors' => [
											'required' => 'Veuillez renseigner votre contenu.',
											'max_length' => 'Votre contenu est trop long :).',
										],
								],
            ];

				$file = $this->request->getFile('fileToUpload');

				if ($file->getName() != "" || $file->isValid() && !$file->hasMoved()) {
					$rules['fileToUpload'] = [
						'rules' => 'required|is_image[fileToUpload]|max_size[fileToUpload, 200]|ext_in[fileToUpload,jpg]|max_dims[fileToUpload,500,500]',
						'label' => 'The File',
						'errors' => [
							'required'	=> 'Vous devez importer une image',
							'is_image' 	=> 'Vous devez envoyer une image.',
							'max_size' 	=> 'Votre image est trop volumineuse (200ko max).',
							'ext_in' 		=> 'Votre image doit être au format jpg.',
							'max_dims' 	=> 'Votre image doit être d\'une dimension maximale de 500px par 500px.'
						],
					];
				}


            if($this->validate($rules)) {
                //Il faudra insérer dans la BDD ici
								//Ajout d'une critic dans le BDD on utilise la method insert

								if($file->isValid() && !$file->hasMoved()) {

									if($file->getName() == ""){
										$banniereCritic = 'banniere_default.jpg';
									}else {

										$banniereCritic = 'premiere_banniere'. $file->getRandomName() . "." . $file->getExtension();
											$image = \Config\Services::image()
												->withFile($file)
												->fit(320, 165, 'center')
												->save('./assets/images/'. $banniereCritic);
									}

								} else {
									$banniereCritic = 'banniere_default.jpg';
								}
								$arrData = [
								'critic_img'			=> $banniereCritic,
								'critic_title'		=> $this->request->getVar('title'),
								'critic_content'	=> $this->request->getVar('content'),
								'critic_cat'			=> $this->request->getVar('cat'),
								//Fonction php qui affiche la date du jour
								'critic_createdate'			=> date("Y-m-d"),
								//A modifier plus tard => une fois que la session sera ok
								'critic_creator'	=> 1,
								'critic_status'		=> 1
							];
							//echo "<pre>";var_dump($arrData);die;
								$objCriticModel->insert($arrData);
            }
						else {
                $this->_data['validation'] = $this->validator;
            }

        };

			//Données de la page
			$this->_data['title']  = "Nouvelle Critique";
			$this->display('critic_create.tpl');
	}
	/**
	 * Page de modification des critics
	 * @return redirect
	 * @author Julie Dienger
	 */
	public function critic_edit(){
		//Mettre un if si utilisateur connecté faire ...

		//instancier l'objet category
		$objCatModel			= new Category_model();
		$arrCatList 			= $objCatModel->findAllCatForSelect();
		//instancier l'objet critic
		$objCriticModel  	= new Critic_model();

		// Création du formulaire de création de critic
		$this->_data['form_open']    			= form_open('critic/critic_create',array('enctype' => 'multipart/form-data'));
		$this->_data['form_img']					=	form_input(array('type'  => 'file',
																												 'name'  => 'fileToUpload',
																												 'id'    => 'fileToUpload',));
		$this->_data['label_title']				= form_label('Titre');
		$this->_data['form_title'] 				= form_input('title', set_value('title'));
		$this->_data['label_cat']					= form_label('Catégories');
		$this->_data['form_cat'] 					= form_dropdown('cat', $arrCatList, set_value('cat'));
		$this->_data['label_content']			=	form_label('Contenu');
		$this->_data['form_content']			=	form_textarea('content', set_value('content'));
		$this->_data['form_submit']    		= form_submit('envoyer', 'envoyer', "class = 'button mb-5 mr-5'");
		$this->_data['form_close']    		= form_close();

		if($this->request->getMethod() == 'post') {
							// Initialisation des règles et de la personnalisation des erreur.
					$rules = [
							'title' => [
									'rules'  => 'required|max_length[200]',
									'errors' => [
											'required' => 'Veuillez renseigner votre titre.',
											'max_length' => 'Votre titre est trop long :).',
									],
							],

							'cat' => [
									'rules'  => 'greater_than[0]',
									'errors' => [
											'greater_than' => 'Veuillez renseigner une catégorie valide.',
									],
							],
							'content' => [
									'rules'  => 'required|max_length[1200]',
									'errors' => [
										'required' => 'Veuillez renseigner votre contenu.',
										'max_length' => 'Votre contenu est trop long :).',
									],
							],
					];

			$file = $this->request->getFile('fileToUpload');

			if ($file->getName() != "" || $file->isValid() && !$file->hasMoved()) {
				$rules['fileToUpload'] = [
					'rules' => 'required|is_image[fileToUpload]|max_size[fileToUpload, 200]|ext_in[fileToUpload,jpg]|max_dims[fileToUpload,500,500]',
					'label' => 'The File',
					'errors' => [
						'required'	=> 'Vous devez importer une image',
						'is_image' 	=> 'Vous devez envoyer une image.',
						'max_size' 	=> 'Votre image est trop volumineuse (200ko max).',
						'ext_in' 		=> 'Votre image doit être au format jpg.',
						'max_dims' 	=> 'Votre image doit être d\'une dimension maximale de 500px par 500px.'
					],
				];
			}


					if($this->validate($rules)) {
							//Il faudra insérer dans la BDD ici
							//Ajout d'une critic dans le BDD on utilise la method insert

							if($file->isValid() && !$file->hasMoved()) {

								if($file->getName() == ""){
									$banniereCritic = 'banniere_default.jpg';
								}
								else {

									$banniereCritic = 'premiere_banniere'. $file->getRandomName() . "." . $file->getExtension();
										$image = \Config\Services::image()
											->withFile($file)
											->fit(320, 165, 'center')
											->save('./assets/images/'. $banniereCritic);
								}
							}
									$arrData = [
									'critic_img'			=> $banniereCritic,
									'critic_title'		=> $this->request->getVar('title'),
									'critic_content'	=> $this->request->getVar('content'),
									'critic_cat'			=> $this->request->getVar('cat'),
									//Fonction php qui affiche la date du jour
									'critic_createdate'			=> date("Y-m-d"),
									//A modifier plus tard => une fois que la session sera ok
									'critic_creator'	=> 1,
									'critic_status'		=> 1
								];
								$objCriticModel->update('critic_id', $arrData);
								return redirect()->to('critic/home');

							}
							else {
								$this->_data['validation'] = $this->validator;
							}

	 }
						//Données de la page
						$this->_data['title']  = "Modifier la Critique";
						$this->display('critic_edit.tpl');

	}
}
