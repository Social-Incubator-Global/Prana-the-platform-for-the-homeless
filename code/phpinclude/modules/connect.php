<?php
function query_($quer)
{
	//Takes: string

    //NEVER SET ROOT AS THE MAIN USER! REMEMBER TO SET PERMISSIONS ACCORDINGLY
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $link = new mysqli($hostname, $username, $password, "prana_db")
        or die("MYSQL: Unable to connect to the specific host.\n[END]\n".mysql_error());
    $link->set_charset('utf8_swedish_ci');
    if ($link->connect_errno)
    {
      echo "Failed to connect to DB: " . $link->connect_errno;
    }
    $result = $link->query($quer) or die("".$link->error.' An internal database instruction error has occured');
    $link->close();
    return $result;
}
?>