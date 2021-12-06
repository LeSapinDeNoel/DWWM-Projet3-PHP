<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Critic_model;

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
}
