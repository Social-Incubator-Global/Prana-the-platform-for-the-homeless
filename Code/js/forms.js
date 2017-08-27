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


//Variables we need to use! TRANSFORM ALL INTO get_local(); (DELETE)
                 var session = get_local("session");
                 var uname = get_local("uname");
                 var ID = get_local("ID");
                 var home_type = get_local("home_type");
                 var paid_type = get_local("paid_type");
                 var view_type = get_local("view_type");
                 var area = get_local("area");
                 var lang = get_local("lang");
                 var location_ = get_local("location");
                 var organization = get_local("organization");


                 var all = localStorage.getItem("all");
                 var to = localStorage.getItem("to");
                 var tc = localStorage.getItem("tc");
                 var dy = localStorage.getItem("dy");
                 var mo = localStorage.getItem("mo");
                 var vt = localStorage.getItem("vt");
                 var va = localStorage.getItem("va");
                 //filters housing
                 var filters_housing_shelters = localStorage.getItem("filters_housing_shelters");
                 var filters_housing_hostels = localStorage.getItem("filters_housing_hostels");
                 var filters_housing_govt = localStorage.getItem("filters_housing_govt");
                 var filters_housing_coldshelters = localStorage.getItem("filters_housing_coldshelters");
                 var filters_wo = localStorage.getItem("filters_wo");
                 var filters_mo = localStorage.getItem("filters_mo");
                 var filters_childrenok = localStorage.getItem("filters_childrenok");
                 var filters_petsok = localStorage.getItem("filters_petsok");
                 var filters_smoking = localStorage.getItem("filters_smoking");
                 var filters_alcohol = localStorage.getItem("filters_alcohol");

                 //filters food
                 var filters_food_soupkitchens = localStorage.getItem("filters_food_soupkitchens");
                 var filters_food_tafels = localStorage.getItem("filters_food_tafels");

//STARTS PRANA-DEUTSCHLAND.DE --> THIS IS THE ENTRY POINT OF THE WEBSITE.
function start()
{
    set_local("location", "home");
    set_local("lang", "0");
    document.location = "./Pages"+def_locations[6] + '?lang=0';
    return;
}

function redirect_ajax(type_, id_, response_element)
{
    //Type=request type
    //0=content
    //1=bookmark_set
    //2=bookmark_get  
    //id=posting id/content id
    //4=Get filters for allows and venue type
    if(type_ === 0)
    {
        send_AJAX('content',eval_build_url(get_local('home_type'), get_local('area'), true, true), 'set', 'test_cnt');
    }
    else if(type_ === 1)
    {
        send_AJAX('set_unset_bookmark', eval_build_url('set_unset_bookmark', get_local('area'), true, true, id_), 'set', response_element);
    }
    else if(type_ === 2)
    {
        send_AJAX('get_bookmarks_content', eval_build_url('get_bookmarks_content', get_local('area'), true, true), 'set', response_element);
    }
    else if(type_ === 3)
    {
        send_AJAX('get_bookmark_posting', eval_build_url('get_bookmark_posting', get_local('area'), true, true, id_), 'set', response_element);
    }
    else if(type_ === 4)
    {
        send_AJAX('get_allows_type_filters', eval_build_url('get_allows_type_filters',get_local('area'), true, true, id_), 'set', response_element);
    }
}

