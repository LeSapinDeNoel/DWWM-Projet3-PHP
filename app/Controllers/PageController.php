<?php

namespace App\Controllers;
  
class page extends BaseController
{
	public function index()
	{
        $this->display('infos.tpl');
	}
}
