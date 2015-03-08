<?php


function isEditPage($formName) {
	return (strpos($formName, "edit") !== false);
}

function getBack($path) {
	$back = $_SESSION['back'];

	if (empty($back)) {
		return "location.href='$path'";
	} else {
		return "location.href='".$back."'";
	}
}

