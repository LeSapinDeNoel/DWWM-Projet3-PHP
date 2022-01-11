<?php

namespace App\Controllers;


class Errors extends BaseController
{
	public function show404()
	{
		$this->_data['title']         = "ERROR 404";
		$this->display('show404.tpl');
	}
}
