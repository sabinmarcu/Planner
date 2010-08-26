<?php
	session_start();
	if(session_destroy())	{
		$data[result] = 'success';
	}	else $data[result] = 'fail';
	echo json_encode($data);
	exit;
?>