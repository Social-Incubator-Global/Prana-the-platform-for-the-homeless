
<!--
    <Prana-deutschland. The platform for the homeless>
    Copyright (C) <2016-2017>  <Oscar Arjun Singh Tark, Emilie Caron, Robinson Choe and all underlying members of Prana-deutschland>
    <Original programmers: Oscar Arjun Singh Tark, Robinson Choe>

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
-->
<?php session_start(); error_reporting(0);?>
<html>
    @include('partials._head')
<body bgcolor="#F2F2F2">

<!--SESSION VARIABLES-->
<script>
    var session = localStorage.getItem("session");
    var uname = localStorage.getItem("uname");
</script>
<center>
<div id="content">
    <script type="text/javascript">
    //dl_d(code_snippets[4]);
    top_menu("home0");
    </script>
    <br>
    <script type="text/javascript">
    dashboard("home");
    </script>
</div>
</center>
<br><br><br><br><br><br>
<div id="footer">
  <center><script>show_copyright();</script></center>
</div>
<script type="text/javascript">change_lang();</script>
</body>
</html>
