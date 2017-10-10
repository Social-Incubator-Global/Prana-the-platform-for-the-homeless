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

<div class="container-fluid" {{-- id="content" --}}>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{url('home')}}">
            <img src="{{asset('/images/logo/prana_logo_tool.png')}}" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="row">
        <div class="col">
            {{-- top_menu("home0") --}}
            {{-- @include('partials._top_banner') --}}
            {{-- top banner --}}
            <div {{--id="top_banner"--}} style="" >
                <a href="{{url('home')}}">
                    <div {{-- id="logo" --}}>
                        <img src="{{BASE_URL}}/assets/images/logo/prana_logo_tool.png">
                    </div>
                </a>

                {{-- code snippets[0] --}}
                {{-- language select --}}
                @include('partials._language_select')
                {{-- end language select --}}

                {{-- dl_d(code_snippets[7]); --}}
                {{-- @include('partials._code_snippets_7') --}}

                {{-- dl_d(code_snippets[4]); --}}
                {{-- @include('partials._emergency_button') --}}

                <div {{-- id="uacnt" --}} style="">
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

            {{-- end top banner --}}
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
    </div>
    {{-- dashboard("home") --}}
    @include('partials._dashboard_home')
</div>

<br><br><br><br><br><br>
@endsection
