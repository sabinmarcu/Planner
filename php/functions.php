<?php 
date_default_timezone_set("Europe/Bucharest");

function secure($string){
	return strip_tags(addslashes($string));
}
function connect(){
	mysql_connect("localhost", "root", "fuck13") or die("Nu pot sa ma conectez la server! \n Eroarea este : ".mysql_error());
	mysql_select_db("planner") or die("Nu pot sa ma conectez la baza de date! \n Eroarea este : ".mysql_error());
}
?>