@extends('main')

@section('title', ' | Home') @endsection

@section('css')
<link rel="stylesheet" href="{{DOC_ROOT}}/css/home.css"/>
@endsection

@section('content')
<!--SESSION VARIABLES-->
<script>
    var session = localStorage.getItem("session");
    var uname = localStorage.getItem("uname");
</script>

{{-- center --}}
<div class="container-fluid" id="content">
    <div class="row">
        <div class="col">
            @include('partials._top_banner') {{-- top_menu("home0") --}}
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
    </div>
    @include('partials._dashboard_home') {{-- dashboard("home") --}}
</div>

<br><br><br><br><br><br>
@endsection
