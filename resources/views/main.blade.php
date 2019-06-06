
<html>
<head>
<title>FlorDEX</title>
<link rel="stylesheet" href="css/main.css"/>
</head>
<body>
    <section id="main">
        <div id="top">
            @yield('showtop')
            <div id="logout">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
        </div>
        <section id="gen">
            <nav id="menu">
                @yield('navig')
            </nav>
            <aside id="cont">
                    @yield('contenido')
            </aside>
        </section>
    </section>
</body> 
</html>