<?php
if (session_status() !==PHP_SESSION_ACTIVE) {
	session_start();}
$languages = array("english","chinese");


	if (isset($_GET["lang"]) === true && in_array($_GET["lang"],$languages)=== true){
		$_SESSION["lang"] = $_GET["lang"];
	}
		elseif (isset($_GET["lang"]) === false){
		
		if(!isset($_SESSION["lang"]))
			{
				$_SESSION["lang"] = "chinese";
			}
	}

	$parent=dirname(dirname(__FILE__)); 
	include $parent."/lang/".$_SESSION["lang"].".php";
?>