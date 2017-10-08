<head bgcolor="white">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Prana Deutschland</title>

    <?php include '../partials/_css.php' ?>
    <link href='https://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/Mainstyle.css"/>
    <link rel="stylesheet" href="../css/home.css"/>

    <?php include '../partials/_js.php' ?>
    <script src="../js/objects.js"></script>
    <script src="../js/forms.js"></script>
    <script src="../js/session.js"></script>


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
    <script>
    getLocation();
    </script>

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

    <?php
    // sometimes: include('/home/otark/public_html/phpinclude/sql.php');
    include('../phpinclude/helpers.php');
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
