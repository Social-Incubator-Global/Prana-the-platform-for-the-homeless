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

//LOADS VARIABLES USED THROUGH THE WEBSITE TO BE OUTSOURCED TO THE BACKEND THROUGH A FUNCTION CALL

//Adds classes sequentially related to depth.
var breadcrumbs = [];
var breadcrumbs_current = 0;

var system = {
    popup : false
};

var images = {
    DEF : "../Assets/Images/icons/icon_housing.png",
    home: "../Assets/Images/icons/house.png",
    home2: "../Assets/Images/icons/cottage.png",
    food: "../Assets/Images/icons/cutlery.png",
    medical: "../Assets/Images/icons/ambulance.png",
    sanitary: "../Assets/Images/icons/toilet.png",
    legal: "../Assets/Images/icons/auction.png",
    jobcenter: "../Assets/Images/icons/office.png",
    counseling: "../Assets/Images/icons/comment.png"
};

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
    return;
}

function dl_r(ndx)
{
    return def_lang[ndx];
}

function set_disabled(name)
{
    get_item(name).enabled = false;
    get_item(name).disabled = true;
	return;
}

function set_enabled(name)
{
    get_item(name).enabled = true;
    get_item(name).disabled = false;
	return;
}

function set_hidden(name, visibility)
{
    get_item(name).style.visibility = visibility;
    return;
}

function set_value(name, ndx)
{
    document.getElementById(name).value = dl_r(ndx);
    return;
}

function remove_inner_HTML(name)
{
    get_item(name).parentNode.removeChild(get_item(name));
    return;
}

function clear_inner_HTML(name)
{
    get_item(name).innerHTML = "";
    return;
}

function set_addition_inner_HTML(name, value)
{
    get_item(name).innerHTML += value;
    return;
}

function set_innerhtml(name, HTML)
{
    document.getElementById(name).innerHTML = HTML;
    return;
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
    //refresh_localstorage();
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

function get_hidden(name)
{
    return get_item(name).style.visibility;
}

function apply_language(index_)
{
    localStorage.setItem("lang", index_);
}

function get_day()
{
    return day = "LastSync: " + new Date().now() + " @ " + new Date().timeNow();
}

var def_lang = [];

var def_days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
var def_months = ["January", "Febuary", "March", "April", "May", "June","July","August","September","October","November","December","--"];
var def_times = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,"--"];
var def_types = ["free", "kostenübernahme", "paid"];

var def_view_types = ["grid", "list", "map"];

var def_post_sections = ["go back", "other by this organization"];
var def_profile_sections = ["go back"];

var def_langs = [];

var def_langs_gmaps = [];
var def_langs_gmaps_reg = [];
var def_addresses_gmaps = [];

var special_characters = ["<amp>"];

//def_locations [0]: home here must be directed to the current directory
//AS "./home.php"
//def_locations [6]: home here must be directed to the root directory AS
//"/home.php"
//redirecting def_locations[0] to '/home.php' sends the website to the root home.php file. this reloads any variables set before and ovverrides them as it things its reloading the website from scratch.

//transform from def_areas_berlin[n] to def_areas_berlin[0]: ALL LOCATIONS WILL BE EMITTED INTO THE DB
var def_areas_berlin = ["Berlin All", "Mitte", "Kreuzberg", "Shoeneberg (Shöneberg)", "Tiergarten/Moabit", "Wedding", "Prenzlauerberg", "Friedrichshain", "Neukoelln (Neukölln)", "Tempelhof", "Wilmersdorf", "Charlottenburg", "Spandau", "Reinickendorf", "Pankow", "Weissensee (Weißensee)", "Hohenschoenhausen (Hohenschönhausen)", "Lichtenberg", "Marzahn", "Hellersdorf", "Koepenick (Köpenick)", "Treptow", "Steglitz", "Zehlendorf"];

var var_def_sections = ["home", "food", "housing", "medical", "legal & documents", "study", "jobs", "tips & tricks", "orgs."];

var grammer_correct_sections = [];

var def_organizations = ["All"];
var def_filters_food = [];
var current_map;
