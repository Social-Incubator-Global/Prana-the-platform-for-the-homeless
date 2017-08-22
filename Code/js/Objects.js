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

//Loads variables used throughout the website
function load_localstorage()
{
    if(get_local("session_vars_resume") != 1)
    {
        localStorage.setItem("session_vars_resume", 0);
        localStorage.setItem("session", 0);
        localStorage.setItem("uname", "");
        localStorage.setItem("ID", 0);
        localStorage.setItem("home_type", 0);
        localStorage.setItem("location_", "home");
        localStorage.setItem("sql_", "");
        localStorage.setItem("paid_type", 0);
        localStorage.setItem("view_type", 0);
        localStorage.setItem("area", 0);
        localStorage.setItem("organization", 0);
        localStorage.setItem("lang", 0);
        localStorage.setItem("map_size", "0");
        localStorage.setItem("transit_preference", "TRANSIT");
        localStorage.setItem("transit_liking", "SUBWAY");
        
        //GEOLOCATION
        localStorage.setItem("current_position_lat", null);
        localStorage.setItem("current_position_long", null);

        //all filters
        localStorage.setItem("all", 1);
        localStorage.setItem("to", 24);
        localStorage.setItem("tc", 24);
        localStorage.setItem("dy", 7);
        localStorage.setItem("mo", 12);

        //Default flexible filter variables
        localStorage.setItem("vt", "");
        localStorage.setItem("va", "");
    }
}

function send_AJAX(request_type, url, response_action, response_element)
{
    //file_to_send_request_to: what file to call?
    //url: built url from urlbuildeval().
    //function_to_call: what function to call?
    //response_action: what is the action of the response? Edit innerHTML? clear? create? redirect?
    //response_element: what is the response element to modify contents of?
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if(this.readyState === 4 && this.status === 200)
        {
            //itm created exclusively so that response InnerHTML .js can be executed
            var itm; var cont = false;
            var js_type; //0=execute innerHTML, 1=execute returned expression AKA "var resp" directly through "eval()".
            if(request_type==="content")
            {
                itm = get_item("All_Content_Boxes");
                itm.innerHTML=this.responseText;
                js_type = true;
                cont = true;
            }
            else if(request_type==="set_unset_bookmark")
            {
                //itm needs a value so we cannot put the function get_item directly into change_bookmark!
                itm = get_item(response_element);
                change_bookmark_content(itm, this.responseText);
                js_type = false;
            }
            else if(request_type==="get_bookmarks_content")
            {
                js_type = false;
            }
            else if(request_type==="get_bookmark_posting")
            {
                js_type = false;
            }
            else if(request_type==="get_allows_type_filters")
            {
                js_type = false;
            }
            
            //EXECUTE JS using eval(). Eval should be replaced later on with something better. "Eval is evil!!!"
            if(js_type)
            { 
                var x = itm.getElementsByTagName("script");
                for(var i=0;i<x.length;i++)
                {
                    eval(x[i].text);}
                }
            }
            else
            {
                try {
                eval(this.responseText);}catch(exp){}
            }
            
            if(cont)
            {
                if(request_type==="content")
                {
                    redirect_ajax(2);
                }
            }
    };
    xmlhttp.open("GET", "../phpinclude/ajax_get.php?r_t="+request_type+"&h_t="+get_local('home_type')+"&"+url.replace(/<amp>/g, '&'), true);
    xmlhttp.send();
}

function cut_variables(to_cut)
{
    to_cut=to_cut+'';
    var al = [];
    al=to_cut.split("");
    return al;
}

function build_day_string(al)
{
    var resultant_="";
    var ndx2=82; var ndx3=0;
    for(i=0; i<al.length;i++)
    {
        ndx3=to_integer(al[i]);
        ndx2=ndx2+ndx3;
        resultant_ = resultant_ + dl_r(ndx2) + ". ";
        ndx2=82;
    }
    return resultant_;
}

function to_integer(str_)
{
    return parseInt(str_);
}

function getLocation()
{
    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(setPosition);
    }   
    else
    {
        alert("Geolocation is not supported by this browser.");
    }
}

