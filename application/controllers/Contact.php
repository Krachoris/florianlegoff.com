<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{

	public function index()
	{

		$nom = htmlentities($this->input->post('nom'));
		$expediteur = $this->input->post('mail');
		$message = nl2br(htmlentities($this->input->post('message')));
          $objet = htmlentities($this->input->post('objet'));

          // Règles à implémenter
          $this->form_validation->set_rules('nom', 'Nom', 'trim|required');
          $this->form_validation->set_rules('mail', 'E-mail', 'trim|required|valid_email', array('valid_email' => 'Vous devez rentrez une adresse email valide'));
          $this->form_validation->set_rules('message', 'Message', 'trim|required');
          $this->form_validation->set_rules('objet', 'Objet', 'trim|required');

          $this->form_validation->set_error_delimiters('<p class="formError">', '</p>');

		if ($this->form_validation->run())
          {
                    date_default_timezone_set('Europe/Paris');

                    // **  I. Envoi de mail  **
                    $this->load->library('email');
                    $this->email->from($expediteur, $nom);
                    $this->email->to('contact@florianlegoff.com');
                    $this->email->cc('florianlg@cryptolab.net');
                    $this->email->subject($objet);
                    $this->email->message($message);
                    $this->email->send();
 
 
                    // **  II. Sauvegarde du mail en base de données.  **

                    // Mise en tableau des données à insérer
                    
                    $data = array(
                         'nom' => $nom,
                         'email' => $expediteur,
                         'objet' => $objet,
                         'message' => $message,
                         'date_envoi' => date("Y-m-d H:i:s")
                    );

                    // Envoi en base de données
                    $this->admin_model->saveMail($data);
 
                    // Affichage de la page de confirmation.
                    return $this->load->view('contact_confirmation');
          }
		else
		{  
               $data = array(
                    'titre' => 'Contact | Florian LE GOFF',
                    'description' => 'Des questions ? Des propositions ? Contactez-moi ! - Florian LE GOFF'
               );
			$this->load->view('contact', $data);
		}
     }
} // Fin de la classe contact.php   