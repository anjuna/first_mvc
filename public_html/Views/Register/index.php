Here we'll make an account for yas <br /><br />

<?php 

$mess = Session::get('error_message');
$mess = explode(',', $mess);

foreach ($mess as $line) {
	echo '<div class="error">'.$line.'</div> <br />';
}

?>

<div class="formz">
	<form action="register/run" method="post"> 

		<div>Your email:  <input type="text" name="new_email" value="<?php echo (isset($_POST['new_email'])) ? $_POST['new_email'] : ''; ?>"/></div>
		<br /><br />

		<div>Your username: &nbsp; <input type="text" name="new_user" value="<?php echo (isset($_POST['new_email'])) ? $_POST['new_user'] : ''; ?>"></div>
		<br /><br />

		<div>Your password:<input type="password" name="new_pass" />    </div>
		<br /><br />

		<div>Confirm that shit:<input type="password" name="new_pass_check" /></div>
		<br /><br />

		<div><input type="submit" value="av a go!" /></div><br /><br />
	</form>
</div>