function redirect(Where_, Inner_Where_, area_index_)
{
    refresh_localstorage();
    if(Inner_Where_ != undefined)
    {
        Inner_Where_ = Inner_Where_.toLocaleString().toLowerCase();
    }
    def_sql_structure = [];
    set_local("location", Where_);
    if(Where_ == "home")
    {
        document.location = def_locations[0] + '?lang=' + get_local("lang");
    }
    if(Where_ == "homeinner")
    {
        document.location = ".." + def_locations[0] + '?lang=' + get_local("lang");
    }
    else if(Where_ == "signup")
    {
        document.location = def_locations[2] + '?lang=' + get_local("lang");
    }
    else if(Where_ == "login")
    {
        document.location = def_locations[1] + '?lang=' + get_local("lang");
    }
    else if(Where_ == "profile")
    {
        document.location = def_locations[3] + '?lang=' + get_local("lang") + '&id=' + get_local("uname");
    }
    else if(Where_ == "posting")
    {
        document.location = def_locations[5] + '?lang=' + get_local("lang") + '&home_type=' + get_local("home_type") + '&id=' + Inner_Where_;
    }
    else if(Where_ == "logout")
    {
        session_reset();
    }
    else if(Where_ == "content")
    {
        clear_ven_type_allows();
        set_local("home_type", Inner_Where_);
        if(area_index_ != undefined)
        {
            set_local("area", area_index_);
        }
        document.location = eval_build_url(home_type, area);
    }
    else if(Where_ == "content_modular")
    {
        set_local("home_type", Inner_Where_);
        document.location = def_locations[7] + '?lang=' + get_local("lang");
    }
    else if(Where_ == "search")
    {
        val = get_item_value("src_bx");
        val2=null;
        try
        {
            val2 = get_item_value("src_in");
        }
        catch(Exception)
        {
            val2=get_item_value("src_in_top");
        }
        document.location = def_locations[8] + '?lang=' + get_local("lang") + "&keys=" + val + "&src=" + val2;
    }
return;
}

function set_location(Location_string)
{
    set_local("location", Location_string);
}

function eval_build_url(Type__, area_index_, use_special_character, direct_url, id)
{
    var link = "";
    if(!direct_url)
    {
        link = def_locations[4] + '?';
    }
    if(Type__ === "housing")
    {
        link = link + 'home_type=' + Type__ + '&area=' + area_index_ + '&paid_type=' + get_local("paid_type") + '&lang=' + get_local("lang") + '&organization=' + get_local("organization") + "&vt=" + get_local("vt")+ "&va=" + get_local("va") + "&to=" + get_local("to") + "&tc=" + get_local("tc") + "&dy=" + get_local("dy") + "&mo=" + get_local("mo") + '&all=' + get_local("all");
    }
    else if(Type__ === "food")
    {
        link = link + 'home_type=' + Type__ + '&area=' + area_index_ + '&paid_type=' + get_local("paid_type") + '&lang=' + get_local("lang") + '&organization=' + get_local("organization") + "&vt=" + get_local("vt")+ "&va=" + get_local("va") + "&to=" + get_local("to") + "&tc=" + get_local("tc") + "&dy=" + get_local("dy") + "&mo=" + get_local("mo");
    }
    else if(Type__ === "medical")
    {
        link = link + 'home_type=' + Type__ + '&area=' + area_index_ + '&paid_type=' + get_local("paid_type") + '&lang=' + get_local("lang") + '&organization=' + get_local("organization") + "&vt=" + get_local("vt")+ "&va=" + get_local("va") + "&to=" + get_local("to") + "&tc=" + get_local("tc") + "&dy=" + get_local("dy") + "&mo=" + get_local("mo");
    }
    else if(Type__ === "set_unset_bookmark")
    {
        link = link + 'user=' + get_local("uname") + '&session=' + get_local("session") + '&id=' + id + '&lang=' + get_local("lang");
    }
    else if(Type__ === "get_bookmarks_content")
    {
        link = link + 'user=' + get_local("uname") + '&session=' + get_local("session") + '&id=' + id + '&lang=' + get_local("lang") + '&location=' + get_local('location');
    }
    else if(Type__ === "get_bookmark_posting")
    {
        link = link + 'user=' + get_local("uname") + '&id=' + id;
    }
    else if(Type__ === "get_allows_type_filters")
    {
        link = link + 'home_type=' + get_local("home_type");
    }
    else
    {
        link = link + 'home_type=' + Type__ + '&area=' + area_index_ + '&paid_type=' + get_local("paid_type");
    }
    //Special character usage for AJAX, cannot send ampersand for some reason, standard?
    if(use_special_character)
    {
        link = link.replace(/&/g, special_characters[0]);
    }
    return link;
}

function login_form()
{
dl_d('<center><div id="Logo">Prana</div><div id="main_box"></div></center>');
}

