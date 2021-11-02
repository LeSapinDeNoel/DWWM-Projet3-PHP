<?php

namespace App\Controllers;


class User extends BaseController
{
	public function login()
	{
        $this->display('login.tpl');
	}

	public function create_account()
	{
        $this->display('create_account.tpl');
	}


}
