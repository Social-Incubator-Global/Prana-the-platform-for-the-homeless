<div id="uacnt" style="">
    <a style="color: white;" href="javascript: if(session==1){redirect('profile');}else{redirect('login');}" id="login_text" href="#">
        <script>
            if(session==1){document.write(def_lang[35]); }else if (session!=1){ document.write(def_lang[0]); if(session!=1){document.write} }
        </script>
    </a>
    <script>
        if(session==0)
        {
            document.write(" | ");
        }
    </script>
    <a style="color: white;" href="javascript:redirect(\'signup\');">
        <script>
            if(session==0){document.write(def_lang[6]);}
        </script>
    </a>
    <a href="javascript:redirect('logout');" id="login_text" href="#" style="color: white;">
        <script>
            if(session==1){document.write(" | " + def_lang[1]); }
        </script>
    </a>
    <a href="javascript:login_form()" id="login_text" href="#"></a>
</div>
