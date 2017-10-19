<div id="uacnt">
    {{-- if logged out --}}
    <a href="javascript: if(session==1){redirect('profile');}else{redirect('login');}" id="login_text">
        Login
        {{-- <script>
            if(session==1) { //if logged in
                document.write(def_lang[35]); // shows 'my prana'
            } else if (session != 1) { // if not looged in
                document.write(def_lang[0]); // shows login
            }
        </script> --}}
    </a>
    <span> | </span>
    {{-- <script>
        if(session == 0) {
            document.write(" | ");
        }
    </script> --}}
    <a href="javascript:redirect('signup');">
        Sign Up
        {{-- <script>
            if(session == 0) { //if not logged in
                document.write(def_lang[6]); // write 'sign up'
            }
        </script> --}}
    </a>
    <a href="javascript:redirect('logout');" id="login_text" href="#" style="color: white;">
        <script>
            if(session==1) { document.write(" | " + def_lang[1]); }
        </script>
    </a>
    <a href="javascript:login_form()" id="login_text" href="#"></a>
</div>