function setPosition(position) {
    set_local("current_position_lat", position.coords.latitude);
    set_local("current_position_long", position.coords.longitude);
}

function dl_d(value)
{
    document.write(value);
}

function dl_r(ndx)
{
    return def_lang[ndx];
}

function set_value(name, ndx)
{
    document.getElementById(name).value = dl_r(ndx);
}

function set_index(name, ndx)
{
    document.getElementById(name).selectedIndex = ndx;
}

function dl(ndx)
{
    document.write(def_lang[ndx]);
}

function get_hour()
{
    return new Date().getHours();
}

function get_item(name)
{
    refresh_localstorage();
    return document.getElementById(name);
}

function get_item_value(name)
{
    return document.getElementById(name).value;
}

function set_item_value(name, value_)
{
    document.getElementById(name).value=value_;
}

function remove_value(name)
{
    document.getElementById(name).value = "";
}

function set_local(name, value)
{
    localStorage.setItem(name, value);
    refresh_localstorage();
}

function get_local(name)
{
    return localStorage.getItem(name);
}

function get_selected_index(name)
{
    return get_item(name).selectedIndex;
}

function get_selected_item(name)
{
    return get_item(name)[get_item(name).selectedIndex].value;
}

function apply_language(index_)
{
    localStorage.setItem("lang", index_);
}

//OBSOLETE!!! USE get_local("name") INSTEAD!!!
function refresh_localstorage()
{
session = localStorage.getItem("session");
uname = localStorage.getItem("uname");
home_type = localStorage.getItem("home_type");
paid_type = localStorage.getItem("paid_type");
view_type = localStorage.getItem("view_type");
area = localStorage.getItem("area");
all = localStorage.getItem("all");
to = localStorage.getItem("to");
tc = localStorage.getItem("tc");
dy = localStorage.getItem("dy");
mo = localStorage.getItem("mo");
lang = localStorage.getItem("lang");
location_ = localStorage.getItem("location");
transit_preference = localStorage.getItem("transit_preference");
organization = localStorage.getItem("organization");
}

function get_day()
{
    var day = "LastSync: " + new Date().now() + " @ " + new Date().timeNow();
}

var def_lang = [];

