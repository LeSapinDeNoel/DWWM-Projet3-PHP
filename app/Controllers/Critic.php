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
}
