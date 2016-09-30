<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gengue's shop Admin</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/theme.css">
    <link rel="stylesheet" href="/assets/css/shop.css">
    <link rel="stylesheet" href="/assets/bower_components/angular-ui-notification/dist/angular-ui-notification.min.css">
    <link href="/css/main.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
  <body class="pace-on pace-dot" ng-controller="HomeCtrl">

    <div class="pace-overlay"></div>
    <div class="menu navbar navbar-static-top header-logo-center-menu-below oxy-mega-menu text-caps" id="masthead">
        <div class="logo-navbar container-logo">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" data-target=".main-navbar" data-toggle="collapse" type="button"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a href="/admin"><h1>Gengue's Shop Admin</h1></a></li>
                    <div class="logo-sidebar"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="nav-container clearfix">
                <nav class="collapse navbar-collapse main-navbar">
                    <div class="menu-container">
                        <ul class="nav navbar-nav" id="menu-main">
                            <li class="menu-item dropdown"> <a href="/admin">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="/admin/products" ng-click="openAuthModal()">Productos</a>
                            </li>
                            <li class="menu-item">
                                <a href="/admin/sales" ng-click="openAuthModal()">Ventas</a>
                            </li>
                            <li class="menu-item">
                                <a href="/logout">Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div id="content" role="main">

    @yield('content')

        <footer id="footer">
            <section class="section subfooter">
                <div class="container">
                    <div class="row element-top-10 element-bottom-10 footer-columns-2">
                        <div class="col-sm-12">
                            <div class="sidebar-widget widget_text">
                                <div class="textwidget"> Genesis Guerrero Martinez </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="Iniciar sesion">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Iniciar sesion</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/login" method="POST">
                            {{ csrf_field() }}
                            <h2>Ingresa</h2>
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password">
                            <br>
                            <div class="centered">
                                <button class="btn btn-success" type="submit">Entrar</button>
                            </div>
                            </form>
                            <hr>
                            <div class="centered">
                                <button class="btn" style="background: #3b5998"><i class="fa fa-facebook"></i> Ingresar con facebook</button>
                                <button class="btn btn-danger"><i class="fa fa-google"></i> Ingresar con Google</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="/register" method="POST">
                            {{ csrf_field() }}
                            <h2>Ingresa</h2>
                            <h2>Registro</h2>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="password">

                                <label>Confirmar contraseña</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            <div class="centered">
                                <button class="btn btn-success" type="submit">Registrarse</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var _PRODUCTS = null;
        @if (isset($products))
            _PRODUCTS = {!! $products !!}
        @endif

        var _USER = null;
        @if (Auth::check())
            _USER = {{ Auth::user()->id }};
        @endif
    </script>

    @yield('javascript')

    <script type="text/javascript">
        var oxyThemeData = {
            navbarHeight: 130,
            navbarScrolled: 120,
            navbarScrolledPoint: 200,
            menuClose: 'off',
            scrollFinishedMessage: 'No more items to load.',
            hoverMenu:
            {
                hoverActive: true,
                hoverDelay: 200,
                hoverFadeDelay: 200
            },
            siteLoader: 'on'
        };
    </script>
    <script src="/assets/js/theme.min.js"></script>
    <script src="/js/underscore-min.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/assets/bower_components/angular-ui-notification/dist/angular-ui-notification.min.js"></script>
    <script src="/js/app.js"></script>
  </body>
</body>
</html>
