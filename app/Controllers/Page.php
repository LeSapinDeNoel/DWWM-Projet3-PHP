<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class Page extends BaseController
{
	public function infos()
	{
        $this->display( strTemplate: 'infos.tpl');
	}
}
