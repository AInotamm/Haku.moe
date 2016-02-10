<div id="header-wrap">
    <div class="container clearfix">
        {{-- Logo # --}}
        <div id="logo">
            <a href="" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Logo"></a>
            <a href="" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="Logo"></a>
        </div>
        {{-- # Logo End --}}
        {{-- Primary Navigation # --}}
        <nav id="primary-menu">
            {{-- Menu --}}
            <ul>
                <li>
                    <a href=""><div>首页</div></a>
                </li>
            </ul>
            {{-- Search --}}
            <div id="top-search">
                <a href="" id="top-search-trigger">
                    <i class="icon-search3"></i>
                    <i class="icon-line-cross"></i>
                </a>
                {!! Form::open(['url' => '', 'method' => 'GET']) !!}
                    {!! Form::text('q', '', ['placeholder' => '搜索...', 'class' => 'form-control']) !!}
                {!! Form::close() !!}
            </div>
        </nav>
        {{-- Navigation End # --}}
    </div>
</div>