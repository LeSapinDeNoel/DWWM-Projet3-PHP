<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Critic_model;
use App\Models\Category_model;

class Critic extends BaseController
{




//PAGE D'ACCUEIL
	public function home()
	{
		//Instancier l'objet
			$objCriticModel       				= new Critic_model();
		//Données de la page
			$this->_data['title']         = "Accueil";
			$this->_data['arrCritics']   	= $objCriticModel->findAllWithCat();
      $this->display('home.tpl');

	}






//PAGE QUI AFFICHE TOUTE LES CRITIQUES
	public function index()
	{
			//instancier l'objet category
			$objCatModel			= new Category_model();
			$options 					= $objCatModel->findAllCatForSelect();


			// Création du formulaire_search
			$this->_data['form_open']    			= form_open('critic/index');
			$this->_data['label_keyword']			= form_label('Mot clé');
	    $this->_data['form_keyword'] 			= form_input('keyword', set_value('keyword'));
			$this->_data['label_creator']			= form_label('Créateur');
			$this->_data['form_creator'] 			= form_input('creator' , set_value('creator'));
			$this->_data['label_cat']					= form_label('Catégories');
			$this->_data['form_cat'] 					= form_dropdown('cat', $options, set_value('cat'));
			$this->_data['label_date']					= form_label('Date exact');
			$this->_data['form_date'] 				= form_input(array('name'=>'date','type'=>'date'), set_value('date'));
			$this->_data['form_submit']    		= form_submit('envoyer', 'envoyer');
			$this->_data['form_close']    		= form_close();

			//Instancier l'objet
			$objCriticModel       				= new Critic_model();

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
	public function critic_details()
	{
		$objCriticModel       				= new Critic_model();
			//Données de la page
			$this->_data['arrCritics']   	= $objCriticModel->findAllWithCat();
			// echo "<pre>";
			// var_dump($this->_data['arrCritics']);
			// echo "</pre>";
			//$this->_data['title']         = $this->_data['arrCritics']['title'];

			$this->display('critic_details.tpl');

	}


//PAGE DE CREATION DE CRITIC
	public function critic_create()
	{
			//instancier l'objet category
			$objCatModel			= new Category_model();
			$options 					= $objCatModel->findAllCatForSelect();
			//instancier l'objet critic
			$objCriticModel  	= new Critic_model();

			// Création du formulaire de création de critic
			$this->_data['form_open']    			= form_open('critic/critic_create');
			$this->_data['form_img']					=	form_input(array('type'  => 'file',
																														'name' => 'fileToUpload',
																														'id'	 => 'fileToUpload'));
			$this->_data['label_title']				= form_label('Titre');
			$this->_data['form_title'] 				= form_input('title', set_value('title'));
			$this->_data['label_cat']					= form_label('Catégories');
			$this->_data['form_cat'] 					= form_dropdown('cat', $options, set_value('cat'));
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
										'rules'  => 'greater_than[1]',
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

            if($this->validate($rules)) {
                //Il faudra insérer dans la BDD ici
								//Ajout d'une critic dans le BDD on utilise la method insert

								if($this->request->getVar('fileToUpload') == ""){
									$imageDefault = "img-default.jpg";
								}
								else{
									$imageDefault = $this->request->getVar('fileToUpload');
								}


								$arrData = [
								'critic_img'			=> $imageDefault,
								'critic_title'		=> $this->request->getVar('title'),
								'critic_content'	=> $this->request->getVar('content'),
								'critic_cat'			=> $this->request->getVar('cat'),
								//Fonction php qui affiche la date du jour
								'critic_date'			=> date("Y-m-d"),
								//A modifier plus tard => une fois que la session sera ok
								'critic_creator'	=> 1,
								'critic_status'		=> 1
							];

								//var_dump($arrData);
								$objCriticModel->insert($arrData);

								//Modification de l'article
								$arrData = [
								'critic_img'			=> $imageDefault,
								'critic_title'		=> $this->request->getVar('title'),
								'critic_content'	=> $this->request->getVar('content'),
								'critic_cat'			=> $this->request->getVar('cat'),
								//Fonction php qui affiche la date du jour
								'critic_date'			=> date("Y-m-d"),
								//A modifier plus tard => une fois que la session sera ok
								'critic_creator'	=> 1,
								'critic_status'		=> 1
							];

							$objCriticModel->update(critic_id, $arrData);
            }


						else {
                $this->_data['validation'] = $this->validator;
            }
        };

			//Données de la page
			$this->_data['title']  = "Nouvelle Critique";
			$this->display('critic_create.tpl');
	}
}
