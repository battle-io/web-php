<?php
echo View::factory('common/header')
        ->set('title','Home');
?>
<h3>Your Settings</h3>
User - <?php echo html::chars($user->name()) ?><br/>
<?php
  if($message !== false) {
    echo '<h2>',html::chars($message),'</h2>';
  }

  $fields = array(
    'firstname' => 'First Name',
    'lastname' => 'Last Name',
    'email' => 'Email',
    'password' => 'Password',
    'password2' => 'Confirm Password',
    'key' => 'Auth Key',
  );
      
  echo form::open();
  echo '<ul class="reg">';
  foreach($fields as $key => $label) {
    if($key != 'password2') {
      $value = $user->$key;
    }
    $input_type = 'input';
    $attr = array('class'=>'text');
    $error = '';
    $extra = '';

    if('password' == $key || 'password2' == $key) {
      $input_type = 'password';
      $value = '';
      $attr['autocomplete'] ='off';
    }

    if(isset($errors[$key])) {
      $error = $errors[$key];
      $attr['class'] .= ' error';
    }

    if('email' == $key) {
      if($user->email_verified == 'True') {
	$extra = 'You have verified this email address';
      } else {
	$extra = 'You have not verified this email addres '.
	  html::anchor('settings/re_verify','Resend Confirmation email');
      }
    }

    echo '<li>',form::label($key,$label),form::$input_type($key,$value,$attr),$error,$extra,'</li>';
  }

  echo '<li>',form::submit('s','Submit'),'</li>';
  echo '</ul>';
  echo form::close();
?>

<?php
echo View::factory('common/footer');
