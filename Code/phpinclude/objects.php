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

$languages = array();
$def_days = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];

function get_month($ndx)
{
    if($ndx == 0)
    {
        return "january";
    }
    if($ndx == 1)
    {
        return "febuary";
    }
    if($ndx == 2)
    {
        return "march";
    }
    if($ndx == 3)
    {
        return "april";
    }
    if($ndx == 4)
    {
        return "may";
    }
    if($ndx == 5)
    {
        return "june";
    }
    if($ndx == 6)
    {
        return "july";
    }
    if($ndx == 7)
    {
        return "august";
    }
    if($ndx == 8)
    {
        return "september";
    }
    if($ndx == 9)
    {
        return "october";
    }
    if($ndx == 10)
    {
        return "november";
    }
    if($ndx == 11)
    {
        return "december";
    }
}

function get_day($ndx)
{
////dumbshit php
    //return $def_days[$ndx];
    if($ndx==0)
    {
        return "monday";
    }
    else if($ndx==1)
    {
        return "tuesday";
    }
    else if($ndx==2)
    {
        return "wednesday";
    }
    else if($ndx==3)
    {
        return "thursday";
    }
    else if($ndx==4)
    {
        return "friday";
    }
    else if($ndx==5)
    {
        return "saturday";
    }
    else if($ndx==6)
    {
        return "sunday";
    }
}
?>