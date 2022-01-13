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
		//Formulaire de contact
		// Création du formulaire_search

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


		//var_dump($_POST);die;
		if($this->request->getMethod() == 'post') {
		$email = \Config\Services::email();
		$email->setFrom('recprojet3@gmail.com');
		$email->setTo($this->request->getVar('email'));
		$email->setSubject($this->request->getVar('name').' '.$this->request->getVar('firstname'));
		$email->setMessage($this->request->getVar('message'));
		//echo "<pre>";var_dump($email);
		$email->send();

		if ($email->send())
		{
				echo 'ok';
		}
		else {
			echo "pas ok";
		}
	}

		//Données de la page
		$this->_data['title']         = "Contactez nous";
		$this->display('contact.tpl');
	}
}
