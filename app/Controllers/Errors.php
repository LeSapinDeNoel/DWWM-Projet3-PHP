<?php

namespace App\Controllers;


class Errors extends BaseController
{

	/**
	 * Page erreur 404
	 * @return display
	 * @author Julie Dienger
	 */
	public function show404()
	{
		$this->_data['title']         = "ERROR 404";
		$this->display('show404.tpl');
	}
	/**
	 * Page erreur 403
	 * @return display
	 * @author Julie Dienger
	 */
	public function show403()
	{
		$this->_data['title']         = "ERROR 403";
		$this->display('show403.tpl');
	}
}
