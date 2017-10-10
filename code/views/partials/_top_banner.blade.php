<div id="top_banner" style="" >
    <a href="{{url('home')}}">
        <div id="logo">
            <img src="/assets/images/logo/prana_logo_tool.png">
        </div>
    </a>
    @include('partials._language_select') {{-- code snippets[0] --}}
    @include('partials._code_snippets_7') {{-- dl_d(code_snippets[7]); --}}
    @include('partials._emergency_button') {{-- dl_d(code_snippets[4]); --}}
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
        <a href="javascript:redirect(\'logout\');" id="login_text" href="#" style="color: white;">
            <script>
                if(session==1){document.write(" | " + def_lang[1]); }
            </script>
        </a>
        <a href="javascript:login_form()" id="login_text" href="#"></a>
    </div>
</div>
