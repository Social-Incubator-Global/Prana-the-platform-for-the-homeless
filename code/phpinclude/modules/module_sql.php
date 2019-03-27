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
    //Type as 0 = System
    //Type as 1 = Protected

    if(token_verify($token))
    {
        return sql_query_system_protected($query, $type);
    }
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
        echo("<script>console.log('SERVER ERROR: zero rows returned from database');</script>");
        return null;
    }
    else
    {
        echo("<script>console.log('SERVER ERROR: more rows returned from database');</script>");
        return null;
    }
}

//Previously known as query_();
function sql_query_($quer)
{
	//Takes: string

    //NEVER SET ROOT AS THE MAIN USER! REMEMBER TO SET PERMISSIONS ACCORDINGLY
    $hostname = 'localhost';
    $username = 'cleanery';
    $password = 'using System.cleanery;';
    $dbname = 'cleanery';
    $link = new mysqli($hostname, $username, $password, $dbname)
        or die("MYSQL: Unable to connect to the specific host.\n[END]\n".mysql_error());
    $link->set_charset('utf8_swedish_ci');
    if ($link->connect_errno)
    {
      echo "Failed to connect to DB: " . $link->connect_errno;
    } //else { print 'connected'; }
    $result = $link->query($quer) or die("".$link->error.' Woah! An error occured: '.$quer);
    $link->close();
    return $result;
}

function sql_query_system_protected($quer, $type)
{
	//Takes: string

    //NEVER SET ROOT AS THE MAIN USER! REMEMBER TO SET PERMISSIONS ACCORDINGLY
    $hostname = 'localhost';
    $username = 'cleanery';
    $password = 'using System.cleanery;';

    if($type == 0)
    {
        $dbname = 'cleanery_system';
    }
    else
    {
        $dbname = 'cleanery_protected';
    }
    $link = new mysqli($hostname, $username, $password, $dbname)
        or die("MYSQL: Unable to connect to the specific host.\n[END]\n".mysql_error());
    $link->set_charset('utf8_swedish_ci');
    if ($link->connect_errno)
    {
      echo "Failed to connect to DB: " . $link->connect_errno;
    } //else { print 'connected'; }
    $result = $link->query($quer) or die("".$link->error.' Woah! An error occured: '.$quer);
    $link->close();
    return $result;
}

//Previously known as query_();
function sql_query_custom($quer, $dbname)
{
	//Takes: string

    //NEVER SET ROOT AS THE MAIN USER! REMEMBER TO SET PERMISSIONS ACCORDINGLY
    $hostname = 'localhost';
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
    echo("<script>console.log('SQL: ok.');</script>");
}


//OLD TRASH -->

/*function build_query_string($URLfilter_result, $Type_)
{
    $query = "";
    if($Type_ == "content")
    {
        if($URLfilter_result[1] == 0 || $URLfilter_result[1] == undefined || $URLfilter_result[1] == null)
        {
            $query="SELECT * FROM Contnt_".$URLfilter_result[0]." WHERE category='" . $URLfilter_result[0] . "' AND paid_type='" . $URLfilter_result[2] . "'";
        }
    else
    {
        $query="SELECT * FROM Contnt_".$URLfilter_result[0]." WHERE area='" . $URLfilter_result[1] . "' AND category='" . $URLfilter_result[0] . "' AND paid_type='" . $URLfilter_result[2] . "'";
    }
    //STANDARDIZE ALL FILTERS HERE!!!!
    if($URLfilter_result[0] == "housing" || $URLfilter_result[0] == "medical" || $URLfilter_result[0] == "food")
    {
        //VT
        if($URLfilter_result[3] != '--' && $URLfilter_result[3] != '')
        {
            $query = $query . " AND is_ LIKE '%" . $URLfilter_result[3] . "%'";
        }
        //VA
        if($URLfilter_result[4] != '--' && $URLfilter_result[4] != '')
        {
            $query = $query . " AND allows LIKE '%" . $URLfilter_result[4] . "%'";
        }
        //ORG
        if($URLfilter_result[6] != 0)
        {
            $query = $query . " AND organization='". $URLfilter_result[6] ."'";
        }
    }
    //Housing end
    }
    //CONTENT END--------------<
    if($Type_ == "posting")
    {
        $query = "SELECT * FROM Contnt_" . $URLfilter_result[1] . " WHERE id='" . $URLfilter_result[0] . "'";
    }
    if($Type_ == "profile")
    {
        $query = "SELECT * FROM People WHERE id='".$URLfilter_result[4]."'";
    }

    //DEPRECIATED
    //SEARCH BASED QUERIES
    if($Type_ == "search")
    {
        if($URLfilter_result[2] == 0)
        {

        }
        else if($URLfilter_result[2] == 1)
        {
            //FOOD
            $query = "SELECT * FROM Contnt_food WHERE name LIKE '%".$URLfilter_result[1]."%' OR fee LIKE '%".$URLfilter_result[1]."%' OR text1 LIKE '%".$URLfilter_result[1]."%' OR text2 LIKE '%".$URLfilter_result[1]."' OR link LIKE '%".$URLfilter_result[1]."%' OR is_ LIKE '%".$URLfilter_result[1]."%' OR allows LIKE '%".$URLfilter_result[1]."%'";;
        }
        else if($URLfilter_result[2] == 2)
        {
            //HOUSING
            $query = "SELECT * FROM Contnt_housing WHERE name LIKE '%".$URLfilter_result[1]."%' OR fee LIKE '%".$URLfilter_result[1]."%' OR text1 LIKE '%".$URLfilter_result[1]."%' OR text2 LIKE '%".$URLfilter_result[1]."' OR link LIKE '%".$URLfilter_result[1]."%' OR is_ LIKE '%".$URLfilter_result[1]."%' OR allows LIKE '%".$URLfilter_result[1]."%'";
        }
        else if($URLfilter_result[2] == 2)
        {
            //MEDICAL
            $query = "SELECT * FROM Contnt_housing WHERE name LIKE '%".$URLfilter_result[1]."%' OR fee LIKE '%".$URLfilter_result[1]."%' OR text1 LIKE '%".$URLfilter_result[1]."%' OR text2 LIKE '%".$URLfilter_result[1]."' OR link LIKE '%".$URLfilter_result[1]."%' OR is_ LIKE '%".$URLfilter_result[1]."%' OR allows LIKE '%".$URLfilter_result[1]."%'";
        }
    }
    return $query;
}

function build_query_string_search($URLfilter_result, $FromTable)
{
    $query = "";
    $query = "SELECT * FROM Contnt_".$FromTable." WHERE name LIKE '%".$URLfilter_result[1]."%' OR fee LIKE '%".$URLfilter_result[1]."%' OR text1 LIKE '%".$URLfilter_result[1]."%' OR text2 LIKE '%".$URLfilter_result[1]."' OR link LIKE '%".$URLfilter_result[1]."%' OR is_ LIKE '%".$URLfilter_result[1]."%' OR allows LIKE '%".$URLfilter_result[1]."%'";
    return $query;
}*/
?>