function dashboard(Type_)
{
    if(Type_ == "home")
    {
        dl_d('<div id="home_"><center><br><div id="logo" style="font-size:132; float:none;"><img src="../Assets/Images/logo/prana_logo.png"></div><br><br><div id=home_src><div id="src_txt">'+dl_r(17)+'</div><br><br><form><input type="text" value="'+dl_r(18)+'" name="src_bx" id="src_bx" style="width: 300px; height: 33px;" onclick="javscript:val=document.getElementById(\'src_bx\').value;if(val==\''+dl_r(18)+'\'){remove_value(\'src_bx\');}"  onblur="console.log(\'aga\');val=document.getElementById(\'src_bx\').value;if(val==\'\'){document.getElementById(\'src_bx\').value='+dl_r(18)+';}"><select id="src_in" value="In"></select><input type="button" value=">" name="src_bx" style="width: 35px; height: 33px; background-color: rgba(9, 103, 126, 1.0);" onclick="javascipt:val=document.getElementById(\'src_bx\').value; redirect(\'search\');"></form></div><br><div id="home_buttons"><div id="button1"><a href="javascript:redirect(\'content\', \'food\', '+get_local("area")+');"><img src="../Assets/Images/icons/icon_food.png" width="50px" height="50px"><br>'+dl_r(19)+'</div></a><div id="button2"><a href="javascript:redirect(\'content\',\'housing\','+get_local("area")+');"><img src="../Assets/Images/icons/icon_housing.png" width="50px" height="50px"><br>'+dl_r(20)+'</a></div><div id="button3"><a href="javascript:redirect(\'content\',\'medical\', '+get_local("area")+');"><img src="../Assets/Images/icons/Icon_health.png" width="50px" height="50px"><br>'+dl_r(21)+'</a></div><div id="button4"><a href="javascript:redirect(\'content\',\'legal\', '+get_local("area")+');"><img src="../Assets/Images/icons/icon_legal and advice.png" width="50px" height="50px"><br>'+dl_r(22)+'</a></div><div id="button5"><a href="javascript:redirect(\'content\',\'study\', '+get_local("area")+');"><img src="../Assets/Images/icons/icon_study2.png" width="50px" height="50px"><br>'+dl_r(23)+'</a></div><div id="button6"><a href="javascript:redirect(\'content\',\'jobs\', '+get_local("area")+');"><img src="../Assets/Images/icons/icon_jobs.png" width="50px" height="50px"><br>'+dl_r(24)+'</a></div><div id="button7"><a href="javascript:redirect(\'content_modular\',\'\', '+get_local("area")+');"><img src="../Assets/Images/icons/icon_.png" width="50px" height="50px"><br>'+dl_r(108)+'</a></div></div></center></div></br></br><script>fill_search_type("src_in");</script>');
}
else if(Type_ == "profile")
{
   dl_d("<center><div id='profile_container'><div id='title_profile'><script>document.write(def_lang[16]);</script></div></div></center>");
}
}

function emergency_button()
{
    document.getElementByTag("body")[0].innerHTML = code_snippets[4];
}

function search_box()
{
    dl_d(code_snippets[5]);
}

