<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Critic_model;
use App\Models\Category_model;

class Critic extends BaseController
{
	public function home()
	{
		//Instancier l'objet
			$objCriticModel       				= new Critic_model();
		//Données de la page
			$this->_data['title']         = "Accueil";
			$this->_data['arrCritics']   	= $objCriticModel->findAllWithCat();
      $this->display('home.tpl');

	}

	public function index()
	{
			// Création du formulaire_search
			$this->_data['form_open']    			= form_open('critic/index');
			$this->_data['label_keyword']			= form_label('Mot clé');
	    $this->_data['form_keyword'] 			= form_input('keyword', set_value('keyword'));
			$this->_data['label_creator']			= form_label('Créateur');
			$this->_data['form_creator'] 			= form_input('creator' , set_value('creator'));
			$this->_data['label_date']				= form_label('Date exact');
			$this->_data['form_date'] 				= form_input(array('name'=>'date','type'=>'date'), set_value('date'));
			$this->_data['label_startdate']		= form_label('Date de début');
			$this->_data['form_startdate'] 		= form_input(array('name'=>'startdate','type'=>'date'), set_value('startdate'));
			$this->_data['label_enddate']			= form_label('Date de fin');
			$this->_data['form_enddate']  		= form_input(array('name'=>'enddate','type'=>'date'), set_value('enddate') );
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
			$this->display('critic_details.tpl');
	}
	public function critic_create()
	{
			$objCatModel	= new Category_model();

			$options = $objCatModel->findAllCatForSelect();

			// Création du formulaire_search
			$this->_data['form_open']    			= form_open('critic/critic_create');
			$this->_data['label_title']				= form_label('Titre');
			$this->_data['form_title'] 				= form_input('title');
			$this->_data['label_cat']					= form_label('Catégories');
			$this->_data['form_cat'] 					= form_dropdown('cat', $options, 'Catégories');
			$this->_data['label_content']			=	form_label('Contenu');
			$this->_data['form_content']			=	form_textarea('content');
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
										'rules'  => 'required',
										'errors' => [
												'required' => 'Veuillez renseigner une catégorie.',
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
            }else {
                $this->_data['validation'] = $this->validator;
            }
        };

			//Données de la page
			$this->_data['title']         = "Nouvelle Critique";
			$this->display('critic_create.tpl');
	}
}
