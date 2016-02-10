@extends('layouts.v2.basebone')

{{-- Site Title --}}
@section('pagetitle', '登录 | Haku.moe')

{{-- Main Content --}}
@section('content')
    <div class="content-wrap nopadding">
        <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>
        <div class="section nobg full-screen nopadding nomargin">
            <div class="container vertical-middle divcenter clearfix">
                <div class="row center">
                    <a href="" class="standard-logo"><img src={{ URL::asset('images/logo-dark.png') }} alt="Logo"></a>
                </div>
                <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
                    <div class="panel-body" style="padding: 40px;">
                        {!! Form::open([
                            'id' => 'login-form', 'class' => 'nobottommargin', 'name' => 'login-form', 'route' => 'login', 'method' => 'post'
                        ]) !!}
                        <h3>登录到网站</h3>
                        <div class="col_full">
                            {!! Form::label('username', '用户名') !!}
                            {!! Form::text('username', '', ['id' => 'login-form-username', 'class' => 'form-control not-dark']) !!}
                        </div>
                        <div class="col_full">
                            {!! Form::label('password', '密码') !!}
                            {!! Form::password('password', ['id' => 'login-form-password', 'class' => 'form-control not-dark']) !!}
                        </div>
                        <div class="col_full nobottomargin">
                            <button class="button button-3d button-black nomargin" id="login-form-submit" name="submit"
                                    value="login">登录
                            </button>
                            <a href="#" class="fright">忘记密码?</a>
                        </div>
                        {!! Form::close() !!}

                        <div class="line line-sm"></div>

                        <div class="center">
                            <h4>切换到第三方登录:</h4>
                            <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
                            <span class="hidden-xs">or</span>
                            <a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>
                        </div>
                    </div>
                </div>
                {{-- Copyrights --}}
                @section('copyrights')
                    <div class="row center dark">
                        <small>Copyright &copy; All Rights Reserved by Aexcm Irvin.</small>
                    </div>
                @show
            </div>
        </div>
    </div>
@endsection

