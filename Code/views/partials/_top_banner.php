<div id="top_banner" style="" >
    <a href="javascript:redirect(\'home\');">
        <div id="logo">
            <img src="../Assets/Images/logo/prana_logo_tool.png">
        </div>
    </a>
    <div id="lang_selector" style="float:right;">
        <script>
            document.write(code_snippets[0]);</script>
    </div>
    <script>
        dl_d(code_snippets[7]);
        dl_d(code_snippets[4]);
    </script>
    <div id="uacnt" style="">
        <a style="color: white;" href="javascript: if(session==1){redirect(\'profile\');}else{redirect(\'login\');}" id="login_text" href="#">
            <script>
                if(session==1){document.write(def_lang[35]); }else if (session!=1){ document.write(def_lang[0]); if(session!=1){document.write} }
            </script>
        </a>
        <script>
            if(session==0){document.write(" | ");}
        </script>
        <a style="color: white;" href="javascript:redirect(\'signup\');">
            <script>
                if(session==0){document.write(def_lang[6]);}
            </script>
        </a>
        <a href="javascript:redirect(\'logout\');" id="login_text" href="#" style="color: white;">
            <script>
                if(session==1){document.write(" | " + def_lang[1]); }
            </script>
        </a>
        <a href="javascript:login_form()" id="login_text" href="#"></a>
    </div>
</div>
