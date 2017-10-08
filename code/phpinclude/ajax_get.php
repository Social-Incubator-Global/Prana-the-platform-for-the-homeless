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

function include_()
{
    //include('/home/otark/public_html/phpinclude/content_functions.php');
    include('./content_functions.php');
    include('./sql.php');
    include('./functions.php');
    include('./objects.php');
}

function replace_special_character($url_)
{
    return str_replace("<amp>", "&", $url_);
}

function get_objects($type_)
{
    if($type_ == "set_unset_bookmark")
    {
        return array(get_lang(), get_user(), get_session(), get_posting_id());
    }
    else if($type_ == "get_bookmarks_content")
    {
        return array(get_user(), get_session(), get_location());
    }
    else if($type_ == "get_bookmark_posting")
    {
        return array(get_user(), get_posting_id());
    }
    else if($type_ == "get_allows_type_filters")
    {
        return array(get_home_type());
    }
}

$r_t = $_GET['r_t'];
//$url = $_GET['url'];
$h_t = $_GET['h_t'];
//$url=replace_special_character($url);

if($r_t == "content")
{
 try
 {
    include_(/*Does not include all files everytime this file is included saving CPU power and bandwidth*/);
    load_content_boxes(build_query_string(get_filters_URL($h_t), $r_t));
 }
 catch(Exception $e){}
}
else if($r_t == "set_unset_bookmark")
{
    try
    {
        include_(/*Does not include all files everytime this file is included saving CPU power and bandwidth*/);
        $res_ = get_objects($r_t);
        if($res_[2]==1)
        {
            //$posting_id, $h_t, $user, $lang_
            echo(set_remove_bookmark($res_[3], $h_t, $res_[1], $res_[0]));
        }
        else if($res_[2]==0)
        {
            //Not logged in? redirect to login.
            echo("redirect('login');");
        }
    }
    catch (Exception $e){echo("console.log(".$e.");");}
}
else if($r_t == "get_bookmarks_content")
{
    try
    {
        include_(/*Does not include all files everytime this file is included saving CPU power and bandwidth*/);
        $res_ = get_objects($r_t);
        echo(get_bookmarks($res_[2], $h_t, $res_[0]));
    } catch (Exception $ex){echo("console.log(".$e.");");}
}
else if($r_t == "get_bookmark_posting")
{
    try
    {
        include_(/*Does not include all files everytime this file is included saving CPU power and bandwidth*/);
        $res_ = get_objects($r_t);
        echo(get_bookmark($res_[0], $res_[1]));
    } catch (Exception $ex){echo("console.log(".$e.");");}
}
else if($r_t == "get_allows_type_filters")
{
    try
    {
        include_();
        $res_ = get_objects($r_t);
        echo(get_allows_type_filter($res_[0]));
    }
    catch (Exception $ex){echo("console.log(".$e.");");}
}

function internal_test()
{
    return "TESTING SUCESSFUL";
}
?>
