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
<title>Prana : Sign up</title>

<head>
<link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../CSS/Mainstyle.css"/>
<link rel="stylesheet" href="../CSS/signin.css"/>
<script src="../js/Objects.js"></script>
<script src="../js/forms.js"></script>
<script src="../js/session.js"></script>
<script src="../Assets/Scripts/CryptoJS/rollups/sha256.js"></script>
<script src="../Assets/Scripts/CryptoJS/components/sha256.js"></script>
<!--<script src="https://www.gstatic.com/firebasejs/3.2.1/firebase.js"></script> -->

<!--<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBAiI7LmsVJTTG-MITrXmdEi8qNw78q3SM",
    authDomain: "prana-deutschland.firebaseapp.com",
    databaseURL: "https://prana-deutschland.firebaseio.com",
    storageBucket: "prana-deutschland.appspot.com",
  };
  firebase.initializeApp(config);
</script> -->
<!--  <script src="https://cdn.firebase.com/js/client/2.4.2/firebase.js"></script>-->
<!--  <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-app.js"></script> -->
<!--  <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script> -->
<!--  <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script> --> 

  <!-- Leave out Storage -->
  <!-- <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-storage.js"></script> -->

<!-- RC firebase -->
<script src="https://www.gstatic.com/firebasejs/3.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.6.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.6.1/firebase-messaging.js"></script>

<!-- Leave out Storage -->
<!-- <script src="https://www.gstatic.com/firebasejs/3.6.1/firebase-storage.js"></script> -->

<script src="https://www.gstatic.com/firebasejs/3.6.3/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCSzBqGgPlg3Dm6HzPwQ-dCPS9a1rTGpSY",
    authDomain: "rc-prana-login.firebaseapp.com",
    databaseURL: "https://rc-prana-login.firebaseio.com",
    storageBucket: "rc-prana-login.appspot.com",
    messagingSenderId: "902639431847"
  };
  firebase.initializeApp(config);
</script>
  
<script src="https://cdn.firebase.com/js/client/2.4.2/firebase.js"></script>  
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
<!--SESSION VARIABLES-->
<div id="content">
<script>
set_location("signup");
var session = localStorage.getItem("session");
var uname = localStorage.getItem("uname");
top_menu('content', "signup");
</script><br>
     <center>
       <div id="login_content">
       <div id="Logo_login"><script>document.write(def_lang[6])</script></div>
            <div id="beut_loggy">
            <form id="input_fm">
            <div id="unme_txt">
                  <script>document.write(def_lang[7])</script>
            </div>
                 <input type="text" id="username_su" name="unme" maxlength="15" style="width: 300px; height: 33px;"></input><br>
            <div id="f_nme">
                 <script>document.write(def_lang[8])</script>
            </div>
                 <input type="text" id="firstname_su" name="first_nme" style="width: 300px; height: 33px;"></input><br>
            <div id="l_nme">
                 <script>document.write(def_lang[9])</script>
            </div>
                 <input type="text" id="lastname_su" name="last_nme" style="width: 300px; height: 33px;"></input><br>
            <div id="Area">
                 <script>document.write(def_lang[10])</script>
            </div>
                 <select id="area_su" name="s_area" style="float: left; margin-left: 10px; border: 1px solid black; width: 208px; height: 33px; background-color:#31859C; color: white;">
                 </select><br><br><br><br>
                 <script>
                 var index = 0;
                 for (index = 0; index < def_areas_berlin.length; ++index) {
                          var select = document.getElementById("area_su");
                          select.options[select.options.length] = new Option(def_areas_berlin[index],def_areas_berlin[index]);
                 }
                 </script>
            <div id="pwd_txt">
                 <script>document.write(def_lang[11])</script>
            </div>
                 <input type="password" id="password_su" value="" name="pwd" style="width: 300px; height: 33px; border: 1px solid #FF7F27"></input><br>
                 
            </form>
            <form id="bttns" style="width:78%;">
            <div id="sign_upbttn">
                 <input id="signup_su" type="button" onclick="signup();" name="pwd" style="width: 64px; height: 33px; background-color:#31859C; color: white;"></input></div>
                 <script>
                    var signup_text = def_lang[6];
                    document.getElementById("signup_su").value = signup_text;
                 </script>
            </form>
            </div>
            <div id="required_su">
            <script>document.write(def_lang[12])</script>
           
            </div>
       <!--<button onclick="write_to_firebase();">write</button>
       <button onclick="erase_from_firebase();">erase</button>
       <button onclick="read_from_firebase();">read</button>-->
       </div>
<div id="footer">
    <br><center><script>document.write(def_lang[3])</script></center>
    <div id="type_"></div>
</div>
     </center>
