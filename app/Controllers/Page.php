<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Page extends BaseController
{

	/**
	 * Page de mentions légales
	 * @return display
	 * @author Quentin Felbinger
	 */
	public function info()
	{
		$this->_data['title']         = "Mentions légales";
		$this->display('infos.tpl');
	}

	/**
	 * Page qui atteste que le mail à bien été envoyé
	 * @return display
	 * @author Julie Dienger
	 */
	public function envoi_ok()
	{

		$this->_data['title']         = "Envoi mail ok";
		$this->display('envoi_ok.tpl');
	}

	/**
	 * Page de contact qui envoie les info du formulaire à recprojet3@gmail.com
	 * @return redirect
	 * @author Julie Dienger
	 */
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


		if($this->request->getMethod() == 'post') {

			$to 	 = 'juliedienger17@gmail.com';
			$todo	 = 'recprojet3@gmail.com';
			$email = \Config\Services::email();

			$email->setTo($to);
			$email->setFrom($todo, 'Rec');
			$email->setSubject('Contact de'.' '.$this->request->getVar('name').' '.$this->request->getVar('firstname'));
			$email->setMessage('Vous avez reçu un email de : '$this->request->getVar('email').'Voici sont message : '. $this->request->getVar('message'));
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
		$this->_data['title']         = "Contactez nous";
		$this->display('contact.tpl');
	}
}
