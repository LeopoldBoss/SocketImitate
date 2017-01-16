<?php
require('lib.php');
server_ini('12345', "normal");
check_query();
if(get_query()){
$response = get_query()+2;
response($response);
}
?>
