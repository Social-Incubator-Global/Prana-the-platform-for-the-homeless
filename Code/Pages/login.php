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
<?php error_reporting(0);?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prana : Login</title>
<head>
<link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../CSS/Mainstyle.css"/>
<link rel="stylesheet" href="../CSS/login.css"/>
<script src="../js/Objects.js"></script>
<script src="../js/forms.js"></script>
<script src="../js/session.js"></script>
<!--JS Variables-->
<script>  
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
  <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>

  <!-- Leave out Storage -->
  <!-- <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-storage.js"></script> -->

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
<div id="content">
<script>
top_menu("content", "login");
</script>
<center><br>
       <div id="login_content">
       <div id="Logo_login"><script>document.write(def_lang[0]);</script></div>
            <div id="beut_loggy">
            <form id="input_fm">
            <div id="unme_txt">
                 <script>document.write(def_lang[30]);</script>
            </div><br>
                 <input type="text" id="username_log" name="unme" maxlength="15" style="width: 300px; height: 33px;"></input><br>
            <div id="pwd_txt">
                 <script>document.write(def_lang[31]);</script>
            </div>
                 <input type="password" id="password_log" name="pwd" style="width: 300px; height: 33px;"></input>
                 <br>
<div id="sign_upbttn">

                 <input id="signup_log" type="button" onclick="javascript:redirect('signup');" name="pwd" style="width: 64px; height: 33px; background-color:#31859C; color: white;"></input></div>

                 <script>
                    var signup_text = def_lang[6];
                    document.getElementById("signup_log").value = signup_text;
                 </script>

<div id="login_button">

                 <input type="button" id="log_log" onclick="javasript: var al = []; al[0] = document.getElementById('username_log').value; al[1] = document.getElementById('password_log').value; login();" name="login_button" style="width: 70px; height: 33px;">
</div>
                 <script>
                    var login_text = def_lang[0];
                    document.getElementById("log_log").value = login_text;
                 </script>

            </form>
            </div>
            <br>
            <div id="forgot_txt">
            <script>
               document.write(def_lang[32] + "<a href=''>"+def_lang[33]+"</a>");
            </script>
            </div>
       </div>
<div id="footer">
    <br><center><script>document.write(def_lang[3])</script></center>
    <div id="type_"></div>
</div>
     </center>

<script>
function login()
{
    var uname_eml_log = document.getElementById("username_log").value;
    var pwd_log = document.getElementById("password_log").value;
    var snapshot, snapshot2, snapshot3;
    
    var pass= true;
    if(uname_eml_log == "")
    {
       pass = false;
       document.getElementById("username_log").style = "color: white; background-color: red; width: 300px; height: 33px;";
    }
    if(pwd_log == "")
    {
       pass = false;
       document.getElementById("password_log").style = "color: white; background-color: red; width: 300px; height: 33px;";
    }

    if(Boolean(pass)==true)
    {
         

        var ref = new Firebase("https://prana-deutschland.firebaseio.com/web/data/prna_users/" + uname_eml_log + "");
        ref.orderByChild("username_email").on("value", function(snapshot) {
           console.log(snapshot.val().username_email);
        ref.orderByChild("password").on("value", function(snapshot2) {
           console.log(snapshot2.val().password);
           ref.orderByChild("area").on("value", function(snapshot3) {
           
       if(snapshot.val().username_email == uname_eml_log)
       {
       if(snapshot2.val().password == pwd_log){
       session=1;
       uname= snapshot.val().username_email;
       localStorage.setItem("area", snapshot3.val().area);
       localStorage.setItem("session", session);
       localStorage.setItem("uname", uname);
       redirect('home');
       console.log("Session set to 1." );}
       } else{ console.log("Error, return value: " + snapshot.val()); }
       
        }, function (errorObject) {
           console.log("The read failed: " + errorObject.code);
        })
    })})
    }}
</script>
    </div>
</body>
</html>