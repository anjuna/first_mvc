<?php 

function my_sanitize($input){

	return htmlentities($input, ENT_QUOTES, 'UTF-8');
}