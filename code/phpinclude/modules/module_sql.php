<?php
/*
<Prana-deutschland. The platform for the homeless>
    Copyright (C) <2016-2017>  <Oscar Arjun Singh Tark, Catie Carson, Nicholas Alexander Kearney, Jeremy Leresteux, Emilie Caron, Robinson Choe and all underlying members of Prana-deutschland>
    <Original programmers: Oscar Arjun Singh Tark, Robinson Choe, Nicholas Alexander Kearney, Jeremy Leresteux>

    Visitable link: www.prana-deutschland.de , for any inquiries contact at contact@prana-deutschland.de

    This file is part of Prana-deutschland.

    Prana-deutschland is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Prana-deutschland is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Prana-deutschland.  If not, see <http://www.gnu.org/licenses/>.
*/
error_reporting(E_ALL);

function send($query_)
{
    return sql_query_($query_);
}

function send_custom($query_, $dbname)
{
    return sql_query_custom($query_, $dbname);
}

function send_system_protected($type, $query, $token)
{
    //d
}

function sql_get($table, $conditions)
{
    return send("SELECT * FROM ".$table." WHERE ".$conditions.";--");
}

function sql_get_custom($table, $conditions, $dbname)
{
    return send("SELECT * FROM ".$table." WHERE ".$conditions.";--", $dbname);
}

function sql_get_system_protected($type, $table, $conditions, $token)
{
    return send_system_protected($type, 'SELECT * FROM '.$table.' WHERE '.$conditions.";--", $token);
}

function sql_update($table, $conditions, $values)
{
    return send("UPDATE ".$table." SET ".$values." WHERE ".$conditions);
}

function sql_get_all($table)
{
    //Takes: string
    return send("SELECT * FROM ".$table.";--");
}

function sql_get_all_custom($table, $dbname)
{
    //Takes: string
    return send_custom("SELECT * FROM ".$table.";--", $dbname);
}

function sql_set($table, $values)
{
	//Takes: string, string

    return send("INSERT INTO ".$table." VALUES(".$values.");--");
}

function sql_multi_set($table, $format, $values)
{
    return send("INSERT INTO ".$table." (".$format.") VALUES ".$values.";--");
}

function sql_join_equal($table1, $table2, $tmp_name1, $tmp_name2, $column1, $column2, $selectable_column1, $selectable_column2)
{
    echo("console.log(\'SELECT ".$tmp_name2.".".$column1." , ".$tmp_name1.".".$selectable_column1." FROM ".$table1." ".$tmp_name2.", ".$table2." ".$tmp_name1." WHERE ".$tmp_name2.".".$column1." = ".$tmp_name1.".".$column2.";--\');");

    return send("SELECT ".$tmp_name2.".".$column1." , ".$tmp_name1.".".$selectable_column1." FROM ".$table1." ".$tmp_name2.", ".$table2." ".$tmp_name1." WHERE ".$tmp_name2.".".$column1." = ".$tmp_name1.".".$column2.";--");
}

function sql_soft_delete($table, $conditions, $status_column)
{
  return send("UPDATE ".$table." SET ".$status_column." WHERE ".$conditions.";--");
}

//NO! USE SOFT DELETE INSTEAD
function sql_delete_DEPRECATED($table, $conditions)
{
    return send("DELETE FROM ".$table." WHERE ".$conditions.";--");
}

function sql_max($table, $column)
{
    return send("SELECT MAX(".$column.") AS maximum_v FROM ".$table);
}

function add_columns($table, $columns)
{
    send("INSERT INTO ".$table." ADD ".$columns);
    return;
}

function sql_check_exists($table, $query)
{
    if(return_first_row(sql_get($table, $query)) == null)
    {
        return 0;
    }
    else
    {
        return 1;
    }
}

function create_table($table, $columns)
{
    send("CREATE TABLE ".$table." (".$columns.")");
}

function sql_norows($sql_result)
{
    if(mysqli_num_rows($sql_result) == 0 || mysqli_num_rows($sql_result) == false)
    {
        return true;
    }
    return false;
}

function return_first_row($sql_result)
{
    if(mysqli_num_rows($sql_result) == 1)
    {
        while($row = $sql_result->fetch_assoc())
        {
            return $row;
        }
    }
    else if(mysqli_num_rows($sql_result) == 0 || mysqli_num_rows($sql_result) == false)
    {
        echo("console.log('SERVER ERROR: zero rows returned from database');");
        return null;
    }
    else
    {
        echo("console.log('SERVER ERROR: more rows returned from database');");
        return null;
    }
}

//Previously known as query_();
function sql_query_($quer)
{
	global $sqlconnect;
	$link = $sqlconnect->sql_connect();
    $result = $link->query($quer) or die("Sql query failed");
    $link->close();
    return $result;
}

//Previously known as query_();
function sql_query_custom($quer, $dbname)
{
	//Takes: string

    //NEVER SET ROOT AS THE MAIN USER! REMEMBER TO SET PERMISSIONS ACCORDINGLY
    $hostname = '127.0.0.1';
    $username = 'root';
    $password = '';
    $link = new mysqli($hostname, $username, $password, $dbname)
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

function sql_module_test()
{
    echo("console.log('SQL: ok.');");
}
?>
