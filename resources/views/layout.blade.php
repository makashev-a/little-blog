<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon icon -->

    <title>Blog</title>

    <!-- common css -->
    <link rel="stylesheet" href="/css/front.css">

    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.js"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/favicon.png">

</head>

<body>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Blog</a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
                    <li><a href="/">Homepage</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                <li><a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav text-uppercase pull-right">
                    @if(Auth::check())
                        <li><a href="/profile">My profile</a></li>
                        <li><a href="/logout">Logout</a></li>
                    @else
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Login</a></li>
                    @endif
                </ul>

            </div>
            <!-- /.navbar-collapse -->


            <div class="show-search">
                <form role="search" method="get" id="searchform" action="#">
                    <div>
                        <input type="text" placeholder="Search and hit enter..." name="s" id="s">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>

@include('messages.success')
@include('messages.ban')

@yield('content')

<!--footer start-->
<div id="footer">
    <div class="footer-instagram-section">
        <h3 class="footer-instagram-title text-center text-uppercase">Instagram</h3>

        <div id="footer-instagram" class="owl-carousel">

            <div class="item">
                <a href="#"><img src="/images/ins-1.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-2.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-3.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-4.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-5.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-6.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-7.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-8.jpg" alt=""></a>
            </div>

        </div>
    </div>
</div>

<footer class="footer-widget-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <aside class="footer-widget">
                    <div class="about-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                        eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed voluptua. At vero eos et
                        accusam et justo duo dlores et ea rebum magna text ar koto din.
                    </div>
                    <div class="address">
                        <h4 class="text-uppercase">contact Info</h4>

                        <p>ahmadi98ahmadi@gmail.com</p>
                    </div>
                </aside>
            </div>

        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; 2021 <a href="#">Blog, </a> Made with <i
                            class="fa fa-heart"></i> by <a href="#">Akhmadi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- js files -->
<script src="/js/front.js"></script>
</body>
</html>
