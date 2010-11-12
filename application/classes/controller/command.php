<?php defined('SYSPATH') OR die('No direct access allowed.');

class Command_Controller extends Controller {
	public function __construct() {
                parent::__construct();

		$this->session= Session::instance();
		$this->auth=new Auth;
                if($this->auth->logged_in()) {
                        $this->user = $this->auth->get_user();
			//now you have access to user information stored in the database
                } else {
			url::redirect('');
		}

		$this->config = Kohana::config('command');
	}

	public function index() {
		$view = new View('command/index');
		$servers = $this->config['servers'];
		$this->getRunningServers($servers);
	
		$view->servers = $servers;
		$view->render(true);
	}

	private function getRunningServers(&$servers) {
		$running = ORM::factory('command')->find_all();
		$sys = new System_Model();
		foreach($running as $cmd) {
			// check to see if the command is still running
			if(!$sys->exists($cmd->pid)) {
				// if it is not running delete it from the db
				$cmd->delete();
				continue;
			}
			if(isset($servers[$cmd->command])) {
				if(!isset($servers[$cmd->command]['running'])) {
					$servers[$cmd->command]['running'] = array();
				}
				array_push($servers[$cmd->command]['running'],$cmd->pid);
			}
		}
	}

	public function start() {
		$name = $this->input->get('command');
		$command = $this->config['servers'][$name];

		$cmd = new System_Model();

		// fire up the command
		$pid = $cmd->start($command['command'],$command['directory']);

		// store the name and the pid in the db
		$command_row = new Command_Model();
		$command_row->pid = $pid;
		$command_row->command = $name;
		$command_row->save();

		url::redirect('command');
	}

	public function kill($pid) {
		// kill the command by pid
		// don't delete from db as the command might not really be dead
		// let the index run it's check to test
		$cmd = new System_Model();
		$cmd->kill($pid);

		url::redirect('command');
	}
}
