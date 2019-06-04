
<html>
<head>
<title>FlorDEX</title>
<link rel="stylesheet" href="css/main.css"/>
</head>
<body>
    <section id="main">
        <div id="top">
            @yield('showtop')
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