<?php
	$str = "1 2 3";
	$tab = array("4","5","6");
	$tmp = explode(" ",$str);
	$imp = implode(" ",$tab);
	echo "$tmp[0] $imp";
?>
