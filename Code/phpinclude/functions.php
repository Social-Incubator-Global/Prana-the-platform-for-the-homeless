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

global $lang_English; $lang_English = array();
global $lang_German; $lang_German = array();
global $languages; $languages = array();
global $username; global $session;
global $authentication;

//USER FUNCTIONS -------->
function login($elements)
{

}

function json()
{
    echo("JSON!!!");
}

function signup($elements)
{

}

function hash_($password)
{

}
//USER FUNCTIONS END --------<

//JSON -------->

//JSON END --------<

function cut_variables($string_)
{

}

function load_organizations()
{
$lang_result = query_("SELECT * FROM Organizations");
while($row = $lang_result->fetch_assoc())
{
   echo('<script>def_organizations.push("'.$row["name"].'")</script>');
}
mysqli_free_result($lang_result);
}

function get_languages()
{
    global $languages;
    $lang_result = query_("SELECT * FROM Langs");
    while($row = $lang_result->fetch_assoc())
    {
        echo('<script>def_langs.push("'.$row["text"].'")</script>');
        echo('<script>def_langs_gmaps.push("'.$row["gmaps_lang"].'")</script>');
        echo('<script>def_langs_gmaps_reg.push("'.$row["gmaps_reg"].'")</script>');
        array_push($languages, $row["name"]);
    }
    mysqli_free_result($lang_result);
}

function load_languages_ToArrays($page)
{
global $lang_English;
global $lang_German;
global $languages;

foreach($languages as $lang)
{
$lang_result = query_("SELECT * FROM Lang_".$lang." ORDER BY id ASC");
while($row = $lang_result->fetch_assoc())
{
   if($lang == "English")
   {
      array_push($lang_English, $row["word"]);
   }
   else if($lang == "Deutsch")
   {
      array_push($lang_German, $row["word"]);
   }
}
mysqli_free_result($lang_result);
}
}

function apply_language($name)
{
   global $lang_English;
   global $lang_German;

   if($name == 0)
   {
      echo('<script>def_lang = [];</script>');
      foreach($lang_English as $word)
      {
          echo("<script>def_lang.push(\"" . $word . "\");</script>");
      }
   }
   else if($name == 1)
   {
      echo('<script>def_lang = [];</script>');
      foreach($lang_German as $word)
      {
          echo("<script>def_lang.push(\"" . $word . "\");</script>");
      }
   }
}
?>
