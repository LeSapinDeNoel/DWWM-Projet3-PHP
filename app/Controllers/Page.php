<?php

namespace App\Controllers;


class Page extends BaseController
{
	public function index()
	{
    $this->display('help.tpl');
	}

	public function info()
	{
		$this->display('infos.tpl');
	}

	public function contact()
	{
		$this->display('contact.tpl');
	}


	public function error_403()
	{
		$this->_data['title']         = "ERROR 403";
		$this->display('error_403.tpl');
	}
}
