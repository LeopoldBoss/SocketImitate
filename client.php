<?php
require('lib.php');
ini_set("display_errors","1");
$start_number = 25;
send_query('https://risitas.online/OOP/server.php', '12345', $start_number);
if(get_errors('https://risitas.online/OOP/server.php', '12345', $start_number)!=0) {
	echo (get_errors('https://risitas.online/OOP/server.php', '12345', $start_number));
} else {
	if(send_query('https://risitas.online/OOP/server.php', '12345', $start_number)!=0) {
	echo (send_query('https://risitas.online/OOP/server.php', '12345', $start_number));
	} else {
	echo ('An unexpected error occurred');
}
}
?>
