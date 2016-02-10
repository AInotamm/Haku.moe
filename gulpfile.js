var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less([

        // assistant {{
        'helpers.less', 'layouts.less', 'responsive.less',
        // }}

        // blog {{
        'blog.less', 'dark.less',
        // }}

        // extra {{
        'events.less', 'extras.less', 'pagetitle.less',
        'portfolio.less', 'shortcodes.less', 'sliders.less',
        'topbar.less', 'typography.less', 'widgets.less',
        // }}

        // main {{
        'header.less', 'content.less', 'footer.less'
        // }}

    ]);
});
