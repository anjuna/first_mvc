You're looking at index

<br />

<?php 	

if (isset($_SESSION['activate'])) {

			echo  $_SESSION['activate'];
			unset($_SESSION['activate']);
		} 