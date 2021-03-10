<?php
session_start();

$languages = array("english","chinese");

if (isset($_GET["lang"]) === true && in_array($_GET["lang"],$languages)=== true){
	$_SESSION["lang"] = $_GET["lang"];
}
elseif (isset($_GET["lang"]) === false){
	$_SESSION["lang"] = "chinese";
}

include "lang/".$_SESSION["lang"].".php";
?> 