<?php defined('SYSPATH') or die('No direct script access.');

class Command_Model {
	public function start($commandJob) { 
		$command = $commandJob.' > /dev/null 2>&1 & echo $!'; 
		exec($command ,$op); 
		$pid = (int)$op[0]; 

		if($pid!="") return $pid; 

		return false; 
	}

	public function exists($pid) { 
		exec("ps ax | grep $pid 2>&1", $output); 

		while( list(,$row) = each($output) ) { 

			$row_array = explode(" ", $row); 
			$check_pid = $row_array[0]; 

			if($pid == $check_pid) { 
				return true; 
			} 
	        } 

		return false; 
	} 

	public function kill($pid) { 
		exec("kill -9 $pid", $output); 
	} 
}
