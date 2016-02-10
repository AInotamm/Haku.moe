@extends('layouts.v1.basebone')

@section('pagetitle', '注册 | Haku.moe')

{{-- Wrapper --}}
@section('wrapper')
    {{-- Header --}}
    @section('header')
        @include('layouts.v1.header')
    @endsection
    {{-- Page Crumb --}}
    @section('breadcrumb')
        <section id="page-title">
            <div class="container clearfix">
                <h1>帐号注册</h1>
                <ol class="breadcrumb">
                    <li><a href="">首页</a></li>
                    <li><a href="">用户中心</a></li>
                    <li class="active">注册</li>
                </ol>
            </div>
        </section>
    @endsection
    {{-- Content --}}
    @section('container')
        <div class="divcenter col_half nobottommargin">
            <h3>还没有帐号吗？现在开始注册。</h3>
            {!! Form::open(['id' => 'register-form', 'name' => 'register', 'class' => 'nobottommargin', 'route' => 'register', 'method' => 'POST']) !!}
                <div class="col_half">
                    {!! Form::label('name', '用户名：') !!}
                    {!! Form::text('name', '', ['id' => 'register-form-name', 'class' => 'form-control']) !!}
                </div>
                <div class="col_half col_last">
                    {!! Form::label('email', '邮箱地址：') !!}
                    {!! Form::text('email', '', ['id' => 'register-form-email', 'class' => 'form-control']) !!}
                </div>
                <div class="clear"></div>
                <div class="col_half">
                    {!! Form::label('nickname', '用户昵称：') !!}
                    {!! Form::text('nickname', '', ['id' => 'register-form-username', 'class' => 'form-control']) !!}
                </div>
                <div class="col_half col_last">
                    {!! Form::label('phone', '手机号：') !!}
                    {!! Form::text('phone', '', ['id' => 'register-form-phone', 'class' => 'form-control']) !!}
                </div>
                <div class="clear"></div>
                <div class="col_half">
                    {!! Form::label('password', '密码：') !!}
                    {!! Form::password('password', ['id' => 'register-form-password', 'class' => 'form-control']) !!}
                </div>
                <div class="col_half col_last">
                    {!! Form::label('repassword', '确认密码：') !!}
                    {!! Form::password('password', ['id' => 'register-form-repassword', 'class' => 'form-control']) !!}
                </div>
                <div class="clear"></div>
                <div class="col_full nobottommargin">
                    <button class="button button-3d button-black nomargin" id="register-form-submit" name="submit" value="register">马上注册</button>
                </div>
            {!! Form::close() !!}
        </div>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.v1.footer')
@stop