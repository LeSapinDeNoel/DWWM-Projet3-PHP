<?php

namespace App\Controllers;


class User extends BaseController
{
	public function login()
	{
        $this->display('login.tpl');
	}

}
