<?php
if (session_status() !==PHP_SESSION_ACTIVE) {
	session_start();}


$languages = array("english","chinese");

	if (isset($_POST["lang"]) === true && in_array($_POST["lang"],$languages)=== true){
		$_SESSION["lang"] = $_POST["lang"];
	}
		elseif (isset($_POST["lang"]) === false){
		
		if(!isset($_SESSION["lang"]))
			{
				$_SESSION["lang"] = "chinese";
			}
	}

$parent=dirname(dirname(__FILE__)); 
include $parent."/lang/".$_SESSION["lang"].".php";
//bilingual session
?>