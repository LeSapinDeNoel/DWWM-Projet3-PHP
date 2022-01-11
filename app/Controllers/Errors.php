<?php

namespace App\Controllers;


class Page extends BaseController
{
	public function show404 ()
	{
		$this->_data['title']         = "ERROR 404";
		$this->display('error_404.tpl');
	}
}