//[0]:language select combobox, [1]: loads filters for side column, [2]: logo load, [3]: back and front buttons, [4]: emergency button, [5]: search box, [6]: top menu categories
var code_snippets = ['<form><select id="lang_select"  onChange="javascript:var ndx=document.getElementById(\'lang_select\').selectedIndex; apply_language(ndx); if(location_!=\'posting\'){redirect(location_, home_type, area);}else{redirect(location_, ID, area);}"></select><script>var index = 0;for (index = 0; index < def_langs.length; ++index) {var select = document.getElementById("lang_select"); select.options[select.options.length] = new Option(def_langs[index],def_langs[index]);} change_lang();</script></select></form>', '<!--<div id="filter_container">--><div id="filter_type_text"><script>dl(15);</script>:</div><br><center><script>document.write(filter_controls[0]);</script></center><br><br><br><br><script>document.write(filter_controls[1]);</script><br><br><script>document.write(filter_controls[2]);</script><br><br><div id="allows_of_venue_text"><script>dl(106);</script>:</div><br><br><script>document.write(filter_controls[3]);</script><br><br><div id="filter_distance_text"><script>dl(42);</script>:<br></div><br><br><center><select id="fil_area" method="post" name="fil_area" onChange="javascript: var ndx=document.getElementById(\'fil_area\').selectedIndex; set_local(\'area\', ndx); redirect_ajax(0);//redirect(\'content\', home_type, ndx); " style="border: 1px solid rgb(255, 127, 36); width: 78%; height: 33px; background-color: rgb(220,220,220); color: black; opacity: 0.8;"></select><script>var index = 0;for (index = 0; index < def_areas_berlin.length; ++index) {var select = document.getElementById("fil_area"); select.options[select.options.length] = new Option(def_areas_berlin[index],def_areas_berlin[index]);}</script></center><div id="by_organ"><br><br><div id="by_organ_text"><script>dl(46);</script>:<br></div><br><br><center><div id="by_org_filter"><center><select id="org_drop" name="org_drop" onChange="javascript: var ndx=document.getElementById(\'org_drop\').selectedIndex; localStorage.setItem(\'organization\', ndx); refresh_localstorage(); redirect_ajax(0);//redirect(\'content\', home_type, area);" style="border: 1px solid rgb(255, 127, 36); width: 78%; height: 33px; background-color: rgb(220,220,220); color: black; opacity: 0.8;"></select><br><br><script>var index = 0;for (index = 0; index < def_organizations.length; ++index) {var select = document.getElementById("org_drop");select.options[select.options.length] = new Option(def_organizations[index],def_organizations[index]);}</script></center></div></div></center></div></center><!--</div>-->', '<form id="src_bx_cont"><input type="text" value="'+def_lang[18]+'" name="src_bx" style="width: 190px; height: 33px; float: left; margin-right: 34px;"><input type="button" value="->" id="src_bx_bttn" style="width: 35px; height: 33px;"></form>', /*3 Prana logo*/'<a href="javascript:redirect(\'home\');"><div id="logo"><img src="../Assets/Images/logo/prana_logo.png" width="100%"></div></a><br>', /*4 Emergency button*/'<div id=\'emergency_button_div\'><form><input id=\'emergency_call\' src=\'../Assets/Images/prn_ico/call.png\' style=\'float: left; background-color: red;\' type=\'image\' onclick=\'javascript:show_drop_down();\'><input class=\'emergency_button\' id=\'emergency_button\' type=\'button\' style=\'background-color:red; height:30px;\' onclick=\'javascript:show_drop_down();\' value=\'Emergency\'></input></form></div> <div><div id="myDropdown" style=\'color:black; font-family:Arial; font-size:14px;\' class="dropdown-content">\n\<div style=\'background-color:rgb(9, 103, 126);\'><center><br><img src=\'../Assets/Images/icons/icon_health1.png\' height=\'100px\' width=\'100px\'/><br><br></center></div><div style=\'background-color:red; color:white;\'><div style=\' margin-left:3px; margin-right:3px;\'>At the moment we do not provide direct calls to any of the listed emergency services, below is a list of numbers you may call using a public or private phone:</div></div><br><a id="artzmob_cari_drop_content" href="#">Artzmobil Caritas:<br>Tel: -/-<br>Address: -/-<input style=\'float: right; height:19px;\' type=\'image\' src=\'../Assets/Images/prn_ico/led_icons/marker.png\'></input><input style=\'float: right;\' type=\'button\' value=\'View in map\'></input></a><a id="pol_drop_content" href="#">Polizei für die obdachlosen:<br>Tel: -/-<br>Address: -/-<input style=\'float: right; height:19px;\' type=\'image\' src=\'../Assets/Images/prn_ico/led_icons/marker.png\'></input><input style=\'float: right;\' type=\'button\' value=\'View in map\'></input></a></div></div>', /*uaucnt*/'<div id="uacnt_alternative"><form id="src_bx_cont"><input type="text" id="search_bx" style="width: 77%; height: 33px; float: left;"><input type="button" value="->" id="src_bx_bttn" style="width: 35px; height: 33px;"></form></div><script>get_item("search_bx").value=dl_r(18);</script>', /*top banner home_type picker*/'<div id="sel_home_type"><div id="img_sel" style="background-color: rgba(0, 93, 116, 1); float:left; margin-left:2%; height: 100%; width:40px;"><img id="home_type_button_image" src="../Assets/Images/icons/icon_housing.png" class="home_type_button_image" onclick="javascript:show_drop_down();" style="float:left; margin-left:12%; margin-top:17%; height: 30px; width:30px;"/></div><input class="home_type_button_text" id="home_type_button_text" style="float:left; margin-left:0%; height:100%; background-color: rgba(29, 123, 146, 1);" type="button" value="-/-" onclick="javascript:show_drop_down();"></input><div id="home_type_down_select" class="home_type_down_select" onclick="javascript:show_drop_down();" style="float:left; margin-left:0%; height:100%; background-color: rgba(29, 123, 146, 1);"><img class="home_type_button_drop" id="home_type_button_drop" src="../Assets/Images/prn_ico/white_down.png" style="float:left; margin-top:18px;"/></div><div id="myDropdown" class="dropdown-content"><a id="food_drop_content" href="#"></a><a id="housing_drop_content" href="#"></a><a id="medical_drop_content" href="#"></a><a id="legal_drop_content" href="#"></a><a id="study_drop_content" href="#"></a><a id="jobs_drop_content" href="#"></a></div></div><script>change_hometype_select(true); set_hometype_select_menu();</script>', /*search topbar*/ '<center><div id="sel_home_type"><input class="home_type_button_text" id="home_type_button_text" style="float:left; margin-left:0%; width:54%; height:70%; border-radius:0px; border: 1px solid rgb(255, 127, 36);" type="text" value="Search"></input><select id="src_in_top"></select></select><input type="button" value=">" onclick="javascipt:val=document.getElementById(\'home_type_button_text\').value; search(val,\'fuck you\');" name="src_bx_top" id="src_bx_top"></div></center><script>get_item("home_type_button_text").value=dl_r(18); fill_search_type("src_in_top");</script>'];

