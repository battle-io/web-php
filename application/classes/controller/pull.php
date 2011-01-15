<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Pull extends Controller {
  public function action_index() {
    if('stage' == Kohana::config('environment.env') && !empty($_POST)) {
      $payload = Arr::get($_POST,'payload',false);
      if(!$payload) {
        return;
      }
      $payload = json_decode($payload);

      // prepare the log

      $commits = $payload->commits;
      $commit = $commits[count($commits)-1];
      Kohana::$log->add(Kohana::INFO, $commit->message.' -- '.$commit->url);

      $this->exec('git pull');
      $this->exec('ant stage');
    }
  }

  private function exec($cmd) {
    $out = shell_exec($cmd . ' &2>1');
    Kohana::$log->add(Kohana::INFO, $cmd .': '. $out);
  }
}