</div>
<script>
// erase user profile from firebase
function erase_from_firebase() 
{
    
}
function read_from_firebase()
{
    var myFirebaseRef = new Firebase("https://rc-prana-login.firebaseio.com/data");
    
    //read data from firebase
    myFirebaseRef.on('value', function(snapshot) {JSON.stringify(console.log(snapshot.val()));});
}
// write user profile to firebase    
function write_to_firebase() 
{
  

    var myFirebaseRef = new Firebase("https://rc-prana-login.firebaseio.com/data");
    var myFirebaseRef0 = new Firebase("https://rc-prana-login.firebaseio.com/data0");
    //create user profile
    var eml = document.getElementById("username_su").value;
    var fst = document.getElementById("firstname_su").value;
    var lst  = document.getElementById("lastname_su").value;
    var ar  = document.getElementById("area_su").selectedIndex;
    var pwd   = document.getElementById("password_su").value;
    //write profile to database
    
    //note: use 'push' instead of 'set'
    //      in order to generate unique ID for each profile
    myFirebaseRef0.set(null,function(error){if (error) {alert("something is wrong!");}
    else {alert("data saved successfully!");}});

    var eml_new = eml.split(".").join("*");
    myFirebaseRef.child(eml_new).set({
        first: fst,
        last: lst,
        area: ar,
        password: pwd
    });
    alert("Done!");
}
    
function signup()
{
    
    //get input strings from input tabs "username_su" and "password_su"
    var eml = document.getElementById("username_su").value;
    var pwd = document.getElementById("password_su").value;
    var empty = false;
    var redir = true;
    if (eml === "" || pwd === "") {
      document.getElementById("username_su").style = "color: white; background-color: green; width: 300px; height: 33px;";  
      document.getElementById("password_su").style = "color: white; background-color: green; width: 300px; height: 33px;";
      empty = true;
    }
    //firebase sign-up
    firebase.auth().createUserWithEmailAndPassword(eml, pwd)
    .catch(function(error) 
        {
                 // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        redir = false;
        if (empty) {
            alert('empty inputs');
         } else if (errorCode == 'auth/email-already-in-use'){
            alert('user already exists');
         } else {
            alert(errorMessage);
         }
        console.log(error);
        }
      ).then(function() {alert(redir.toString()); if (redir) {success();}});
     
}
//asynchronicity of promise!

function sign_up()
{
    var uname_eml_su = document.getElementById("username_su").value;
    var fst_nme_su = document.getElementById("firstname_su").value;
    var lst_nme_su = document.getElementById("lastname_su").value;
    var are_su = document.getElementById("area_su").selectedIndex;
    var pwd = document.getElementById("password_su").value;
    
    var pass= true;
    if(uname_eml_su == "")
    {
       pass = false;
       document.getElementById("username_su").style = "color: white; background-color: green; width: 300px; height: 33px;";
    }
    if(pwd == "")
    {
       pass = false;
       document.getElementById("password_su").style = "color: white; background-color: red; width: 300px; height: 33px;border: 1px solid #FF7F27;";
    }
    if(fst_nme_su == "")
    {
       pass = false;
       document.getElementById("firstname_su").style = "color: white; background-color: red; width: 300px; height: 33px;";
    }
    if(lst_nme_su == "")
    {
       pass = false;
       document.getElementById("lastname_su").style = "color: white; background-color: red; width: 300px; height: 33px;";
    }

    if(Boolean(pass)==true)
    {
        //var hash = CryptoJS.SHA256(pwd); 
        //hash=hash.toString(CryptoJS.enc.Base64);
        
        //check user exists
        // Get a database reference to our posts
        var ref = new Firebase("https://prana-deutschland.firebaseio.com/web/data/prna_users/" + uname_eml_su + "");
        // Attach an asynchronous callback to read the data at our posts reference
        ref.orderByChild("username_email").on("value", function(snapshot) {
           console.log(snapshot.val());
           
       if(snapshot.val() == null)
       {
           //USER DOESN'T EXIST. CREATE USER.
       
        var ref = new Firebase("https://prana-deutschland.firebaseio.com/web/data/");
        console.log("creating user!");
        var usersRef = ref.child("prna_users");
        usersRef.child(uname_eml_su).set({
                   username_email: uname_eml_su,
                   first_name: fst_nme_su,
                   last_name: lst_nme_su,
                   area: are_su,
                   password: pwd},function(error){ success();});
       
       
       } 
       else
       { 
       console.log("Error, User exists.");
       
       document.getElementById("username_su").style = "color: red; border: 1px solid red; width: 300px; height: 33px;";
       document.getElementById("firstname_su").value = "";
       document.getElementById("lastname_su").value = "";
       document.getElementById("password_su").value = "";
       document.getElementById("username_su").value = "USERNAME ALREADY IN USE";
       document.getElementById("area_su").selectedIndex = 0;
       }
       
        }, function (errorObject) {
           console.log("The read failed: " + errorObject.code);
        
    })} 
    }

function success()
{
redirect('login');
}


</script>
</body>
</html>