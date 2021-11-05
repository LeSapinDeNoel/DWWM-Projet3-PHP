<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Critic_model;

class Critic extends BaseController
{
	public function home()
	{
      $this->display('home.tpl');
	}

	public function index()
	{
			// Création du formulaire_search
			$this->_data['form_open']     = form_open('critic/index');
			$this->_data['label_keyword']	= form_label('Mot clé');
	    $this->_data['form_keyword']  = form_input('keyword');
			$this->_data['form_close']    = form_close();




			$objCriticModel       				= new Critic_model();
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
