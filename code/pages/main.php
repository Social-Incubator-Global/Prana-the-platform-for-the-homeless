<!--
<Prana-deutschland. The platform for the homeless>
    Copyright (C) <2016-2019>  <Oscar Arjun Singh Tark, Catie Carson, Nicholas Alexander Kearney, Jeremy Leresteux, Emilie Caron, Robinson Choe and all underlying members of Prana-deutschland>
    <Original programmers: Oscar Arjun Singh Tark, Robinson Choe, Nicholas Alexander Kearney, Jeremy Leresteux>

    Visitable link: www.prana-deutschland.de , for any inquiries contact at oscartark91@gmail.com

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
-->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../phpinclude/core/includer.php");
$includer->includes_contained(1, false);


draw_html("../htmlinclude/content.html");
draw_html_inside("../htmlinclude/top_banner.html", "content");
draw_html_inside("../htmlinclude/side_banner.html", "content");
draw_html_inside("../htmlinclude/nav_bar.html", "sidebanner");
draw_html_inside("../htmlinclude/side_banner_menu.html", "sidebanner");
draw_html_inside("../htmlinclude/copyright.html", "sidebanner");
draw_html_inside("../htmlinclude/dash.html", "content");
draw_html_inside("../htmlinclude/popup.html", "content");
draw_html_inside("../htmlinclude/langdiv.html", "content");
?>

<script>
    AJAX('parent', 0);
</script>