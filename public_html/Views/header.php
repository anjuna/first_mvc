<html>

<head>

<title><?php echo  $this->title; ?></title>
<link rel ="shortcut icon" href="<?php echo URL ;?>images/sinewave.ico">
<link rel="stylesheet" type="text/css" href="<?php echo URL ;?>css/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 

<?php if (isset($this->js)){

	foreach ($this->js as $file) {

		echo '<script type="text/javascript" src = "'.URL.'views/'.$file .'"></script>';
	}

} ?>

</head>

<body>

<div id="header">

		<?php if (Session::get('loggedIn') == true) {

		echo '<div id="you_are">Well hello there '.Session::get('username').'</div><br />';
	}

	?>

	<div id ="links">

		<a href="<?php echo URL ;?>index">Index</a>
		<a href="<?php echo URL ;?>Help">Help</a>

	<?php if (Session::get('loggedIn') == true) { ?>

		<a href="<?php echo URL;?>dashboard/Index" >Dashboard</a>
		<a href="<?php echo URL;?>note/Index" >Notes</a>
		<a id="logs" href="<?php echo URL;?>dashboard/logout" >Logout</a>

			<?php if(Session::get('role') == 'owner'){ 

						echo '<a href="'. URL .'user">Users</a>';

					}

		}	else { ?>

		<a id="logs" href="<?php echo URL ;?>Login">Login</a>

		<?php } ?>

	</div>



</div>

<div id="content">