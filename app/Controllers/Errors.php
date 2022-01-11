<?php

namespace App\Controllers;


class Errors extends BaseController
{
	public function show404()
	{
		$this->_data['title']         = "ERROR 404";
		$this->display('show404.tpl');
	}
	public function show403()
	{
		$this->_data['title']         = "ERROR 403";
		$this->display('show403.tpl');
	}
}
