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


		$email = \Config\Services::email();
		$email->setFrom('recprojet3@gmail.com');
		$email->setTo('expéditrice');
		$email->setSubject('sujet');
		$email->setMessage('message');

		if ($email->send())
		{
				echo 'ok';
		}
		else {
			echo "pas ok";
		}

		$this->display('contact.tpl');
	}
}
