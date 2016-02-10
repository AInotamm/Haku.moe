<!doctype html>
<html dir="ltr" lang="zh-CN">
<head>
    {{-- Meta Infomation ============ --}}
    @section('meta')
        @include('layouts.extra.meta')
    @show

    {{-- Stylesheets ================ --}}
    @section('stylesheets')
        @include('layouts.extra.style')
    @show

    {{-- External Javascripts ======= --}}
    @section('javascripts')
        @include('layouts.extra.script')
    @show

    {{-- Document Title ============== --}}
    <title>@yield('pagetitle')</title>

    {{-- Extra Tags ================== --}}
    @yield('extratags')
</head>
<body class="stretched">
{{-- Main Wrapper ============================= --}}
<div id="wrapper" class="clearfix">
    @yield('wrapper')
</div>

{{-- Go to top --}}
<div id="gotoTop" class="icon-angle-up"></div>

{{-- Footer Script --}}
<script type="text/javascript" src={{ URL::asset('js/functions.js') }}></script>
</body>
</html>