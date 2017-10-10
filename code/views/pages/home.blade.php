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

<nav class="navbar navbar-toggleable-md navbar-light bg-primary">
    <a class="navbar-brand" href="{{url('home')}}">
        <img src="{{asset('/images/logo/prana_logo_tool.png')}}">
    </a>
    {{-- language select --}}
    @include('partials._emergency_button')

    {{-- code snippets[0] --}}
    {{-- language select --}}
    @include('partials._language_select')
    {{-- end language select --}}
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            {{-- dl_d(code_snippets[7]); --}}
            {{-- @include('partials._code_snippets_7') --}}

            @include('partials._uacnt')

            {{-- dashboard("home") --}}
            @include('partials._dashboard_home')
        </div>
    </div>
</div>

<br><br><br><br><br><br>
@endsection