var filter_controls = [
    /*Paid, Free*/
    '<div id="filter_type"><form><center><input type="button" id="buttn_free" onclick="javascript:localStorage.setItem(\'paid_type\',0);refresh_localstorage();change_paidtype(\'free\'); redirect_ajax(0);//redirect(\'content\',home_type,area);" style="float: left; border: 0px solid rgb(255, 127, 36); -webkit-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); -moz-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.0); height: 30px; width: 50%; background-color: rgba(39, 123, 146, 1);"></input><input type="button" id="buttn_paid" onclick="javascript:localStorage.setItem(\'paid_type\',2);refresh_localstorage(); change_paidtype(\'paid\'); redirect_ajax(0);//redirect(\'content\',home_type,area);" style=" float: left; border: 0px solid rgb(255, 127, 36); -webkit-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); -moz-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.0); height: 30px; width: 50%; background-color: rgba(9, 103, 126, 1);"></input></center></form></div><script>set_value("buttn_free",13);set_value("buttn_paid",14);</script>',
    /*Time Open, Time Close, Day of the week*/
    '<div id="mo_opn_txt"><script>dl(104);</script>:</div><br><br><div id="mo_opn_div"><select id="mo_opn" style="border: 1px solid rgb(255, 127, 36); width: 78%; height: 33px; background-color: rgb(220,220,220); color: black; opacity: 0.8;" onChange="javascript: val1=document.getElementById(\'mo_opn\').selectedIndex; mo_=def_months[val1]; set_local(\'mo\', val1); if(val1==\'12\'){ set_local(\'to\', 24);  set_local(\'tc\', 24);  set_local(\'dy\', 7); } change_mo(); change_dy(); change_to_tc(); redirect_ajax(0);//redirect(\'content\', home_type);"></select></div><script>var index = 0; for (index = 0; index < def_months.length; ++index) {var select = document.getElementById("mo_opn"); select.options[select.options.length] = new Option(def_months[index],def_months[index]);}</script><br><br><div id="dy_txt"><script>dl(45);</script>:</div><br><br><select id="dy_" onchange="javascript: var sli=get_selected_index(\'dy_\'); set_local(\'dy\',sli); if(sli==\'7\'){ set_local(\'to\', 24);  set_local(\'tc\', 24); } change_mo(); change_dy(); change_to_tc(); redirect_ajax(0);//redirect(\'content\', home_type);" style="border: 1px solid rgb(255, 127, 36); width: 78%; height: 33px; background-color: rgb(220,220,220); color: black; opacity: 0.8;"></select><br><br><br><div id="time_cal_txt"><script>dl(43);</script>:</div><br><br><div id="time_cal"><select id="time_opn" style="border: 1px solid rgb(255, 127, 36); width: 35%; height: 33px; background-color: rgb(220,220,220); color: black; opacity: 0.8;" onChange="javascript: val1=document.getElementById(\'time_opn\').selectedIndex; to_=def_times[val1]; val2=document.getElementById(\'time_cle\').selectedIndex; set_local(\'to\', val1); set_local(\'tc\', val2); change_mo(); change_dy(); change_to_tc(); redirect_ajax(0);//redirect(\'content\', home_type);"></select> <script>dl(44);</script> <select id="time_cle" style="border: 1px solid rgb(255, 127, 36); width: 35%; height: 33px; background-color: rgb(220,220,220); color: black; opacity: 0.8;" onChange="javascript: val1=document.getElementById(\'time_opn\').selectedIndex; to_=def_times[val1]; val2=document.getElementById(\'time_cle\').selectedIndex; set_local(\'to\', val1); set_local(\'tc\', val2); change_mo(); change_dy(); change_to_tc(); redirect_ajax(0);//redirect(\'content\', home_type);"></select><script>var index = 0;for (index = 0; index < def_times.length; ++index) {var select = document.getElementById("time_opn");var select2 = document.getElementById("time_cle"); select.options[select.options.length] = new Option(def_times[index],def_times[index]);select2.options[select2.options.length] = new Option(def_times[index],def_times[index]);}</script><br></div><script>var index = 0;for (index = 83; index <= 90; ++index) {var select = document.getElementById("dy_"); if(index!=90){select.options[select.options.length] = new Option(def_lang[index],def_lang[index]);}else{select.options[select.options.length] = new Option("--","--");}}</script><br><br><div id="All_categ_txt"><script>document.write(def_lang[105]);</script>:</div>',

/*Filter "TYPE_VENUE"*/
'<div id="filter_type_venue"><select id="type_of_venue" onChange="javascript:set_local(\'vt\',get_selected_item(\'type_of_venue\'));redirect_ajax(0);" style="border: 1px solid rgb(255, 127, 36); width: 78%; height: 33px; background-color: rgb(220,220,220); color: black; opacity: 0.8;"></select></div><script>var elem=get_item("type_of_venue"); elem.options[elem.options.length] = new Option("--","--");</script>',

/*Filter "ALLOWS_VENUE"*/
'<div id="filter_allows_venue"><select id="allows_of_venue" onChange="javascript:set_local(\'va\',get_selected_item(\'allows_of_venue\'));redirect_ajax(0);" style="border: 1px solid rgb(255, 127, 36); width: 78%; height: 33px; background-color: rgb(220,220,220); color: black; opacity: 0.8;"></select></div><script>var elem=get_item("allows_of_venue"); elem.options[elem.options.length] = new Option("--","--");</script>'
];

