<?php

namespace App\Controllers;
use CodeIgniter\Controller;

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

	public function envoi_ok()
	{
		$this->display('envoi_ok.tpl');
	}


	public function contact()
	{

		//Formulaire de contact
		$this->_data['form_open']    				= form_open('page/contact');
		$this->_data['label_name']					= form_label('Nom');
		$this->_data['form_name'] 					= form_input('name');
		$this->_data['label_firstname']			= form_label('Prénom');
		$this->_data['form_firstname'] 			= form_input('firstname');
		$this->_data['label_email']					= form_label('E-mail');
		$this->_data['form_email'] 					= form_input('email');
		$this->_data['label_message']				= form_label('Votre message');
		$this->_data['form_message'] 				= form_textarea('message');
		$this->_data['form_submit']    			= form_submit('envoyer', 'envoyer', "class = 'button mb-5 mr-5 text-center d-block mx-auto'");
		$this->_data['form_close']    			= form_close();

		$email = \Config\Services::email();
		$email->setFrom($this->request->getVar('email'), $this->request->getVar('name'));
		$email->setTo('recprojet3@gmail.com');
		$email->setSubject('Contact de'.' '.$this->request->getVar('name').' '.$this->request->getVar('firstname'));
		$email->setMessage($this->request->getVar('message'));
		$email->send();

		if ($email->send())
		{
			return redirect()->to('page/envoi_ok');
		}
		else {
			echo "pas ok";
		}
	}

		//Données de la page
		$this->_data['title']     = "Contactez nous";
		$this->display('contact.tpl');
	}
}
