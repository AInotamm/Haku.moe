@extends('layouts.master')

{{-- Extend Page v1 --}}

{{-- ==============================
 适用页面:
============================== --}}

@section('wrapper')
    {{-- Header =============================== --}}
    <header id="header" class="full-header">
        @yield('header')
    </header>

    {{-- Breadcrumb =========================== --}}
    @yield('breadcrumb')

    {{-- Site Content ========================= --}}
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                @yield('container')
            </div>
        </div>
    </section>

    {{-- Footer =============================== --}}
    <footer id="footer" class="dark">
        <div class="container">
            @yield('footer')
        </div>

        {{-- Copyrights ======================= --}}
        <div id="copyrights">
            <div class="container clearfix">
                @yield('copyrights')
            </div>
        </div>
    </footer>
@stop