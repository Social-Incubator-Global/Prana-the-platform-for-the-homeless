@extends('main')

@section('title', ' | Home') @endsection

@section('css')
<link rel="stylesheet" href="{{BASE_URL}}/css/home.css"/>
@endsection

@section('content')
<!--SESSION VARIABLES-->
<script>
var session = localStorage.getItem("session");
var uname = localStorage.getItem("uname");
</script>
<center>
    <div id="content">
        <script type="text/javascript">
        //dl_d(code_snippets[4]);

        // top_menu("home0");
        @include('partials._top_banner')
        </script>
        <br>
        {{-- <script type="text/javascript">
        dashboard("home");
        </script> --}}
        @include('partials._dashboard_home')
    </div>
</center>
<br><br><br><br><br><br>
<div id="footer">
    <center><script>show_copyright();</script></center>
</div>
<script type="text/javascript">change_lang();</script>
@endsection
