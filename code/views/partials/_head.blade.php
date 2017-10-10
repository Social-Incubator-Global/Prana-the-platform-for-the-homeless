<head bgcolor="white">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Prana Deutschland @yield('title')</title>

    <link rel="stylesheet" href="{{DOC_ROOT}}/css/bootstrap.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{DOC_ROOT}}/css/Mainstyle.css"/>
    @yield('css')

    <script src="{{DOC_ROOT}}/js/bootstrap.min.js"></script>
    <script src="{{DOC_ROOT}}/js/objects.js"></script>
    <script src="{{DOC_ROOT}}/js/forms.js"></script>
    <script src="{{DOC_ROOT}}/js/session.js"></script>
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