function top_menu(Type_, Subtype__)
{
if(Type_=="home0")
{
dl_d('<div id="top_banner"><script>dl_d(code_snippets[4]);</script><div id="lang_selector" style="float:right;"><script>document.write(code_snippets[0]);</script></div><div id="uacnt"><a style="color: black;" href="javascript: if(session==1){redirect(\'profile\');}else{redirect(\'login\');}" id="login_text" href="#"><script>if(session==1){document.write(def_lang[35]); }else if (session!=1){ document.write(def_lang[0]); if(session!=1){document.write} }</script></a><script>if(session==0){document.write(" | ");}</script><a style="color: black;" href="javascript:redirect(\'signup\');"><script>if(session==0){document.write(def_lang[6]);}</script></a><a style="color: black;" href="javascript:redirect(\'logout\');" id="login_text" href="#"><script>if(session==1){document.write(" | " + def_lang[1]); }</script></a><a href="javascript:login_form()" id="login_text" href="#"></a></div></div>');
}
else if(Type_ == "content")
{
    var top = "";
    if(Subtype__==undefined || Subtype__==null || Subtype__=="")
    {
        top='<div id="top_banner" style="" ><a href="javascript:redirect(\'home\');"><div id="logo"><img src="../Assets/Images/logo/prana_logo_tool.png"></div></a><div id="lang_selector" style="float:right;"><script>document.write(code_snippets[0]);</script></div><script>dl_d(code_snippets[7]); dl_d(code_snippets[4]);</script><div id="uacnt" style=""><a style="color: white;" href="javascript: if(session==1){redirect(\'profile\');}else{redirect(\'login\');}" id="login_text" href="#"><script>if(session==1){document.write(def_lang[35]); }else if (session!=1){ document.write(def_lang[0]); if(session!=1){document.write} }</script></a><script>if(session==0){document.write(" | ");}</script><a  style="color: white;"  href="javascript:redirect(\'signup\');"><script>if(session==0){document.write(def_lang[6]);}</script></a><a href="javascript:redirect(\'logout\');" id="login_text" href="#" style="color: white;"><script>if(session==1){document.write(" | " + def_lang[1]); }</script></a><a href="javascript:login_form()" id="login_text" href="#"></a></div></div>';
    }
    else if(Subtype__ == "login")
    {
        top='<div id="top_banner"  style="" ><a href="javascript:redirect(\'home\');"><div id="logo"><img src="../Assets/Images/logo/prana_logo_tool.png"></div></a><div id="lang_selector" style="float:right;"><script>document.write(code_snippets[0]);</script></div><div id="uacnt" style=""><a style="color: white;" href="javascript: redirect(\'home\');" id="login_text" href="#"><script>dl(4);</script></a><script>if(session==0){document.write(" | ");}</script><a  style="color: white;"  href="javascript:redirect(\'signup\');"><script>if(session==0){document.write(def_lang[6]);}</script></a><a href="javascript:redirect(\'logout\');" id="login_text" href="#" style="color: white;"><script>if(session==1){document.write(" | " + def_lang[1]); }</script></a><a href="javascript:login_form()" id="login_text" href="#"></a></div></div>';
    }
    else if(Subtype__ == "signup")
    {
        top='<div id="top_banner"  style="" ><a href="javascript:redirect(\'home\');"><div id="logo"><img src="../Assets/Images/logo/prana_logo_tool.png"></div></a><div id="lang_selector" style="float:right;"><script>document.write(code_snippets[0]);</script></div><div id="uacnt" style=""><a style="color: white;" href="javascript: redirect(\'home\');" id="login_text" href="#"><script>dl(4);</script></a><script>document.write(" | ");</script><a style="color: white;"  href="javascript:redirect(\'login\');"><script>dl(0);</script></a><a href="javascript:login_form()" id="login_text" href="#"></a></div></div>';
    }
    dl_d(top);
}
else if(Type_ == "profile")
{
    dl_d('<div id="top_banner"><a href="javascript:redirect(\'home\');"><div id="logo"><img src="../Assets/Images/logo/prana_logo_tool.png"></div></a><script>dl_d(code_snippets[4]);</script><script>dl_d(code_snippets[6]);</script><div id="uacnt"><a style="color: white;" href="javascript: if(session==1){redirect(\'profile\');}else{redirect(\'login\');}" id="login_text" href="#"><script>if(session==1){document.write(def_lang[35]); }else if (session!=1){ document.write(def_lang[28]); }</script></a><a style="color: white;" href="javascript:redirect(\'logout\');" id="login_text" href="#"><script>if(session==1){document.write(" | " + def_lang[1]); }</script></a><a href="javascript:login_form()" id="login_text" href="#"></a></div></div>');
}
else if(Type_ == "posting")
{
    dl_d('<div id="top_banner"><a href="javascript:redirect(\'home\');"><div id="logo"><img src="../Assets/Images/logo/prana_logo_tool.png"></div></a><div id="lang_selector" style="float:right;"><script>document.write(code_snippets[0]);</script></div><script>dl_d(code_snippets[7]);</script><script>dl_d(code_snippets[4]);</script><div id="uacnt"><a style="color: white;" href="javascript: if(session==1){redirect(\'profile\');}else{redirect(\'login\');}" id="login_text" href="#"><script>if(session==1){document.write(def_lang[35]); }else if (session!=1){ document.write(def_lang[0]); if(session!=1){document.write} }</script></a><script>if(session==0){document.write(" | ");}</script><a style="color: white;" href="javascript:redirect(\'signup\');"><script>if(session==0){document.write(def_lang[6]);}</script></a><a style="color: white;" href="javascript:redirect(\'logout\');" id="login_text" href="#"><script>if(session==1){document.write(" | " + def_lang[1]); }</script></a><a href="javascript:login_form()" id="login_text" href="#"></a></div></div>');
}
else if(Type_ == "search")
{
    dl_d('<div id="top_banner" style="" ><a href="javascript:redirect(\'home\');"><div id="logo"><img src="../Assets/Images/logo/prana_logo_tool.png"></div></a><div id="lang_selector" style="float:right;"><script>document.write(code_snippets[0]);</script></div><script>dl_d(code_snippets[7]); dl_d(code_snippets[4]);</script><div id="uacnt" style=""><a style="color: white;" href="javascript: if(session==1){redirect(\'profile\');}else{redirect(\'login\');}" id="login_text" href="#"><script>if(session==1){document.write(def_lang[35]); }else if (session!=1){ document.write(def_lang[0]); if(session!=1){document.write} }</script></a><script>if(session==0){document.write(" | ");}</script><a  style="color: white;"  href="javascript:redirect(\'signup\');"><script>if(session==0){document.write(def_lang[6]);}</script></a><a href="javascript:redirect(\'logout\');" id="login_text" href="#" style="color: white;"><script>if(session==1){document.write(" | " + def_lang[1]); }</script></a><a href="javascript:login_form()" id="login_text" href="#"></a></div></div>');
}
return;
}

