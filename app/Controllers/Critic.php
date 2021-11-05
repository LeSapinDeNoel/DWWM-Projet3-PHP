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
