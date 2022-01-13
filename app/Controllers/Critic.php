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
			//instancier objets
			$objCatModel			= new Category_model();
			$objCriticModel   = new Critic_model();
			$objUserModel     = new User_model();

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
			$this->_data['form_submit']    		= form_submit('envoyer', 'envoyer', "class = 'button mb-5 mr-5 text-center d-block mx-auto'");
			$this->_data['form_close']    		= form_close();

			//Données de la page
			$this->_data['title']         = "Les critiques";
			$this->_data['arrCritics']   	= $objCriticModel->findAllWithCat();
			$this->display('critic.tpl');
	}






	public function critic_moderate()
	{
			// On vérifie que l'utilisateur est connecté
		if(session()->get('loggedUser') == '') {
			return redirect()->to('Errors/show403');
		}

		//Instancier l'objet
		$objCriticModel       				= new Critic_model();
		//Données de la page.
		$this->_data['arrCritics']   	= $objCriticModel->findAllWithCat();


    $this->display('critic_moderate.tpl');
	}





	/**
	 * Page qui permet de supprimer une critiques
	 * @return redirect
	 * @author Julie Dienger
	 */
	public function critic_delete(){

		// On vérifie que l'utilisateur est connecté
		if(session()->get('loggedUser') == '') {
			return redirect()->to('Errors/show403');
		}

		// On instancie l'objet.
		$objCriticModel      = new Critic_model();
		$strId = $_GET["art"];
		$arrCriticASuppr		 = $objCriticModel->where('critic_id', $strId)->findAllWithCat();
		//var_dump($arrCriticASuppr[0]->critic_creator);var_dump(session()->get('loggedUser'));die;
		//On vérifier que la critique appartient à l'utilisateur
		if(session()->get('loggedUser') != $arrCriticASuppr[0]->critic_creator) {
			return redirect()->to('Errors/show403');
		}
		$objCriticModel->where('critic_id', $strId);
		$objCriticModel->delete();

		return redirect()->to('critic/user_critic');
	}




	/**
	 * Page qui affiche les critics de l'utilisateur
	 * @return display
	 * @author Julie Dienger
	 */
	public function user_critic()
	{

		//Page accéssible uniquement si utilisateur connecté
		if(session()->get('loggedUser') == '') {
			return redirect()->to('Errors/show403');
		}


			//instancier objets
			$objCatModel			= new Category_model();
			$objCriticModel   = new Critic_model();
			$objUserModel     = new User_model();

			$arrCatList 			= $objCatModel->findAllCatForSelect();
			$arrUsersList			=	$objUserModel->findAllUsersForSelect();

			// Création du formulaire_search cette fois sans le créator
			$this->_data['form_open']    			= form_open('critic/user_critic');
			$this->_data['label_keyword']			= form_label('Mot clé');
			$this->_data['form_keyword'] 			= form_input('keyword', set_value('keyword'));
			$this->_data['label_cat']					= form_label('Catégories');
			$this->_data['form_cat'] 					= form_dropdown('cat', $arrCatList, set_value('cat'));
			$this->_data['label_date']				= form_label('Date exact');
			$this->_data['form_date'] 				= form_input(array('name'=>'date','type'=>'date'), set_value('date'));
			$this->_data['form_submit']    		= form_submit('envoyer', 'envoyer', "class = 'button mb-5 mr-5 text-center d-block mx-auto'");
			$this->_data['form_close']    		= form_close();

			//On affiche uniquement les critics qui appartiennet au critic_creator
			$this->_data['arrCritics']   			= $objCriticModel->where('critic_creator', session()->get('loggedUser'))->findAllWithCat();

			//Données de la page
			$this->_data['title']         		= "Mes critiques";
      $this->display('user_critic.tpl');
	}




	/**
	 * Page qui affiche le details d'une critique
	 * @return display
	 * @author Julie Dienger
	 */
	public function critic_details()
	{
			//instancier objets
			$objCriticModel       							 = new Critic_model();

			$this->_data['arrCriticsInfo']       = $objCriticModel->where('critic_id',$_GET['art'])->findAllWithCat();
			$this->_data['objCriticsInfo']			 = $this->_data['arrCriticsInfo'][0];

			//Données de la page
			$this->display('critic_details.tpl');
	}



	/**
	 * Page qui affiche le details d'une critics
	 * @return display
	 * @author Julie Dienger
	 */
	public function critic_create()
	{
			//Page accéssible uniquement si utilisateur connecté
			if(session()->get('loggedUser') == '') {
				return redirect()->to('Errors/show403');
			}

			//instancier l'objet category
			$objCatModel			= new Category_model();
			$arrCatList 			= $objCatModel->findAllCatForSelect();
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
            // Initialisation des règles et des erreur.
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
						'rules' => 'is_image[fileToUpload]|max_size[fileToUpload, 200]|ext_in[fileToUpload,jpg]|max_dims[fileToUpload,1920,1080]',
						'label' => 'The File',
						'errors' => [

							'is_image' 	=> 'Vous devez envoyer une image.',
							'max_size' 	=> 'Votre image est trop volumineuse (200ko max).',
							'ext_in' 		=> 'Votre image doit être au format jpg.',
							'max_dims' 	=> 'Votre image doit être d\'une dimension maximale de 500px par 500px.',
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
								else {
									$banniereCritic = 'banniere_default.jpg';
								}
								$arrData = [
								'critic_img'					=> $banniereCritic,
								'critic_title'				=> $this->request->getVar('title'),
								'critic_content'			=> $this->request->getVar('content'),
								'critic_cat'					=> $this->request->getVar('cat'),
								//Fonction php qui affiche la date du jour
								'critic_createdate'		=> date("Y-m-d"),
								'critic_creator'			=> session()->get('loggedUser'),
								//TODO A modifier plus tard => une fois qu'on auras fait le publié/dépublié
								'critic_status'				=> 1
							];

								$objCriticModel->insert($arrData);
								return redirect()->to('critic/user_critic');

            }
						else {
                $this->_data['validation'] = $this->validator;
            }
        };

			//Données de la page
			$this->_data['title']  = "Ajouter Critique";
			$this->display('critic_create.tpl');
	}





	/**
	 * Page de modification des critics
	 * @return redirect
	 * @author Julie Dienger
	 */
	public function critic_edit(){

		//Page accéssible uniquement si utilisateur connecté
		if(session()->get('loggedUser') == '') {
			return redirect()->to('Errors/show403');
		}


		//instancier l'objet category
		$objCatModel			= new Category_model();
		$arrCatList 			= $objCatModel->findAllCatForSelect();
		//instancier l'objet critic
		$objCriticModel  	= new Critic_model();
		$arrCriticInfo 		= $objCriticModel->where('critic_id',$_GET['art'])->findAllWithCat();
		//var_dump($arrCriticInfo);die;

		$this->_data['objCriticInfo'] 		= $arrCriticInfo[0];
		//var_dump($this->_data['objCriticInfo']);die;
		$objCriticInfoRapid 							= $arrCriticInfo[0];//$this->_data['objCriticInfo'];

		// Création du formulaire de modification de critic
		$this->_data['form_open']    			= form_open('critic/critic_edit?art='.$_GET['art'],array('enctype' => 'multipart/form-data'));
		$this->_data['form_img']					=	form_input(array('type'  => 'file',
																												 'name'  => 'fileToUpload',
																												 'id'    => 'fileToUpload',
																												 'value' => $objCriticInfoRapid->critic_img,));
		$this->_data['label_title']				= form_label('Titre');
		$this->_data['form_title'] 				= form_input(array('type'  => 'text',
																												 'name'	 => 'title',
																												 'id'    => 'title',
																												 'value' => $objCriticInfoRapid->critic_title));
		$this->_data['label_cat']					= form_label('Catégories');
		$this->_data['form_cat'] 					= form_dropdown('cat', $arrCatList, set_value($objCriticInfoRapid->critic_cat));
		$this->_data['label_content']			=	form_label('Contenu');
		$this->_data['form_content']			=	form_textarea(array('type'   => 'text',
																												  	'name'  => 'content',
																												  	'id'    => 'content',
																												  	'value' => $objCriticInfoRapid->critic_content));
		$this->_data['form_submit']    		= form_submit('envoyer', 'modifier', "class = 'button mb-5 mr-5'");
		$this->_data['form_close']    		= form_close();

		if($this->request->getMethod() == 'post') {

			//echo "coucou";die;
							// Initialisation des règles et de la personnalisation des erreur.
					$rules = [
							'title' => [
									'rules'  => 'max_length[200]',
									'errors' => [
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
									'rules'  => 'max_length[1200]',
									'errors' => [
										'max_length' => 'Votre contenu est trop long :).',
									],
							],
					];

			$file = $this->request->getFile('fileToUpload');

			if ($file->getName() != "" || $file->isValid() && !$file->hasMoved()) {
				$rules['fileToUpload'] = [
					'rules' => 'is_image[fileToUpload]|max_size[fileToUpload, 200]|ext_in[fileToUpload,jpg]|max_dims[fileToUpload,1920,1080]',
					'label' => 'The File',
					'errors' => [
						'is_image' 	=> 'Vous devez envoyer une image.',
						'max_size' 	=> 'Votre image est trop volumineuse (200ko max).',
						'ext_in' 		=> 'Votre image doit être au format jpg.',
						'max_dims' 	=> 'Votre image doit être d\'une dimension maximale de 500px par 500px.'
					],
				];
			}


					if($this->validate($rules)) {

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
							else {
								$banniereCritic = 'banniere_default.jpg';
							}
									$arrNewData = [
									'critic_img'			=> $banniereCritic,
									'critic_title'		=> $this->request->getVar('title'),
									'critic_content'	=> $this->request->getVar('content'),
									'critic_cat'			=> $this->request->getVar('cat'),
									//Fonction php qui affiche la date du jour
									'critic_createdate'			=> date("Y-m-d"),

									'critic_creator'				=> session()->get('loggedUser'),
									//TODO A modifier plus tard => une fois qu'on auras fait le publié/dépublié
									'critic_status'					=> 1
								];
								//echo "<pre>";var_dump($arrNewData);die;
								$objCriticModel->set($arrNewData);
								$objCriticModel->where('critic_id' ,$objCriticInfoRapid->critic_id);
								$objCriticModel->update();
								return redirect()->to('critic/user_critic');

							}
							else {
								$this->_data['validation'] = $this->validator;
							}

	 }
						//Données de la page
						$this->_data['title']  = "Modifier ma Critique";
						$this->display('critic_edit.tpl');

	}
}
