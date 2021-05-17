<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// make database_info the current db
$db_selected = mysql_select_db('database_info', $link);
if (!$db_selected) {
    die ('Can\'t use assignment : ' . mysql_error());
}
?>