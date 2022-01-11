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
}
