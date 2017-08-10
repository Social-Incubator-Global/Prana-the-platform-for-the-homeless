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
error_reporting(0);
function check_exists($sql)
{
    if(mysqli_num_rows(query_($sql))>0)
    {
        return true;
    }
    else{ return false; }
}

function get_id()
{
    return $_GET['id'];
}

function get_home_type()
{
return $_GET['home_type'];
}

function get_posting_id()
{
    return $_GET['id'];
}

function get_lang()
{
    return $_GET['lang'];
}

function get_location()
{
    return $_GET['location'];
}

function get_session()
{
    return $_GET['session'];
}

function get_user()
{
    return $_GET['user'];
}

function get_filters_URL_posting()
{
$result_ = [];
$result[0] = $_GET['lang'];
$result[1] = $_GET['id'];
return $result;
}

function get_filters_URL_parsed($parse_from)
{
  $query = parse_url($str, PHP_URL_QUERY); // Get the string part after the "?"
  parse_str($query, $params); // Parse the string. This is the SAME mechanism how php uses to parse $_GET.
  print $params['id'];
}

function get_filters_URL($type)
{
$result[0] = $_GET['home_type'];
$result[1] = $_GET['area'];
$result[2] = $_GET['paid_type'];
if($type != "basic")
{
if($type=="housing" || $type=="food" || $type=="medical")
{
$result[3] = $_GET['vt'];
$result[4] = $_GET['va'];
$result[5] = $_GET['lang'];
$result[6] = $_GET['organization'];
$result[7] = $_GET['to'];
$result[8] = $_GET['tc'];
$result[9] = $_GET['dy'];
$result[10] = $_GET['mo'];
}
else if($type=="home")
{
$result[0] = $_GET['lang'];
}
else if($type == "posting")
{
$result[0] = $_GET['id'];
$result[1] = $_GET['home_type'];
$result[2] = $_GET['lang'];
$result[3] = $_GET['organization'];
}
else if($type == "profile")
{
$result[0] = $_GET['id'];
$result[1] = $_GET['home_type'];
$result[2] = $_GET['lang'];
$result[3] = $_GET['organization'];
$result[4] = $_GET['id'];
}
}
else
{
$result[3] = $_GET['lang'];
$result[4] = $_GET['organization'];
$result[5] = $_GET['to'];
$result[6] = $_GET['tc'];
$result[7] = $_GET['dy'];
$result[8] = $_GET['mo'];
}
return $result;
}

function create_user($id, $uname)
{
    //Creates all necessary tables for the user $uname    
}

function load_profile($Type_)
{
  if($Type_ == "person")
  {
    $URLfilter_result = get_filters_URL("profile");
    $query = build_query_string($URLfilter_result, "profile");
    $result = query_($query);
    while($row = $result->fetch_assoc())
    {
        echo("<script>document.title='Prana : ".$row[id]."'</script>");
        echo("<div id='top_area'><br><br><div id='pic_'>@pic</div><br><div id='uname_'>@".$row["id"]."</div><br><br><br><br><div id='type_'>".$row["homelessorvolunteer"]."</div></div><br><br><div id='buttons_top'><form><input id='edit_' type='button' value='Edit profile' onclick='javascript:redirect(\"logout\");'/> <input id='delete_' type='button' value='Delete profile'/></form></div><br></div><br><br><div id='main_area'><br><br><br<div id='prjs_'><div id='title_projects'>My projects:</div><br><div id='description_projects' style='width: 90%;'>As a homeless person/volunteer you may start projects regarding a topic that interests you for the homeless of your city. These will be listed in the projects section of the website. (<a href='' style='color:rgb(9, 103, 126);'>Read more on how to create projects</a>).</div><br><br><div id='control_projects'><form><input id='create_project' type='button' value='+ Start a new project!' style='margin-left:1%;'/></form></div><br><div id='my_projects'></div></div><br><br><br><br><div id='title_about'>My bookmarked postings: </div><br><div id='bookmarks__'></div></div>");
        
        //fetch all home_type's
        $result_homes = query_("SELECT * FROM Contnt_categories");
        while($row3 = $result_homes->fetch_assoc())
        {
            echo("<script>get_item('bookmarks__').innerHTML+='<div id=\"bookmarks_area_".$row3["name"]."\" style=\"width:100%; margin-top:2%;\">".$row3["text"].":<br><br>'</script>");
            $result2 = query_("SELECT * FROM User_Bookmarks WHERE user='".$URLfilter_result[0]."' AND home_type='".$row3["name"]."'");
            while($row2 = $result2->fetch_assoc())
            {
                $result4 = query_("SELECT * FROM Contnt_".$row3["name"]." WHERE id=".$row2["post_id"]);
                while($row4 = $result4->fetch_assoc())
                {
                    $result_5 = query_("SELECT * FROM Organizations_Venues WHERE organization=".$row4["organization"]." AND id=".$row4["organization_venue_address"]);                    while($row5 = $result_5->fetch_assoc())
                    {
                    echo("<script>get_item('bookmarks_area_".$row3["name"]."').innerHTML+='<div id=\"book_div_".$row2["post_id"]."\" style=\"height:150px; width:100%; background-color: rgb(220,220,220);\"><input id=\"bookmarkbtn_".$row2["post_id"]."\" style=\"height:30px; width:71.6%; text-align:left; float:left;\" onclick=\"javascript: redirect(\'posting\', ".$row2["post_id"].");\" type=\"button\" value=\"".$row4["name"]."\"><input id=\"bookmark_remove\" type=\"button\" style=\"height:30px; float:right; background-color:red;\" onclick=\"javascript:redirect_ajax(1,1);\" value=\"Delete Bookmark\"><br><img src=\"".$row5["image_path"]."\" style=\"width:150px; height:120px;\"/><div id=\"text_\" style=\"float: right;margin-top: 8px;margin-right: 10px;height: 105px;overflow-y:auto;width: 240px; word-wrap:break-word\">".$row4["text1"]."</div></div><br><br>';</script>");
                    }
                }
            }
            echo("<script>get_item('bookmarks__').innerHTML+='</div>'</script>");
        }
    }
  }
}

