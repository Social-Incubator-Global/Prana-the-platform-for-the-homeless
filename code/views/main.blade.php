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

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Prana Deutschland @yield('title')</title>

        <link rel="stylesheet" href="{{BASE_URL}}/css/bootstrap.min.css"/>
        <link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{BASE_URL}}/css/Mainstyle.css"/>
        @yield('css')

        <script src="{{BASE_URL}}/js/bootstrap.min.js"></script>
        <script src="{{BASE_URL}}/js/objects.js"></script>
        <script src="{{BASE_URL}}/js/forms.js"></script>
        <script src="{{BASE_URL}}/js/session.js"></script>
        @yield('js')

        <!--Variables-->
        <script>
            load_localstorage();
            localStorage.setItem("session_vars_resume", 1);
            var session = localStorage.getItem("session");
            var uname = localStorage.getItem("uname");
            var ID = localStorage.getItem("ID");
            var home_type = localStorage.getItem("home_type");
            var sql_ = localStorage.getItem("sql_");
            var area = localStorage.getItem("area");
            var paid_type = localStorage.getItem("paid_type");
        </script>

        <!--Init Functions-->
        <script>getLocation();</script>

        <script src="https://www.gstatic.com/firebasejs/3.2.1/firebase.js"></script>
        <script>
            // Initialize Firebase
            var config = {
                apiKey: "AIzaSyBAiI7LmsVJTTG-MITrXmdEi8qNw78q3SM",
                authDomain: "prana-deutschland.firebaseapp.com",
                databaseURL: "https://prana-deutschland.firebaseio.com",
                storageBucket: "prana-deutschland.appspot.com",
            };
            firebase.initializeApp(config);
        </script>

        {{ get_languages() }}
        {{ load_languages_ToArrays("") }}
        {{ apply_language($resu_[0]) }}
    </head>
    <body bgcolor="#F2F2F2">
        {{-- nav bar --}}
        <nav class="navbar navbar-toggleable-md navbar-light bg-primary" id="main-nav">
            <a class="navbar-brand" href="{{url('home')}}">
                <img src="{{asset('/images/logo/prana_logo_tool.png')}}">
            </a>
            {{-- emergency button --}}
            @include('partials._emergency_button')
            {{-- login / signup buttons --}}
            @include('partials._uacnt')
            {{-- language select --}}
            @include('partials._language_select')
        </nav>
        {{-- main-content --}}
        <div class="container-fluid">
            @yield('content')
        </div>
        {{-- footer --}}
        <div id="footer" class="row text-center fixed-bottom">
            <div class="col">
                <script>show_copyright();</script>
            </div>
        </div>
        <script type="text/javascript">change_lang();</script>
    </body>
</html>
