<html lang="ja">
    <head>
        <title></title>
        @yield('link')
    </head>
    <body>
        @include('components.header')
        
        <div class="modal-contents-wrapper">
            @yield('modal-contents')
        </div>
        @yield('js')
    </body>
</html>
