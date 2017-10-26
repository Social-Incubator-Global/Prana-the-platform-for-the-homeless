<nav class="navbar navbar-toggleable-md navbar-light bg-primary" id="main-nav">
    <div class="mr-auto" id='emergency_button_div'>
        <formx>
            <input id='emergency_call'
                src='http://local.prana.com/assets/images/prn_ico/call.png'
                style='background-color: red;'
                type='image'
                onclick='javascript:show_drop_down();' />
            <input class='emergency_button' id='emergency_button' type='button'
                style='background-color:red; height:30px;'
                onclick='document.getElementById("myDropdown").classList.toggle("show");' value='Emergency'>
            </input>
    </form>
</div>
<div id="myDropdown" style='color:black; font-family:Arial; font-size:14px;' class="dropdown-content">
    <div style='background-color:rgb(9, 103, 126);'>
        <center>
            <br>
            <img src='http://local.prana.com/assets/images/icons/icon_health1.png' height='100px' width='100px'/>
            <br>
            <br>
        </center>
    </div>
    <div style='background-color:red; color:white;'>
        <br>
        <div style='margin-left:12px; margin-right:12px;'>
            <p>At the moment we do not provide direct calls to any of the listed emergency services, below is a list of numbers you may call using a public or private phone:</p>
        </div>
        <br>
    </div>
    <br>
    <a id="artzmob_cari_drop_content" href="#">
        Artzmobil Caritas:<br>Tel: -/-<br>Address: -/-<input style='float: right; height:19px;' type='image' src='/Volumes/Macintosh HD/nicholas/root/prana/code/assets/images/prn_ico/led_icons/marker.png'></input><input style='float: right; height: 30px;' type='button' value='View in map'></input>
    </a>
    <a id="pol_drop_content" href="#">Polizei für die obdachlosen:<br>Tel: -/-<br>Address: -/-
        <input style='float: right; height:19px;' type='image'
        src='/Volumes/Macintosh HD/nicholas/root/prana/code/assets/images/prn_ico/led_icons/marker.png'>
    </input>
    <input style='float: right;' type='button' value='View in map'></input>
    </a>
</div>

<div id="login-box">
    <a href="<?php echo ($_SESSION['logged_in']) ? 'profile.php' : 'login.php'?>" id="login_text">
        <?php echo ($_SESSION['logged_in']) ? "My Prana" : "Login"; ?>
    </a>
    <span> | </span>
    <a href="<?php echo ($_SESSION['logged_in']) ? 'logout.php' : 'signup.php'?>">
        <?php echo ($_SESSION['logged_in']) ? 'Logout' : 'Signup'; ?>
    </a>
    <a href="javascript:redirect('logout');" id="login_text" href="#" style="color: white;">
        <script>
        if(session==1) { document.write(" | " + def_lang[1]); }
        </script>
    </a>
    <a href="javascript:login_form()" id="login_text" href="#"></a>
</div>
<form class="form-inline float-right" id="lang_selector">
    <select id="lang_select" onChange="javascript:var ndx=document.getElementById('lang_select').selectedIndex; apply_language(ndx); if(location_!='posting'){redirect(location_, home_type, area);}else{redirect(location_, ID, area);}"></select>
    <script>
    var index = 0;
    for (index = 0; index < def_langs.length; ++index) {
        var select = document.getElementById("lang_select");
        select.options[select.options.length] = new Option(def_langs[index], def_langs[index]);
    }
    change_lang();
    </script>
</form>
</nav>