function load_posting()
{
    $URLfilter_result = get_filters_URL("posting");
    $query = build_query_string($URLfilter_result, "posting");
    $result = query_($query);
    $echo_ = "";
    $echo_2 = "";
    $echo_2_2 = "";
    $echo_2_3 = "";
    $echo_3 = "";
    $echo_4 = "";
    $echo_5 = "";
    $organization = "";
    
    $ndx = 0; $id=-1;
    while($row = $result->fetch_assoc())
    {
       $id=$row["id"];
       if($ndx>0)
       {break;}
       
       $echo_="<script>refresh_localstorage(); document.getElementById('general_content').innerHTML += '<input id=\"bookmark_".$row["id"]."\" value=\"Bookmark\" type=\"image\" src=\"../Assets/Images/prn_ico/Bookmark.png\" onclick=\"javascript: redirect_ajax(1, ".$row["id"].", \'bookmark_".$row["id"]."\');\" style=\"float: left; width:30px; height: 30px; margin-left: 1%; margin-right: 1%;\"/> <div id=\'title_posting_content\'>".$row["name"]." (by: ".$row["organization"].")</div><div id=\'planroute_posting_content\'>' + dl_r(54) +': </div><br>';document.title='Prana : ".$row["name"]."';</script>";
       
    $result5=query_("SELECT * FROM Organizations WHERE id='" . $row["organization"]."'");
        while($row5 = $result5->fetch_assoc())
        {
           $organization=$row5["name"];
           $echo_5="<script>document.getElementById('title_posting_content').innerHTML='".$row["name"]." (".$row5["name"].")';</script>";
        }       
       $result2=query_("SELECT * FROM Organizations_Venues WHERE organization='" . $row["organization"] . "' AND id='" . $row["organization_venue_address"] . "'");
        while($row2 = $result2->fetch_assoc())
        {
       $echo_2="<div id='description_posting_content'>".$row["text2"]."<br><br><div id='contact_posting_info'><script>dl(55);</script>: ".$row["fee"]."<br><br><script>dl(56);</script>: <a href='' style='color:rgb(9, 103, 126);'>".$organization."</a><br><script>dl(57);</script>: ".$row2["Contact_person"]."<br><script>dl(52);</script>: ".$row2["venue"]."<br><script>dl(58);</script>: ".$row2["tel"]."<br><script>dl(59);</script>: ".$row2["fax"]."<br><script>dl(51);</script>: <a href='mailto:".$row2["email"]."' style='color:rgb(9, 103, 126);'>".$row2["email"]."</a><br><script>dl(60);</script>: <a target='_blank' href='".$row2["website"]."' style='color:rgb(9, 103, 126);'>".$row2["website"]."</a></div><br><br><div id='times_title'>Timings:</div><br><div id='months_'></div><br><div id='timings_'></div><br><br><div id='filters_posting_info'><div id='filters_title'><script>dl(64);</script></div></div></div><script>var days__ = '".$row2["days_open"]."'; var al= cut_variables(days__); var res=build_day_string(al); document.getElementById('opening_txt').innerHTML = '<div id=\'months_title_txt\'>'+dl_r(65)+': '+res+'</div>'+dl_r(66)+': ".$row2["houropening"]." -  ".$row2["hourclosing"]."<br>'+dl_r(63)+': ".$row2["Open_month_from"]." - ".$row2["Open_month_to"]."';</script>";
       
    //INSERT TIMINGS FROM TIMINGS TABLE
    $echo_2_2="<script>var tims_div=get_item('timings_'); tims_div.innerHTML='";
$result6=query_("SELECT * FROM Organizations_Venues_Times WHERE organization='" . $row["organization"]."' AND organization_venue='".$row["organization_venue_address"]."'");
        while($row6 = $result6->fetch_assoc())
        {
            if($row6["monday"]=="1")
            {
            $echo_2_2=$echo_2_2."'+dl_r(83)+': ".$row6["monday_time_start"]."-".$row6["monday_time_stop"]."<br>";
            }
            else if($row6["monday"]==NULL)
            {
                $echo_2_2=$echo_2_2."'+dl_r(83)+': '+dl_r(91)+'<br>";
            }
            else{ $echo_2_2=$echo_2_2."'+dl_r(83)+': '+dl_r(90)+'<br>"; }
            
            if($row6["tuesday"]=="1")
            {
                $echo_2_2=$echo_2_2."'+dl_r(84)+': ".$row6["tuesday_time_start"]."-".$row6["tuesday_time_stop"]."<br>";
            }
            else if($row6["tuesday"]==NULL)
            {
                $echo_2_2=$echo_2_2."'+dl_r(84)+': '+dl_r(91)+'<br>";
            }
            else{ $echo_2_2=$echo_2_2."'+dl_r(84)+': '+dl_r(90)+'<br>"; }
            
            if($row6["wednesday"]=="1")
            {
                $echo_2_2=$echo_2_2."'+dl_r(85)+': ".$row6["wednesday_time_start"]."-".$row6["wednesday_time_stop"]."<br>";
            }
            else if($row6["wednesday"]==NULL)
            {
                $echo_2_2=$echo_2_2."'+dl_r(85)+': '+dl_r(91)+'<br>";
            }
            else{ $echo_2_2=$echo_2_2."'+dl_r(85)+': '+dl_r(90)+'<br>"; }
            
            if($row6["thursday"]=="1")
            {
                $echo_2_2=$echo_2_2."'+dl_r(86)+': ".$row6["thursday_time_start"]."-".$row6["thursday_time_stop"]."<br>";
            }
            else if($row6["thursday"]==NULL)
            {
                $echo_2_2=$echo_2_2."'+dl_r(86)+': '+dl_r(91)+'<br>";
            }
            else{ $echo_2_2=$echo_2_2."'+dl_r(86)+': '+dl_r(90)+'<br>"; }
            
            if($row6["friday"]=="1")
            {
                $echo_2_2=$echo_2_2."'+dl_r(87)+': ".$row6["friday_time_start"]."-".$row6["friday_time_stop"]."<br>";
            }
            else if($row6["friday"]==NULL)
            {
                $echo_2_2=$echo_2_2."'+dl_r(87)+': '+dl_r(91)+'<br>";
            }
            else{ $echo_2_2=$echo_2_2."'+dl_r(87)+': '+dl_r(90)+'<br>"; }
            
            if($row6["saturday"]=="1")
            {
                $echo_2_2=$echo_2_2."'+dl_r(88)+': ".$row6["saturday_time_start"]."-".$row6["saturday_time_stop"]."<br>";
            }
            else if($row6["saturday"]==NULL)
            {
                $echo_2_2=$echo_2_2."'+dl_r(88)+': '+dl_r(91)+'<br>";
            }
            else{ $echo_2_2=$echo_2_2."'+dl_r(88)+': '+dl_r(90)+'<br>"; }
            
            if($row6["sunday"]=="1")
            {
                $echo_2_2=$echo_2_2."'+dl_r(89)+': ".$row6["sunday_time_start"]."-".$row6["sunday_time_stop"]."<br>";
            }
            else if($row6["sunday"]==NULL)
            {
                $echo_2_2=$echo_2_2."'+dl_r(89)+': '+dl_r(91)+'<br>";
            }
            else{ $echo_2_2=$echo_2_2."'+dl_r(89)+': '+dl_r(90)+'<br>"; }
        }
        $echo_2_2=$echo_2_2."';</script>";
        
       //INSERT MONTHS FROM MONTHS TABLE
       $echo_2_3="<script>var mnths_div=get_item('months_'); mnths_div.innerHTML=dl_r(63)+': ";
       $result7=query_("SELECT * FROM Organizations_Venues_Months WHERE organization='" . $row["organization"]."' AND organization_venue='".$row["organization_venue_address"]."'");
        while($row7 = $result7->fetch_assoc())
        {
            if($row7["january"] == "1")
            {
                $echo_2_3=$echo_2_3."'+dl_r(92)+'";
            }
            if($row7["febuary"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(93)+'";
            }
            if($row7["march"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(94)+'";
            }
            if($row7["april"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(95)+'";
            }
            if($row7["may"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(96)+'";
            }
            if($row7["june"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(97)+'";
            }
            if($row7["july"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(98)+'";
            }
            if($row7["august"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(99)+'";
            }
            if($row7["september"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(100)+'";
            }
            if($row7["october"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(101)+'";
            }
            if($row7["november"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(102)+'";
            }
            if($row7["december"] == "1")
            {
                $echo_2_3=$echo_2_3.", '+dl_r(103)+'";
            }
        }
        $echo_2_3=$echo_2_3."';</script>";
        
        //PLAN ROUTE
       $echo_3="<div id='mobility_posting_info'><div id='gettingthere_posting'><form><input type='button' id='to_bttn' value='To' style='height: 30px; width:12%; background-color: rgb(255, 127, 36);'></input><input id='end' readonly type='text' value='".$row2["venue"]."' style='height:30px; width:287px;'></input><br><br><input id='button_google_go_car' type='button' onclick='javascript:localStorage.setItem(\"transit_preference\", \"DRIVING\"); refresh_localstorage(); change_transit_type(\"DRIVING\");  refresh_map();' value='Car'><input id='button_google_go_walking' type='button' onclick='javascript: localStorage.setItem(\"transit_preference\", \"WALKING\"); refresh_localstorage(); change_transit_type(\"WALKING\"); refresh_map();' value='Walking'><input id='button_google_go_bike' type='button' onclick='javascript: localStorage.setItem(\"transit_preference\", \"BICYCLING\"); refresh_localstorage(); change_transit_type(\"BICYCLING\"); refresh_map();' value='Bike'><input id='button_google_go_public' type='button' onclick='javascript: localStorage.setItem(\"transit_preference\", \"TRANSIT\"); refresh_localstorage(); change_transit_type(\"TRANSIT\"); refresh_map();' value='Public transport'></input></form></div><br><div id='mobility_pref'><br><form><input id='button_google_go_bus' type='radio' onclick='javascript:localStorage.setItem(\"transit_liking\", \"BUS\"); refresh_localstorage(); change_transit_liking(\"BUS\"); refresh_map();' value='Bus'><label id='l_bus' onclick='javascript:localStorage.setItem(\"transit_liking\", \"BUS\"); refresh_localstorage(); change_transit_liking(\"BUS\"); refresh_map();' style='float:left;'>Bus</label></input><input id='button_google_go_subway' type='radio' onclick='javascript: localStorage.setItem(\"transit_liking\", \"SUBWAY\"); change_transit_liking(\"SUBWAY\"); refresh_localstorage(); refresh_map();'><label id='l_subway' onclick='javascript: localStorage.setItem(\"transit_liking\", \"SUBWAY\"); change_transit_liking(\"SUBWAY\"); refresh_localstorage(); refresh_map();' style='float:left;'>U-bahn</label><input id='button_google_go_train' type='radio' onclick='javascript: localStorage.setItem(\"transit_liking\", \"TRAIN\");change_transit_liking(\"TRAIN\"); refresh_localstorage(); refresh_map();' value='Train'><label id='l_train' onclick='javascript: localStorage.setItem(\"transit_liking\", \"TRAIN\");change_transit_liking(\"TRAIN\"); refresh_localstorage(); refresh_map();' value='Train' style='float:left;'>Train</label><input id='button_google_go_tram' type='radio' onclick='javascript: localStorage.setItem(\"transit_liking\", \"TRAM\");change_transit_liking(\"TRAM\"); refresh_localstorage(); refresh_map();' value='Tram'><label id='l_tram' onclick='javascript: localStorage.setItem(\"transit_liking\", \"TRAM\");change_transit_liking(\"TRAM\"); refresh_localstorage(); refresh_map();' style='float:left;'>Tram</label><br><br><input id='opn_gmp_' type='button' style='height:30px;' value='Open in Google maps'><input id='nr_' type='button' onclick='javascript:refresh_map();' style='float:left; height:30px;' value='New route'></input><input id='pr_' type='button' style='height:30px;' value='Print directions'><br></form></div><br><div id='directions_posting_content'><script>dl(78);</script><br><div id='directions_gmaps'></div></div><div id='ratings_comments'></div></div><script>document.getElementById('to_bttn').value=dl_r(67);document.getElementById('button_google_go_car').value=dl_r(68);document.getElementById('button_google_go_walking').value=dl_r(69);document.getElementById('button_google_go_bike').value=dl_r(70);document.getElementById('button_google_go_public').value=dl_r(71);document.getElementById('l_bus').innerHTML=dl_r(72);document.getElementById('l_subway').innerHTML=dl_r(73);document.getElementById('l_train').innerHTML=dl_r(74);document.getElementById('l_tram').innerHTML=dl_r(75);document.getElementById('nr_').value=dl_r(76);document.getElementById('pr_').value=dl_r(77);document.getElementById('opn_gmp_').value=dl_r(107);</script>";
       }
       
       $query3 = "SELECT * FROM Organizations_Venues_Categories WHERE owner='" . $row["category"] . "' ORDER BY id ASC";
    $result3 = query_($query3);
    
    $echo_4 = "<div id='filters_filters_info'><script>document.getElementById('filters_posting_info').innerHTML += '<br><div id=\"is_txt\"></div><div id=\"allows_txt\"></div>';</script>";
    
    $echo_4 = $echo_4."<script>document.getElementById('is_txt').innerHTML=dl_r(105)+': ' + '".$row[is_]."';document.getElementById('allows_txt').innerHTML=dl_r(106)+': ' + '".$row[allows]."';</script></div>";
    }
    echo($echo_);
    echo($echo_2);
    echo($echo_2_2);
    echo($echo_2_3);
    echo($echo_3);
    echo($echo_4);
    echo($echo_5);
    
    return $id;
}

function load_ratings_comments($post_id)
{
    //place a div called 'ratings' in your page. this function will load to that.
    echo("<script>get_item('ratings_comments').innerHTML = '<div id=\"title_ratings_comments\">Ratings:</div>';</script>");
    
    $result = query_("SELECT * FROM Ratings WHERE post_id=".$post_id);
    while($row = $result->fetch_assoc())
    {
        $result2 = query_("SELECT avg(rating) FROM ratings WHERE post_id=".$post_id);
        //while($row2 )
        echo("<script>get_item('ratings_comments').innerHTML += '/5'");
    }
}

//Universal bookmarking function
function set_remove_bookmark($posting_id, $home_type, $user, $lang)
{
    //Check if bookmark exists then insert or delete according to such.
    //Return: 1=Created a bookmark, 0=Deleted a bookmark
    if(!check_exists("SELECT * FROM User_Bookmarks WHERE user='".$user."' AND post_id='".$posting_id."' AND home_type='".$home_type."'"))
    {
        query_("INSERT INTO User_Bookmarks VALUES(NULL, '".$user."', ".$posting_id.", '".$home_type."')");
        return 1;
    }
    else
    {
        query_("DELETE FROM User_Bookmarks WHERE user='".$user."' AND post_id=".$posting_id." AND home_type='".$home_type."'");
        return 0;
    }
    //msqli_free_result($result);
}

function get_bookmark($user, $id)
{
    $echo = "";
    $result = query_("SELECT * FROM User_Bookmarks WHERE user='".$user."' AND post_id='".$id."'");
    while($row=$result->fetch_assoc())
    {
        $echo = "change_bookmark_content(get_item('bookmark_".$row["post_id"]."'),1);";
    }
    return $echo;
}

function get_bookmarks($representation, $home_type, $user)
{
    $echo = "";
    if($representation == "content")
    {
        $result = query_("SELECT * FROM User_Bookmarks WHERE user='".$user."' AND home_type='".$home_type."'");
    }
    
    while($row = $result->fetch_assoc())
    {
       $echo = $echo."change_bookmark_content(get_item('bookmark_".$row["post_id"]."'),1);";
    }
    return $echo;
}

function load_categories($home_type, $area)
{
    $query__ = "SELECT * FROM Organizations_Venues_Categories WHERE owner='" . $home_type . "' OR owner='all' OR owner='universal' AND allowis='is' ORDER BY id ASC";
    $result = query_($query__);
    $echo_ = ""; $echo_2 = ""; $echo_3 = "";
    
    while($row = $result->fetch_assoc())
    { 
        $echo_= $echo_ . "<script>refresh_localstorage(); document.getElementById('All_Categories_Boxes').innerHTML += '<form><div id=\'check_input_" .$row["id"]. "\' style=\'margin-top:0%;float:left;\'><label id=\'label_check_".$row["id"]."\' style=\'font-family:Arial,regular;font-size:16px;\'><input id=\'checkbox_cats_".$row["id"]."\' type=\'checkbox\' onclick=\'javascript:refresh_localstorage(); var ck = localStorage.getItem(\"".$row["variable"]."\"); if(ck==\"1\"){localStorage.setItem(\"".$row["variable"]."\",\"0\");}else{localStorage.setItem(\"".$row["variable"]."\",\"1\");} if(\"".$row["variable"]."\"==\"all\"){ var vk; if(ck==\"0\"){vk=\"0\"; localStorage.setItem(\"filters_housing_shelters\", vk);localStorage.setItem(\"filters_housing_hostels\", vk);localStorage.setItem(\"filters_housing_govt\", vk);localStorage.setItem(\"filters_housing_coldshelters\", vk);localStorage.setItem(\"filters_wo\", vk);localStorage.setItem(\"filters_mo\", vk);localStorage.setItem(\"filters_housing_childrenok\", vk);localStorage.setItem(\"filters_petsok\", vk);localStorage.setItem(\"filters_smoking\", vk);localStorage.setItem(\"filters_alcohol\", vk);} }else{localStorage.setItem(\"all\", \"0\");} redirect_ajax();//redirect(\"content\",\"".$home_type."\", \"".$area."\");\' name=\'categ_check\' value=\'". $row["text"] ."\' style=\'margin-right: 13px; margin-top:-4px; height:30px; margin-left: 0px; -webkit-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); -moz-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.0);\'></input>".$row["text"]."</label></div></form><br>';</script><script>var select = document.getElementById('type_of_venue'); select.options[select.options.length] = new Option('".$row["text"]."','".$row["text"]."');</script>";
        
        $echo_2 = $echo_2 . "<script>ck=localStorage.getItem('".$row["variable"]."'); if(ck=='1'){document.getElementById('checkbox_cats_".$row["id"]."').checked = true;}else{document.getElementById('checkbox_cats_".$row["id"]."').checked = false;}</script>";
    }
     
    $query__2 = "SELECT * FROM Organizations_Venues_Categories WHERE allowis='allows' AND owner='" . $home_type . "' AND owner='all' OR owner='universal' ORDER BY id ASC";
    $result2 = query_($query__2);    
    while($row2 = $result2->fetch_assoc())
    { 
       $echo_3 = $echo_3."<script>var select = document.getElementById('allows_of_venue'); select.options[select.options.length] = new Option('".$row2["text"]."','".$row2["text"]."');</script>"; 
    }
    
    echo($echo_);
    echo($echo_2);
    echo($echo_3);
    //msqli_free_result($result);
    return;
}

function get_allows_type_filter($home_type)
{
    $echo_3="var select = document.getElementById('allows_of_venue');";
    $echo_4="var select2 = document.getElementById('type_of_venue');";
    //Venue Allows
    $result2 = query_("SELECT * FROM Organizations_Venues_Categories WHERE allowis='allows' AND owner='" . $home_type . "' OR allowis='allows' AND owner='universal' ORDER BY id ASC");
    while($row2 = $result2->fetch_assoc())
    { 
       $echo_3 = $echo_3."select.options[select.options.length] = new Option('".$row2["text"]."','".$row2["text"]."');"; 
    }
    //Type of venue
    $result = query_("SELECT * FROM Organizations_Venues_Categories WHERE (allowis='is' AND owner='" . $home_type . "') OR (allowis='is' AND owner='universal') ORDER BY id ASC");
    while($row = $result->fetch_assoc())
    { 
       $echo_4 = $echo_4."select2.options[select2.options.length] = new Option('".$row["text"]."','".$row["text"]."');"; 
    }
    return $echo_3.$echo_4;
}

function load_content_boxes($query__)
{
    //FUCK THIS, WE WILL MAKE THIS WORK!!! SHIT CODE IS BETTER THAN NO CODE! FIX THIS LATER
    //ADD QUERY TO CHECK TYPE AND ALLOWS FROM organization_venue instead of contnt_housing... with an if else the root should be the org.
   $ht = get_home_type();
   $result = query_($query__);
   $result2 = null;
   $result3 = null;
   
   $dy_tme_ok = FALSE;
   $mo_ok = true;
   $anyresults = false;
   
   $echo_1 = "";
   $echo_2 = "";
   $query2 = "";
   $query3 = "";
   
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
   $dy_tme_ok = FALSE;
   $mo_ok = false;
        
   $filters_time = get_filters_URL("basic");
   if($filters_time[7] != 7)
   {
       if($filters_time[5] != 24 || $filters_time[6] != 24){
            $query2 = "SELECT * FROM Organizations_Venues_Times WHERE organization='".$row["organization"]."' AND organization_venue='".$row["organization_venue_address"]."' AND ".get_day($filters_time[7])."='1' AND ".get_day($filters_time[7])."_time_start <=".$filters_time[5]." AND ".get_day($filters_time[7])."_time_stop >=".$filters_time[6];
        $result2 = query_($query2);
            if ($result2->num_rows > 0) 
            {
            // output data of each row
                //echo($result2->num_rows );
               $dy_tme_ok = true;
            }
            }
            } else{ $dy_tme_ok=true; }
           
    mysqli_free_result($result2); 
    if($filters_time[8] != 12)
    {
        $result3 = query_("SELECT * FROM Organizations_Venues_Months WHERE organization='".$row["organization"]."' AND organization_venue='".$row["organization_venue_address"]."' AND ". get_month($filters_time[8])."='1'");
            if ($result3->num_rows > 0)
            {
                $mo_ok = true;
            }
            else{ $mo_ok = false; }
    }
    else{ $mo_ok=true; }
            
    mysqli_free_result($result3);
        
            if($dy_tme_ok == true && $mo_ok == true)
            { $anyresults = true;
                //echo("1,");
        $echo_1=$echo_1."<div style='animation-name: fade_in;animation-duration: 0.3s; margin-left: 3%; margin-top:3%; border-radius: 0px; float: left; color: rgb(9, 103, 126); background-color: rgba(230,230,230,1); width: 300px; height: 410px;' id='main_". $row["id"] ."'><a href=\"javascript:redirect('posting', '".$row["id"]."');\"><div id='content_box_header_". $row["id"] ."' style='font-family: \"Arial\", regular; color: white; font-size: 16px; background-color: rgb(9, 103, 126); width: 100%; height: 37px;'><div id='title_". $row["id"] ."' style='float: left; margin-left:2%; margin-top:4%;'>".$row["name"]. "</div></div><div id='content_box_image_". $row["id"] ."' style='float:left; width:100%; height: 140px; background-color:white;'><img src='../Assets/Images/def_none.png' id='img_". $row["id"] ."' style='float:left;' width=100%; height=100%;></div></a><!--<div id='detalis_box_'" . $row["id"] . " style='height: 20px; font-family: Arial, bold; float:left; margin-left:2%; margin-top: 4%;'><b><div id='info_txt_".$row["id"]."'></div></b><br></div>--><div id='info_org_venue'><div id='hours_".$row["id"]."' style='float:left; margin-left:0%; font-family:Arial,regular; font-size:14px;'></div><div id='tel_".$row["id"]."' style='float:left; margin-left:5%; font-family:Arial,regular; font-size:14px;'></div><br><div id='email_".$row["id"]."' style='float:left; margin-left:0%; margin-top:3%; font-family:Arial,regular; font-size:14px;'></div><div id='allows_".$row["id"]."' style='float:left; margin-left:0%; margin-top:3%; font-family:Arial,regular; font-size:14px; width:100%;'></div><div id='venue_".$row["id"]."' style='float:left; margin-left:0%; margin-top:3%; font-family:Arial,regular; font-size:14px; height:40px; width:100%;'></div></div><div id='goto_".$row["id"]."' style='float:left; text-align:right; margin-left:0%; margin-top:0%; font-family:Arial,regular; color:orange; font-size:16px; width:100%'><center><form style=\"width:130px; margin-top:-14px;\"><input type=\"button\" id=\"view_post_bttn_".$row["id"]."\" onclick=\"javascript:set_local('ID','".$row["id"]."'); redirect('posting', '".$row["id"]."');\" style=\"float: left; width:100px; height: 30px;\" value=\"View ".get_result_type_bttxt($ht)."\"></input></form><input id=\"bookmark_".$row["id"]."\" type=\"image\" src=\"../Assets/Images/prn_ico/Bookmark.png\" onclick=\"javascript: redirect_ajax(1, ".$row["id"].", 'bookmark_".$row["id"]."');\" style=\"float: left; width:30px; height: 30px;\"></input></center></div></div><script>document.getElementById('view_post_bttn_".$row["id"]."').value = dl_r(47);</script>";
        
        //$echo_2=$echo_2."<script>document.getElementById('info_txt_".$row["id"]."').innerHTML = dl_r(48);</script>";
        
        $result2=query_("SELECT * FROM Organizations_Venues WHERE organization='" . $row["organization"] . "' AND id='" . $row["organization_venue_address"] . "'");
        while($row2 = $result2->fetch_assoc())
        {
            if($row2["image_path"] != null && $row2["image_path"] != "")
            {
               $echo_2=$echo_2."<script>document.getElementById('img_". $row["id"] ."').src = '". $row2["image_path"] ."';</script>";
            }
            
            if($row2["houropening"] != null || $row["houropening"] !="" && $row2["hourclosing"] != null || $row["hourclosing"] !="")
            {
            $echo_2=$echo_2."<script>document.getElementById('hours_". $row["id"] ."').innerHTML = '<img src=\"../Assets/Images/prn_ico/led_icons/alarm.png\"/> ". $row2["houropening"] ."-". $row2["hourclosing"] . "';</script>";
            }
            else
            {
            $echo_2=$echo_2."<script>document.getElementById('hours_". $row["id"] ."').innerHTML = '<img src=\"../Assets/Images/prn_ico/led_icons/alarm.png\"/> - / -';</script>";
            }
            
            if($row2["tel"] != null && $row2["tel"] != "")
            {
               $echo_2=$echo_2."<script>document.getElementById('tel_". $row["id"] ."').innerHTML = '<img src=\"../Assets/Images/prn_ico/led_icons/telephone.png\"/> ". $row2["tel"] ."';</script>";
            }
            else
            {
               $echo_2=$echo_2."<script>document.getElementById('tel_". $row["id"] ."').innerHTML = '<img src=\"../Assets/Images/prn_ico/led_icons/telephone.png\"/> <a href=\"javascript:redirect(\'home\');\">Contact organization</a>';</script>";
            }
            
            if($row2["email"] != null && $row2["email"] != "")
            {
               $echo_2=$echo_2."<script>document.getElementById('email_". $row["id"] ."').innerHTML = '<img src=\"../Assets/Images/prn_ico/led_icons/email.png\"/> <a  style=\"color:rgb(9, 103, 126);\" href=\"mailto:".$row2["email"]."\">". $row2["email"] ."</a>';</script>";
            }
            else
            {
               $echo_2=$echo_2."<script>document.getElementById('email_". $row["id"] ."').innerHTML = '<img src=\"../Assets/Images/prn_ico/led_icons/email.png\"/> <a href=\"javascript:redirect(\'home\');\">Contact organization</a>';</script>";
            }
            
            //changes to use the icon system string must be cut down
            //figure out loops IN FUCKING PHP
            if($row2["venue"] != null && $row2["venue"] != "")
            {
                $echo_2=$echo_2."<script>document.getElementById('venue_". $row["id"] ."').innerHTML = '<img src=\"../Assets/Images/prn_ico/led_icons/marker.png\"/> <a target=\"_blank\" style=\"color:rgb(9, 103, 126);\" href=\"http://maps.google.com?q=".$row2["venue"]."\">". $row2["venue"] ."</a>';</script>";
            }
            else
            {
                $echo_2=$echo_2."<script>document.getElementById('venue_". $row["id"] ."').innerHTML =  '<img src=\"../Assets/Images/prn_ico/led_icons/marker.png\"/> - / -';</script>";
            }
            
            if($row2["allows"] != null && $row2["allows"] != "")
            {
                $echo_2=$echo_2."<script>document.getElementById('allows_". $row["id"] ."').innerHTML = '<img src=\"../Assets/Images/prn_ico/led_icons/accept.png\"/> ". $row2["allows"] ."';</script>";
            }
            else
            {
                $echo_2=$echo_2."<script>document.getElementById('allows_". $row["id"] ."').innerHTML =  '<img src=\"../Assets/Images/prn_ico/led_icons/accept.png\"/> Everyone';</script>";
            }
        }
    }
            }
            if($anyresults==false){$echo_1=$echo_1."<div id='no_results'><script></script></div>";}
    }
    else {
    $echo_1=$echo_1."<div id='no_results'><script></script></div>";
   }
    
   $echo_1 = $echo_1.$echo_2;
   echo($echo_1);
    //echo($echo_1);
    //echo($echo_2);
    
    mysqli_free_result($result);
}

function get_result_type_bttxt($ht)
{
   if($ht=="housing")
   { return "venue";}
   else if($ht=="food")
   { return "distributor"; }
   else{ return "posting"; }
}


//TESTING------------>
function test_me()
{
    return "TEST SUCCESSFUL";
}
//TESTING END--------<

//I WOULD HAVE LIKED TO GET IT BY SIMPLY USING AN ARRAY IN OBJECTS.PHP AND THEN DO A DIRECT INDEX INPUT FROM THE ARRAY, BUT PHP IS RETARDED SO I CREATED THIS DUMB FUNCTION ON THE SAME DAMN FUCKING FILE AS IT CANT EVEN EXECUTE THE FUNCTION ON ANOTHER FILE FUCK YOU PHP YOU FUCKING TWAT.
?>