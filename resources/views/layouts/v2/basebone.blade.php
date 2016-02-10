@extends('layouts.master')

{{-- Extend Page v1 --}}

{{-- ==============================
 适用页面:
============================== --}}

@section('wrapper')
    {{-- Site Content ========================= --}}
    <section id="content">
        @yield('content')
    </section>
@stop