function change_bookmark_content(itm, status)
{
    if(status==1)
    {
        itm.style.backgroundColor = 'rgb(240,240,240)';
    }
    else{ itm.style.backgroundColor = 'rgb(9, 103, 126)'; }
}

function change_transit_liking(Type_)
{
    //get_item dont work here? does my code suck ass?
document.getElementById("button_google_go_bus").checked = false;
document.getElementById("button_google_go_subway").checked = false;
document.getElementById("button_google_go_train").checked = false;
document.getElementById("button_google_go_tram").checked = false;

if(Type_ == "BUS")
{
    document.getElementById("button_google_go_bus").checked = true;
}
else if(Type_ == "SUBWAY")
{
    document.getElementById("button_google_go_subway").checked=true;
}
else if(Type_ == "TRAIN")
{
    document.getElementById("button_google_go_train").checked=true;
}
else if(Type_ == "TRAM")
{
    document.getElementById("button_google_go_tram").checked=true;
}
return;
}

//(optimize)
function change_transit_type(Type_)
{
document.getElementById("button_google_go_walking").style.backgroundColor = "rgba(9, 103, 126, 1)";
document.getElementById("button_google_go_car").style.backgroundColor = "rgba(9, 103, 126, 1)";
document.getElementById("button_google_go_public").style.backgroundColor = "rgba(9, 103, 126, 1)";
document.getElementById("button_google_go_bike").style.backgroundColor = "rgba(9, 103, 126, 1)";

if(Type_ == "WALKING")
{
document.getElementById("button_google_go_walking").style.backgroundColor = "rgba(255,127,36,1)";
}
else if(Type_ == "DRIVING")
{
document.getElementById("button_google_go_car").style.backgroundColor = "rgba(255,127,36,1)";
}
else if(Type_ == "TRANSIT")
{
document.getElementById("button_google_go_public").style.backgroundColor = "rgba(255,127,36,1)";
}
else if(Type_ == "BICYCLING")
{
document.getElementById("button_google_go_bike").style.backgroundColor = "rgba(255,127,36,1)";
}
}

function return_hometype()
{
    if(get_local("home_type") == "food")
    { return dl_r(19); }
    else if(get_local("home_type") == "housing")
    { return dl_r(20); }
    else if(get_local("home_type") == "medical")
    { return dl_r(21); }
    else if(get_local("home_type") == "legal & documents")
    { return dl_r(22); }
    else if(get_local("home_type") == "study")
    { return dl_r(23); }
    else if(get_local("home_type") == "jobs")
    { return dl_r(24); }
    else{return "-/-";};
}

