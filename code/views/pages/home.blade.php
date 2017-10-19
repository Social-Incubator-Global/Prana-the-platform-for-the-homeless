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

{{-- dashboard("home") --}}
<div class="row">
    <div class="col">
        <div id="logo" class="row mt-5">
            <div class="col">
                <img src="{{BASE_URL}}/assets/images/logo/prana_logo.png" class="img-fluid mx-auto d-block">
            </div>
        </div>
        {{-- search form --}}
        <div id="src_form" class="row mt-5">
            <div class="col d-flex justify-content-center">
                <div id="src_txt">
                    <script>dl_r(17);</script>
                </div>
                <form class="form-inline">
                    <input class="form-control" type="text" value="<script>dl_r(18);</script>" name="src_bx" id="src_bx"
                        onclick="javscript:val=document.getElementById('src_bx').value;if(val==''+dl_r(18)+''){remove_value('src_bx');}"
                        onblur="val=document.getElementById('src_bx').value;if(val==''){document.getElementById('src_bx').value='+dl_r(18)+';}">
                    <select class="form-control" id="src_in" value="In"></select>
                    <input class="form-control" type="button" value=">" name="src_bx"
                        {{-- style="width: 35px; height: 33px; background-color: rgba(9, 103, 126, 1.0);" --}}
                        onclick="javascipt:val=document.getElementById('src_bx').value; redirect('search');">
                </form>
            </div>
        </div>
        {{-- home buttons --}}
        <div id="home_buttons" class="row d-flex justify-content-center mt-5">
            <ul class="list-inline">
                <li class="list-inline-item"
                    <a href="javascript:redirect('content', 'food', '+get_local("area")+');">
                        <img src="{{BASE_URL}}/assets/images/icons/icon_food.png" class="icon">
                        <script> dl_r(19);</script>
                    </a>
                </li>
                <li class="list-inline-item"
                    <a href="javascript:redirect('content','housing','+get_local("area")+');">
                        <img src="{{BASE_URL}}/assets/images/icons/icon_housing.png" class="icon">
                        <script> dl_r(20);</script>
                    </a>
                </li>
                <li class="list-inline-item"
                    <a href="javascript:redirect('content','medical', '+get_local("area")+');">
                        <img src="{{BASE_URL}}/assets/images/icons/Icon_health.png" class="icon">
                        <script>dl_r(21);</script>
                    </a>
                </li>
                <li class="list-inline-item"
                    <a href="javascript:redirect('content','legal', '+get_local("area")+');">
                        <img src="{{BASE_URL}}/assets/images/icons/icon_legal and advice.png" class="icon">
                        <script>dl_r(22);</script>
                    </a>
                </li>
                <li class="list-inline-item"
                    <a href="javascript:redirect('content','study', '+get_local("area")+');">
                        <img src="{{BASE_URL}}/assets/images/icons/icon_study2.png" class="icon">
                        <script>dl_r(23);</script>
                    </a>
                </li>
                <li class="list-inline-item"
                    <a href="javascript:redirect('content','jobs', '+get_local("area")+');">
                        <img src="{{BASE_URL}}/assets/images/icons/icon_jobs.png" class="icon">
                        <script>dl_r(24);</script>
                    </a>
                </li>
                <li class="list-inline-item"
                    <a href="javascript:redirect('content_modular','', '+get_local("area")+');">
                        <img src="{{BASE_URL}}/assets/images/icons/icon_.png" class="icon">
                        <script>dl_r(108);</script>
                    </a>
                </li>
            </ul>
        </div>
        <script>fill_search_type("src_in");</script>
    </div>
</div>
@endsection
