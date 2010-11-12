<?php defined('SYSPATH') or die('No direct script access.');

class Model_Email extends Model {
	public function __construct() {
		include Kohana::find_file('vendor','Swift/lib/swift_required');
		$this->config = Kohana::config('email');
		$username = $this->config['username'];
		$this->send = false!==$username;
		if(!$this->send) return;

		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
			->setUsername($this->config['username'])
			->setPassword($this->config['password']);

		$this->mailer = Swift_Mailer::newInstance($transport);
	}

	public function message($to,$subject,$html_body,$text_body = false,$batch = false) {
		if(!$this->send) return false;
		View::set_global('host',$this->config['link_domain']);
		$message = Swift_Message::newInstance()

			//Give the message a subject
			->setSubject($subject)

			//Set the From address with an associative array
			->setFrom($this->config['from'])

			//Set the To addresses with an associative array
			->setTo($to)

			//Give it a body
			->setBody($html_body->render(),'text/html');
		if($text_body)
			$message->addPart($text_body->render(),'text/plain');

		if($batch)
			return $this->mailer->batchSend($message);
		else
			return $this->mailer->send($message);
	}
}
