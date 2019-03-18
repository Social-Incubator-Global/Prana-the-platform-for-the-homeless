<!--
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
-->
<?php session_start(); error_reporting(0);?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Prana : Login</title>
    <?php include '../partials/_css.php' ?>
    <link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/Mainstyle.css"/>
    <link rel="stylesheet" href="../css/login.css"/>

    <?php include '../partials/_js.php' ?>
    <script src="../js/Objects.js"></script>
    <script src="../js/forms.js"></script>
    <script src="../js/session.js"></script>
    <script src="../js/functions.js"></script>

    <!--  Do we need any of this from here.... -->

                  <!--JS Variables-->
                  <!-- <script>
                  set_location("login");
                  var session = localStorage.getItem("session");
                  if(session==1){redirect('home');}
                </script>
                <script src="https://www.gstatic.com/firebasejs/3.2.1/firebase.js"></script>
                <script>
                // Initialize Firebase
                var config = {
                apiKey: "AIzaSyBAiI7LmsVJTTG-MITrXmdEi8qNw78q3SM",
                authDomain: "prana-deutschland.firebaseapp.com",
                databaseURL: "https://prana-deutschland.firebaseio.com",
                storageBucket: "prana-deutschland.appspot.com"
                };
                firebase.initializeApp(config);
                </script>
                <script src="https://cdn.firebase.com/js/client/2.4.2/firebase.js"></script>
                <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-app.js"></script>
                <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script>
                <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script> -->

                <!-- Leave out Storage -->
                <!-- <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-storage.js"></script> -->

    <!-- to here? -->
    <!-- if not, please delete -->

    <?php
    include('../phpinclude/sql.php');
    include('../phpinclude/functions.php');
    include('../phpinclude/objects.php');
    include('../phpinclude/content_functions.php');
    get_languages();
    load_languages_ToArrays("");
    $resu_ = get_filters_URL("home");
    apply_language($resu_[0]);
    ?>
  </head>
  <body bgcolor="#F2F2F2">
    <script>
    top_menu("content", "login");
    </script>
    <div id="content">
      <center>
        <br>
        <div id="login_content">
          <div id="Logo_login">
            <script>document.write(def_lang[0]);</script>
          </div>

          <form id="input_fm" action="./process.php" method="POST" onsubmit="return validateLogin()">
            <p>
              <label>Username:</label>
              <input type="text" name="username" id="usr-input" />
            </p>
            <p>
              <label>Password:</label>
              <input type="password" name="password" id="pass-input"/>
            </p>
            <p style="margin-top:15px">
              <input type="submit" value="Login" />
            </p>
          </form>

          <br>
          <div id="forgot_txt">
            <script>
            document.write(def_lang[32] + "<a href=''>"+def_lang[33]+"</a>");
            </script>
          </div>
        </div>
        <div id="footer">
          <br>
          <center>
            <script>document.write(def_lang[3])</script>
          </center>
          <div id="type_"></div>
        </div>
      </center>
    </div>
  </body>
</html>
