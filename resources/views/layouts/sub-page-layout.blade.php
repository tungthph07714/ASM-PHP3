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
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
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

<body class="main-layout inner_page blog_page">
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
                                                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                                        @endif
                                                    @endauth
                                                </div>
                                            @endif
                                        </ul>
                                    </li>
                                    <li class="d_none"><a href="Javascript:void(0)"><i class="fa fa-search"
                                                aria-hidden="true"></i></a>
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
    </div>
    <!-- blog -->
    <div class="blog">
        <div class="container">
            @yield('content-sub-page')


        </div>
    </div>
    <!-- end blog -->
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
               <li><a href="/detail-category/${item.id}">${item.name}</a></li>
            `;
            listCategory.insertAdjacentHTML("beforebegin", output);
        };
    </script>
</body>

</html>
