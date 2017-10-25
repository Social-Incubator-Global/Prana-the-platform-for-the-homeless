<?php
function query_($quer)
{
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'prana_db';
    $link = new mysqli($hostname, $username, $password, $dbname)
        or die("MYSQL: Unable to connect to the specific host.\n[END]\n".mysql_error());
    $link->set_charset('utf8_swedish_ci');
    if ($link->connect_errno)
    {
      echo "Failed to connect to DB: " . $link->connect_errno;
    } //else { print 'connected'; }
    $result = $link->query($quer) or die("".$link->error.'Query error');
    $link->close();
    return $result;
}
