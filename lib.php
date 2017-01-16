<?php
/*
SocketPack by @apxyz(tg, vk) v.0.1
*/
function server_ini($passcode, $status) {
	if(empty($passcode)) {
		$GLOBALS['required_passcode'] = 0;
	} else {
		$GLOBALS['required_passcode'] = $passcode;
	}
	if($status=="maintain") {
		$GLOBALS['access'] = 0;
	}
	if($status=="normal") {
		$GLOBALS['access'] = 1;
	}
	if(empty($status)) {
		$GLOBALS['access'] = 1;
	}
}
function send_query($server, $passcode, $content){
	$passcode = urlencode($passcode);
	$content = urlencode($content);
	$adress = $server.'/?pass='.$passcode.'&content='.$content;
	$response = file_get_contents($adress);
	$response = urldecode($response);
	$rsp = json_decode($response, true);
	if(isset($rsp['error'])){
		return 0;
	} else {
		return $rsp['response'];
	}
}
function get_errors($server, $passcode, $content) {
	$passcode = urlencode($passcode);
	$content = urlencode($content);
	$adress = $server.'/?pass='.$passcode.'&content='.$content;
	$response = file_get_contents($adress);
	$response = urldecode($response);
	$rsp = json_decode($response, true);
	if(isset($rsp['error'])){
		return $rsp['error'];
	} else {
		return 0;
	}
}
function check_query() {
	$passcode = urldecode(htmlspecialchars($_GET['pass'], ENT_QUOTES));
	if($GLOBALS['required_passcode']!==0) {
		if($passcode!=$GLOBALS['required_passcode']) {
			$GLOBALS['e'] = "{'error':'401'}";
		}
	}
	if(empty($_GET['content'])) {
		$GLOBALS['e'] = "{'error':'400'}";
	}
	if($GLOBALS['access']==0) {
		$GLOBALS['e'] = "{'error':'423'}";
	}
	if(!empty($GLOBALS['e'])) {
		echo $GLOBALS['e'];
		exit();
	}

}
function get_query() {
	$content = urldecode(htmlspecialchars($_GET['content'], ENT_QUOTES));
	return $content;
}
function response($content) {
	$content = urlencode($content);
	echo ('{\'response\':\''.$content.'\'}');
}
?>
