<?php
/*
<Prana-deutschland. The platform for the homeless>
    Copyright (C) <2016-2017>  <Oscar Arjun Singh Tark, Emilie Caron, Robinson Choe and all underlying members of Prana-deutschland>
    <Original programmers: Oscar Arjun Singh Tark, Robinson Choe>

    Visatable link: www.prana-deutschland.de , for any inquiries contact at contact@prana-deutschland.de

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
function build_query_string($URLfilter_result, $Type_)
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

    //SEARCH BASED QUERIES
    if($Type_ == "search")
    {
        if($URLfilter_result[2] == 0)
        {

        }
        else if($URLfilter_result[2] == 1)
        {
            $query = "SELECT * FROM contnt_food";
        }
        else if($URLfilter_result[2] == 2)
        {
            $query = "SELECT * FROM contnt_housing WHERE name LIKE '%".$URLfilter_result[1]."%' OR fee LIKE '%".$URLfilter_result[1]."%' OR text1 LIKE '%".$URLfilter_result[1]."%' OR text2 LIKE '%".$URLfilter_result[1]."' OR link LIKE '%".$URLfilter_result[1]."%' OR is_ LIKE '%".$URLfilter_result[1]."%' OR allows LIKE '%".$URLfilter_result[1]."%'";
        }
    }
    return $query;
}

function query_($quer)
{
mysqli::set_charset('utf8_swedish_ci');
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'prana_db';
$link = mysqli_connect($hostname, $username, $password, $dbname) or die("MYSQL: Unable to connect to the specific host.\n[END]\n".mysql_error());
if (mysqli_connect_errno())
{
  echo "Failed to connect to MYDB: " . mysqli_connect_error();
}
$result = mysqli_query($link, $quer) or die("".mysql_error());
mysqli_close($link);
return $result;
}
?>
