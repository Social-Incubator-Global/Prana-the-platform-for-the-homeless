<?php
class Sqlconnect
{
	function get_conf()
	{
		return array('localhost', 'root', '', 'prana_db');
	}
	
	function sql_connect()
	{
		$conf = $this->get_conf();
		$link = new mysqli($conf[0], $conf[1], $conf[2], $conf[3])
			or die("MYSQL: Unable to connect to the specific host.\n[END]\n".mysql_error());
		$link->set_charset('utf8_swedish_ci');
		if ($link->connect_errno)
			die("Failed to connect to DB: " . $link->connect_errno);
		return $link;
	}
}
?>
