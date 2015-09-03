<?php


require '../config.php';
require '../libs/Database.php';
require '../libs/Form.php';

if (isset($_REQUEST['run'])){
	
try {
		$form = new Form();

		$form    ->post('name')
				 ->val('minlength',4)
				 ->val('maxlength',10)

				 ->post('age')
				 ->val('integer')
				 ->val('maxlength',2)

				 ->post('gender');

		$form    ->submit();

		$data =  $form->fetch();

		echo 'winner winner chicken dinner';

		$db = new Database();

		$db->insert('person', $data);
		echo '<pre>';
		print_r($data);
		echo '</pre>';

} catch (Exception $e){

	echo $e->getMessage();
}

//print_r($form);


}

?>

<form method="post" action="?run">

		<label> Name: <input type="text" name="name" /> </label>
		<label> Age: <input type="text" name="age" /> </label>
		<label>	Gender: <select name="gender">
					<option value="m">Male</option>
					<option value="f">Female</option>
				</select> </label>

		<input type="submit" />

</form>