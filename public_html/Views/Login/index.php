You're about to get logged in bruv:s <br><br><br><br>

<?php if (isset($_SESSION['errors'])) {

	echo $_SESSION['errors'];
	unset($_SESSION['errors']);
} ?>

<div class="formz">

	<form action ="login/run" method="post">

		<label>Username   </label><input type="text" name="username"><br><br>
		<label>Password  </label><input type="password" name="password"><br><br>
		<input type="checkbox" name="remember" value="1">Remember me plz<br><br>
			<input type ="submit" value="Touch me">

	</form>

</div>
<br><br>
Don't have account? Get one <a href="register">here</a>