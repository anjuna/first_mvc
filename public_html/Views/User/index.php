<h1>see all dem user mans</h1>

<h3> Create new user</h3>

<form method="post" action="<?php echo URL;?>user/create">


	<label>Login</label>
			<input type="text" name="username" />

	<label>Password</label>
			<input type="text" name="password" />

	<label>Role</label>
			<select type="text" name="role" />

				<option value="default">Default</option>
				<option value="admin">Admin</option>
				<option value="owner">Owner</option>
			</select>

			<br><br><br>

		<input type="submit" value="Hit me up"/>

</form>


<br><br><br>


<hr>

<h3>List of all Users and privileges</h3>

<div id="list">

<?php 

		foreach($this->userList as $key=>$val){

		echo $val->usern.' has role: '.$val->role.'  <a href="'.URL.'user/edit/'.$val->u_id.'">Edit</a> &nbsp; &nbsp; &nbsp;' ;

		echo	($val->role != 'owner') ? ' <a href="'.URL.'user/delete/'.$val->u_id.'">Delete</a>  <br />' : '<br />';


} ?>

</div> 