var def_days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
var def_months = ["January", "Febuary", "March", "April", "May", "June","July","August","September","October","November","December","--"];
var def_times = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,"--"];
var def_types = ["free", "charity", "paid"];

var def_view_types = ["grid", "list", "map"];

var def_post_sections = ["go back", "other by this organization"];
var def_profile_sections = ["go back"];

var def_langs = [];

var def_langs_gmaps = [];
var def_langs_gmaps_reg = [];

var special_characters = ["<amp>"];

var def_locations = ["./home_inconst.php", "./login.php", "./signup.php", "./profile.php", "./content.php", "./posting.php", "/home_inconst.php", "./content_modular.php"];

var def_areas_berlin = ["Berlin All", "Mitte", "Kreuzberg", "Shoeneberg (Shöneberg)", "Tiergarten/Moabit", "Wedding", "Prenzlauerberg", "Friedrichshain", "Neukoelln (Neukölln)", "Tempelhof", "Wilmersdorf", "Charlottenburg", "Spandau", "Reinickendorf", "Pankow", "Weissensee (Weißensee)", "Hohenschoenhausen (Hohenschönhausen)", "Lichtenberg", "Marzahn", "Hellersdorf", "Koepenick (Köpenick)", "Treptow", "Steglitz", "Zehlendorf"];

var var_def_sections = ["home", "food", "housing", "medical", "legal & documents", "study", "jobs", "tips & tricks", "orgs."];

var def_organizations = ["All"];
var def_filters_food = [];