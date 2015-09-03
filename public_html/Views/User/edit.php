<h3> Edit a user</h3>


<form method="post" action="<?php echo URL;?>user/editSave/<?php echo $this->user[0]->u_id;?>">


	<label>Login: </label>
			<input type="text" name="username" value="<?php echo $this->user[0]->usern; ?>" />

	<label>Password: </label>
			<input type="text" name="password" />

<?php

		if($this->user[0]->role != 'owner'){   ?>

			<label>Role: </label>
					<select type="text" name="role" />

						<option value="default" <?php echo ($this->user[0]->role == 'default') ? 'selected' : '' ; ?>>Default</option>
						<option value="admin" <?php echo ($this->user[0]->role == 'admin') ? 'selected' : '' ; ?>>Admin</option>
						<option value="owner" >Owner</option>
					</select>

<?php } 	?>

			<br><br><br>

		<input type="submit" value="Hit me up"/>

</form>