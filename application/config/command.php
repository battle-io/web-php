<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 */
$config = array(
	'servers' => array(
		'Connect Four' => 'java -jar CW_ConnectFour_thrift.jar loggerToConsole.psf 10000',
		'Switch' => 'java -jar CW_Switch_clean.jar config.psf loggerToConsole.psf',
	),
	'bots' => array(
		'',
	)
);
