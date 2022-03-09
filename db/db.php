<?php

function valid($param) {
    return trim(addslashes($param));
    
}
function password($param) {
    $m5 = md5($param);
    $s1 = sha1($m5);
    return $s1;
}
function getip()
{
	if(!empty($_SARVER['HTTP_CLIENT_IP']))
	{
		$ip = $_SARVER['HTTP_CLIENT_IP'];
	}
	else if(!empty($_SARVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip = $_SARVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}