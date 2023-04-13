<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>XemChùa</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('dist/img/fevicon.png') }}" type="image/gif" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<style>
    .site-navbar>ul>li>ul {
        position: absolute;
        top: 29px;
        display: none;
    }

    .site-navbar ul li:hover ul {
        display: block;
    }

    .site-navbar>ul>li>.search-container {
        position: absolute;
        top: 29px;
        display: none;
    }

    .site-navbar ul li:hover .search-container {
        display: block;
    }
</style>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('dist/img/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <div class="full_bg">
        <!-- header -->
        <header class="header-area">
            <div class="container">
                <div class="row d_flex">
                    <div class=" col-md-3 col-sm-3">
                        <div class="logo">
                            <a href="/">XemChùa</a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="navbar-area">
                            <nav class="site-navbar">
                                <ul id="list-cate">
                                    <li class="d_none"><a href="Javascript:void(0)"><i class="fa fa-user"
                                                aria-hidden="true"></i></a>
                                        <ul>
                                            @if (Route::has('login'))
                                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                                    @auth
                                                        @php
                                                            $user = Auth::user();
                                                        @endphp

                                                        @if ($user->role != 2)
                                                            <a href="/post">Quản lý</a>
                                                        @endif
                                                        <a href="/infomation">Thông tin</a>
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf
                                                            <button type="submit">logout</button>
                                                        </form>
                                                    @else
                                                        <a href="{{ route('login') }}"
                                                            class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                                                            in</a>

                                                        @if (Route::has('register'))
                                                            <a href="{{ route('register') }}"
                                                                class=" text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                                        @endif
                                                    @endauth
                                                </div>
                                            @endif
                                        </ul>
                                    </li>
                                    <li class="d_none">
                                        <a href="Javascript:void(0)">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </a>
                                        <div class="search-container">
                                            <form action="/search" method="POST">
                                                @csrf
                                                <input type="text" placeholder="Search.." name="search">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                                <button class="nav-toggler">
                                    <span></span>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header inner -->
        <!-- top -->
        <div class="slider_main">
            <!-- carousel code -->
            <div id="banner1" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#banner1" data-slide-to="0" class="active"></li>
                    <li data-target="#banner1" data-slide-to="1"></li>
                    <li data-target="#banner1" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <!-- first slide -->
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="carousel-caption relative">
                                <div class="row d_flex">
                                    <div class="col-md-5">
                                        <div class="creative">
                                            <h1>Spa <br>Center </h1>
                                            <p>commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint</p>
                                            <a class="read_more" href="Javascript:void(0)">Contact us</a>
                                            <a class="read_more" href="Javascript:void(0)">Read More</a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row mar_right">
                                            <div class="col-md-6">
                                                <div class="agency">
                                                    <figure><img src="{{ asset('dist/img//img1.png') }}"
                                                            alt="#" /></figure>
                                                    <div class="play_icon">
                                                        <a class="play-btn" href="javascript:void(0)"><img
                                                                src="{{ asset('dist/img/play_icon.png') }}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="agency">
                                                    <figure><img src="{{ asset('dist/img/img2.png') }}"
                                                            alt="#" /></figure>
                                                    <div class="play_icon">
                                                        <a class="play-btn" href="javascript:void(0)"><img
                                                                src="{{ asset('dist/img/play_icon.png') }}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- second slide -->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="carousel-caption relative">
                                <div class="row d_flex">
                                    <div class="col-md-5">
                                        <div class="creative">
                                            <h1>Spa <br>Center </h1>
                                            <p>commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint</p>
                                            <a class="read_more" href="Javascript:void(0)">Contact us</a>
                                            <a class="read_more" href="Javascript:void(0)">Read More</a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row mar_right">
                                            <div class="col-md-6">
                                                <div class="agency">
                                                    <figure><img src="{{ asset('dist/img/img1.png') }}"
                                                            alt="#" /></figure>
                                                    <div class="play_icon">
                                                        <a class="play-btn" href="javascript:void(0)"><img
                                                                src="{{ asset('dist/img/play_icon.png') }}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="agency">
                                                    <figure><img src="{{ asset('dist/img/img2.png') }}"
                                                            alt="#" /></figure>
                                                    <div class="play_icon">
                                                        <a class="play-btn" href="javascript:void(0)"><img
                                                                src="{{ asset('dist/img/play_icon.png') }}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- third slide-->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="carousel-caption relative">
                                <div class="row d_flex">
                                    <div class="col-md-5">
                                        <div class="creative">
                                            <h1>Spa <br>Center </h1>
                                            <p>commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint</p>
                                            <a class="read_more" href="Javascript:void(0)">Contact us</a>
                                            <a class="read_more" href="Javascript:void(0)">Read More</a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row mar_right">
                                            <div class="col-md-6">
                                                <div class="agency">
                                                    <figure><img src="{{ asset('dist/img/img1.png') }}"
                                                            alt="#" /></figure>
                                                    <div class="play_icon">
                                                        <a class="play-btn" href="javascript:void(0)"><img
                                                                src="{{ asset('dist/img/play_icon.png') }}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="agency">
                                                    <figure><img src="{{ asset('dist/img/img2.png') }}"
                                                            alt="#" /></figure>
                                                    <div class="play_icon">
                                                        <a class="play-btn" href="javascript:void(0)"><img
                                                                src="{{ asset('dist/img/play_icon.png') }}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- controls -->
                <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- end banner -->
    <section class="content">
        @yield('content-home-page')
        <!--/. container-fluid -->
    </section>

    <!-- blog -->
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text_align_center ">
                        <h2>Latest Blog</h2>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
                    </div>
                </div>
            </div>
            <div class="row d_flex">
                <div class=" col-md-4">
                    <div class="latest">
                        <figure><img src="{{ asset('dist/img/blog1.jpg') }}" alt="#" /></figure>
                        <span>16 March</span>
                        <div class="nostrud">
                            <h3>Quis Nostrud </h3>
                            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                            <a class="read_more" href="blog.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="latest">
                        <figure><img src="{{ asset('dist/img/blog2.jpg') }}" alt="#" /></figure>
                        <span class="yellow">17 March</span>
                        <div class="nostrud">
                            <h3>Veniam, Quis </h3>
                            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                            <a class="read_more" href="blog.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="latest">
                        <figure><img src="{{ asset('dist/img/blog3.jpg') }}" alt="#" /></figure>
                        <span>18 March</span>
                        <div class="nostrud">
                            <h3>Tempor incididunt </h3>
                            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                            <a class="read_more" href="blog.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end blog -->
    <!-- about -->
    <div class="about">
        <div class="container_width">
            <div class="row d_flex grig">
                <div class="col-md-6">
                    <div class="about_img">
                        <figure><img src="{{ asset('dist/img/about_img.jpg') }}" alt="#" />
                        </figure>
                    </div>
                </div>
                <div class="col-md-6 order">
                    <div class="titlepage text_align_left">
                        <h2>About Our Center</h2>
                        <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquipsed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip</p>
                        <a class="read_more" href="about.html">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->
    <!-- customers -->
    <div class="customers">
        <div class="clients_bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titlepage text_align_center">
                            <h2>What is Says Customers</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start slider section -->
        <div id="myCarousel" class="carousel slide clients_banner" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <div class="row d_flex">
                                <div class="col-md-2 col-sm-8">
                                    <div class="pro_file">
                                        <i><img src="{{ asset('dist/img/test2.png') }}" alt="#" /></i>
                                        <h4>English.Many</h4>
                                        <span>normal distribution</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="test_box text_align_left">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                            roots in a piece of classical Latin literature from 45 BC, making it over
                                            2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                                            College in Virginia, looked up one of the more obscure Latin words,
                                            consectetur, from a Lorem Ipsum passage, and going </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <div class="row d_flex">
                                <div class="col-md-2 col-sm-8">
                                    <div class="pro_file">
                                        <i><img src="{{ asset('dist/img/test2.png') }}" alt="#" /></i>
                                        <h4>English.Many</h4>
                                        <span>normal distribution</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="test_box text_align_left">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                            roots in a piece of classical Latin literature from 45 BC, making it over
                                            2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                                            College in Virginia, looked up one of the more obscure Latin words,
                                            consectetur, from a Lorem Ipsum passage, and going </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <div class="row d_flex">
                                <div class="col-md-2 col-sm-8">
                                    <div class="pro_file">
                                        <i><img src="{{ asset('dist/img/test2.png') }}" alt="#" /></i>
                                        <h4>English.Many</h4>
                                        <span>normal distribution</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="test_box text_align_left">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                            roots in a piece of classical Latin literature from 45 BC, making it over
                                            2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                                            College in Virginia, looked up one of the more obscure Latin words,
                                            consectetur, from a Lorem Ipsum passage, and going </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- end customers -->
    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="hedingh3 text_align_left">
                                    <h3>About</h3>
                                    <p> Virginia, looked up one of the more obscure Latin words, consectetur, from a
                                        Lorem Ipsum passage, and going through the cites of the word in classical
                                        literature, discovered the undoubtable sourc</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="hedingh3 text_align_left">
                                    <h3>Blog</h3>
                                    <p>Which don't look even slightly believable. If you are going to use a passage of
                                        Lorem Ipsum, you need to be sure there isn't anythin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="hedingh3 text_align_left">
                                    <h3>Menu</h3>
                                    <ul class="menu_footer">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="service.html">Service</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="hedingh3  text_align_left">
                                    <h3>Newsletter</h3>
                                    <form id="colof" class="form_subscri">
                                        <input class="newsl" placeholder="Email" type="text" name="Email">
                                        <button class="subsci_btn">Subscribe</button>
                                    </form>
                                    <ul class="top_infomation">
                                        <li><i class="fa fa-phone" aria-hidden="true"></i>
                                            +01 1234567890
                                        </li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i>
                                            <a href="Javascript:void(0)">demo@gmail.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="follow text_align_center">
                                <h3>Follow Us</h3>
                                <ul class="social_icon ">
                                    <li><a href="Javascript:void(0)"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="Javascript:void(0)"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="Javascript:void(0)"><i class="fa fa-linkedin"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="Javascript:void(0)"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p>© 2020 All Rights Reserved. Design by <a href="https://html.design/"> Free html
                                    Templates</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/custom.js') }}"></script>

    <script>
        fetch("http://127.0.0.1:8000/api/category/list")
            .then((res) => res.json())
            .then((data) => {
                data.data.forEach((item) => {
                    renderCate(item);
                });
            });

        const listCategory = document.querySelector("#list-cate");
        const renderCate = (item) => {
            const output = `
               <li><a href="detail-category/${item.id}">${item.name}</a></li>
            `;
            listCategory.insertAdjacentHTML("beforebegin", output);
        };
    </script>
</body>

</html>
