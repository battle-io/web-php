<?php
echo View::factory('common/header')
        ->set('title','Register');
?>

<?php

  $fields = array(
    'firstname' => 'First Name',
    'lastname' => 'Last Name',
    'email' => 'Email',
    'password' => 'Password',
    'password2' => 'Confirm Password',
  );
  echo form::open();
  echo '<ul class="reg">';
  $has_errors = false;
  if(isset($errors)) {
    $has_errors = true;
  }
  foreach($fields as $key => $label) {
    $value = '';
    $attr = array('class'=>'text');
    $error = '';
    $input_type = 'input';

    if($key == 'password' || $key == 'password2') {
      $input_type = 'password';
    }

    // if there are errors add some more info
    if($has_errors) {
      // reuse the values that were set except for password fields
      if('password' != $input_type) {
	$value = $values[$key];
      }

      // for the fields that were errors add a class to the form
      // and display the error
      if(isset($errors[$key])) {
	$attr['class'] .= ' error';
	$error = $errors[$key];
      }
    }
    echo '<li>',form::label($key,$label),form::$input_type($key,$value,$attr),$error,'</li>';
  }
  echo '<li>',form::submit('j','Join'),'</li>';
  echo '</ul>';
  echo form::close();
?>
<?php
echo View::factory('common/footer');
?>
