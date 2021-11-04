<?php

namespace App\Controllers;


class Critic extends BaseController
{
	public function home()
	{
        $this->display('home.tpl');
	}
	public function index()
	{
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