function return_hometype_image_url()
{
    if(get_local("home_type") == "food")
    { return "/Assets/Images/icons/icon_food.png"; }
    else if(get_local("home_type") == "housing")
    { return "/Assets/Images/icons/icon_housing.png"; }
    else if(get_local("home_type") == "medical")
    { return "/Assets/Images/icons/Icon_health.png"; }
    else if(get_local("home_type") == "legal & documents")
    { return "/Assets/Images/icons/icon_legal and advice.png"; }
    else if(get_local("home_type") == "study")
    { return "/Assets/Images/icons/icon_study2.png"; }
    else if(get_local("home_type") == "jobs")
    { return "/Assets/Images/icons/icon_jobs.png"; }
}

function change_hometype_select(change_title)
{
    get_item("home_type_button_text").value = return_hometype();
    get_item("home_type_button_image").src = return_hometype_image_url();
    if(change_title)
    {
        document.title = "Prana : " + return_hometype();
    }
}

function set_hometype_select_menu()
{
    //automate using div id as ver_def_sections+_drop_content
    get_item("food_drop_content").innerHTML='<img src="/Assets/Images/icons/icon_food.png"/ width="30" height="30"><div style="margin-top:5%; float:right; margin-right:20;">'+dl_r(19)+"</div>";
    get_item("food_drop_content").href='javascript:redirect(\'content\', \'' + var_def_sections[1] + '\')';
    get_item("housing_drop_content").innerHTML='<img src="/Assets/Images/icons/icon_housing.png"/ width="30" height="30"><div style="margin-top:5%; float:right; margin-right:20;">'+dl_r(20)+"</div>";
    get_item("housing_drop_content").href='javascript:redirect(\'content\', \'' + var_def_sections[2] + '\')';
    get_item("medical_drop_content").innerHTML='<img src="/Assets/Images/icons/Icon_health.png"/ width="30" height="30"><div style="margin-top:5%; float:right; margin-right:20;">'+dl_r(21)+"</div>";
    get_item("medical_drop_content").href='javascript:redirect(\'content\', \'' + var_def_sections[3] + '\')';
    get_item("legal_drop_content").innerHTML='<img src="/Assets/Images/icons/icon_legal and advice.png"/ width="30" height="30"><div style="margin-top:5%; float:right; margin-right:20;">'+dl_r(22)+"</div>";
    get_item("legal_drop_content").href='javascript:redirect(\'content\', \'' + var_def_sections[4] + '\')';
    get_item("study_drop_content").innerHTML='<img src="/Assets/Images/icons/icon_study2.png"/ width="30" height="30"><div style="margin-top:5%; float:right; margin-right:20;">'+dl_r(23)+"</div>";
    get_item("study_drop_content").href='javascript:redirect(\'content\', \'' + var_def_sections[5] + '\')';
    get_item("jobs_drop_content").innerHTML='<img src="/Assets/Images/icons/icon_jobs.png"/ width="30" height="30"><div style="margin-top:5%; float:right; margin-right:20;">'+dl_r(24)+"</div>";
    get_item("jobs_drop_content").href='javascript:redirect(\'content\', \'' + var_def_sections[6] + '\')';
}

function show_drop_down()
{
     document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.home_type_button_drop') && !event.target.matches('.home_type_button_image') && !event.target.matches('.home_type_down_select') && !event.target.matches('.home_type_button_text') && !event.target.matches('.emergency_button')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
};

function change_area()
{
document.getElementById("fil_area").selectedIndex = area;
}

function change_org()
{
document.getElementById("org_drop").selectedIndex = organization;
}

function change_lang()
{
document.getElementById("lang_select").selectedIndex = lang;
}

function change_mo()
{
    document.getElementById("mo_opn").selectedIndex = get_local("mo");
}

function clear_ven_type_allows()
{
    set_local("vt", "");
    set_local("va", "");
}

function change_ven_type()
{
    document.getElementById("type_of_venue").selectedIndex = get_local("vt");
}

