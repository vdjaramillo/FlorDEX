<html>
<head>
<title>FlorDEX</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <section id="background" style="position:absolute; left:0; top:0; width:100%; height:100%">
            <?php
                $r=rand(1,4); 
                $ruta = asset('img/c'.$r);
                echo '<img class="img-fluid" style="width:100%; height:99%" src="'.$ruta.'.webp" />';
            ?>
    </section> 
    <section id="main" class="col-md-12">
        <div id="top"  class="col-md">
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
            <nav id="menu" class="col-md-4">
                @yield('navig')
            </nav>
            <aside id="cont" class="col-md-7">
                @yield('contenido')
            </aside>
        </section>
    </section>
</body> 
</html>