function change_ven_allows()
{
    document.getElementById("allows_of_venue").selectedIndex = get_local("va");
}

function change_to_tc()
{
    if(dy != 7 && mo != 12)
    {
        document.getElementById("time_opn").disabled = false;
        document.getElementById("time_cle").disabled = false;
        document.getElementById("time_opn").selectedIndex = get_local("to");
        document.getElementById("time_cle").selectedIndex = get_local("tc");
    }
    else
    {
        set_local("to", 24);
        set_local("tc", 24);
        document.getElementById("time_opn").disabled = true;
        document.getElementById("time_cle").disabled = true;
    }
}

function change_dy()
{
    if(mo != 12)
    {
        document.getElementById("dy_").disabled = false;
        set_index("dy_", get_local("dy"));
    }
    else
    {
        document.getElementById("dy_").disabled = true;
        set_index("dy_", 7);
    }
}

function change_paidtype(Type_)
{
document.getElementById("buttn_free").style.backgroundColor = "rgba(9, 103, 126, 1)";
document.getElementById("buttn_paid").style.backgroundColor = "rgba(9, 103, 126, 1)";

if(Type_ == def_types[0])
{
localStorage.setItem("paid_type", 0);
document.getElementById("buttn_free").style.backgroundColor = "rgba(255,127,36,1)";
}
else if(Type_ == def_types[2])
{
localStorage.setItem("paid_type", 2);
document.getElementById("buttn_paid").style.backgroundColor = "rgba(255,127,36,1)";
}
}

function filters_load(Type_)
{
//[1]: loads filters for side column
dl_d(code_snippets[1]);
}

function menu_home_type(Type_)
{
var out_ = "<br><div id='menu_main'>";
if(Type_ == "posting")
{
for(i=0; i <1; i++)
{
out_=out_+'<a href="javascript:redirect(\'content\', \'' + def_post_sections[i] + '\')">' + dl_r(82) + '</a>';
}
}
else if(Type_ == "profile")
{
for(i=0; i < def_profile_sections.length; i++)
{
if(i!=0)
{
out_=out_+'<a href="javascript:redirect(\'content\', \'' + def_profile_sections[i] + '\')"> | ' + def_profile_sections[i] + '</a>';
}
else
{
out_=out_+'<a href="javascript:window.history.back();">' + def_profile_sections[i] + '</a> ';
}
}
}
else{
    ndx=0;
for(i=18; i < 24; i++)
{
if(i!=18)
{
    out_=out_+'<a href="javascript:redirect(\'content\', \'' + var_def_sections[ndx] + '\')"> | ' + dl_r(i) + '</a>';
}
else
{
    out_=out_+'<a href="javascript:redirect(\'home\')">' + dl_r(4) + '</a> ';
}
ndx++;
}
}
out_=out_+"</div><br>";
document.write(out_);
}

function fill_search_type(name)
{
    ndx=0;
    for(i=18; i < 24; i++)
    {
        if(i!=18)
        {
            var select = document.getElementById(name);select.options[select.options.length] = new Option(var_def_sections[ndx],var_def_sections[ndx]);
            //out_=out_+'<a href="javascript:redirect(\'content\', \'' + var_def_sections[ndx] + '\')"> | ' + dl_r(i) + '</a>';
        }
        else
        {
            //out_=out_+'<a href="javascript:redirect(\'home\')">' + dl_r(4) + '</a> ';
        }
        ndx++;
    }
}

function search(content, type)
{
    //SEARCH BY TYPE OF CONTENT. TYPE HELPS DETERMINE WHETHER TO REDIRECT TO CONTENT.php or CONTENT_MODULAR.php
    
    console.log(content, type);
}

function news_load()
{
document.write('<div id="news_"></div>');
}

function show_copyright()
{
document.write("<div id='copyright' style='font-family:Arial,regular; font-size:14px;'>"+def_lang[3]+"</div>");
}

function refresh_map()
{
initMap();
}

function update_(Type_)
{
if(Type_ == "distance")
{
alert("wkak");
}
}

function overlay_menu()
{

}

function clear()
{
    document.getElementById("content").innerHTML = "";
}