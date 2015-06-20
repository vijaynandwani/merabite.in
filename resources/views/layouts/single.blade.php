<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>MeraBite</title>
    <meta name="description" content="MeraBite">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta property="og:title" content="MeraBite: Come eat with us!">
    <meta property="og:type" content="website">
    <meta property="og:url" content="merabite.in">
    <meta property="og:image" content="{{ asset('img/logo_pizza.png') }}">
    <meta property="og:site_name" content="MeraBite: Come eat with us!">
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.bxslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/colorbox.css') }}">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/product_slider.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/product_tabs.css') }}" media="screen">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.cycle.js') }}"></script>
</head>
<body>

    <div class="wrap">
       <div class="navbar navbar-inverse navbar-fixed-top topbar">
            <div class="container">

                <!-- cart -->
                <div id="cart">
                    <div class="heading">
                        <a title="Shopping Cart">
                           <span id="cart-total">
                               <i class="fa fa-shopping-cart fa-lg"></i>&nbsp;
                               <span class="hidden-xs">0 item(s) - ₹0.00</span>
                           </span>
                        </a>
                    </div>

                    <div class="content">
                        <div class="inner">
                            <div class="empty">Your shopping cart is empty!</div>
                        </div>
                    </div>
                </div>

                
                <div id="menu" class="menu-container">
                    <button type="button" class="menu-toggle" data-toggle="collapse" data-target="#menu-mobile">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse menu-collapse" id="menu-mobile">
                       
                           <ul class="nav nav-pills">
                            @foreach($categories as $category)
                            <li><a href="pizza.html">{{$category}}</a>
                            </li>
                            @endforeach
                        </ul>
                        
                    </div>

                </div>
                <div class="divider hidden-sm hidden-xs"></div>
                
            </div>
        </div>
        <!-- //top panel -->

        <!-- header -->
        <div class="header">
            <div class="container">

                <div class="row">
                    <div class="col-sm-4">
                        <div class="social hidden-xs">
                            <a href="#" target="_blank" title="Pizza Chef Facebook">
                                <span class="fa fa-facebook"></span>
                            </a>
                            <a href="#" target="_blank" title="Pizza Chef Google+">
                                <span class="fa fa-google-plus"></span>
                            </a>
                            <a href="#" target="_blank" title="Pizza Chef Instagram">
                                <span class="fa fa-instagram"></span>
                            </a>
                            <a href="#" target="_blank" title="Pizza Chef Twitter">
                                <span class="fa fa-twitter"></span>
                            </a>
                            <a href="#" target="_blank" title="Pizza Chef YouTube">
                                <span class="fa fa-youtube"></span>
                            </a>
                        </div>
                        
                        <div class="header-left">
                            <div id="address">
                                <p><strong>Hours of operation:</strong></p>
                                <p>Tuesdays and Fridays: <strong> 20:00 - 22:00</strong></p>
                            </div>
                            <div id="phone">Come eat with us!</div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div id="logo">
                            <a href="/"><img src="{{ asset('img/logo_pizza.png') }}" title="MeraBite" alt="MeraBite"></a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div id="search">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="">
                                <span class="input-group-btn">
                                    <button class="btn btn-default button-search" type="button"><span class="fa fa-search"></span></button>
                                </span>
                            </div>
                        </div>

                        <div class="header-right">
                            <div id="welcome">
                                Welcome visitor you can <a href="login.html">login</a> or <a href="create-account.html">create an account</a>.
                            </div>

                            <div class="links">
                                <a id="wishlist-total" href="javascript:void(0);">
                                    <i class="fa fa-heart-o"></i> Wish List (0)
                                </a><br>
                                <a id="link-cart" href="shopping-cart.html">
                                    <i class="fa fa-shopping-cart"></i> Shopping Cart
                                </a><br>
                                <a id="link-checkout" href="checkout.html">
                                    <i class="fa fa-credit-card"></i> Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //header -->

        <div id="container" class="content">
            <div class="container">
                <div id="notification"></div> 
                

                <div id="content">

                   @yield('content')

                </div>
            </div>
        </div>

         <!-- footer -->
        <div id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="column">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="about-us2.html">How do we work</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="column">
                            <h4>Customer Service</h4>
                            <ul>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="request-return.html">Returns</a></li>
                                <li><a href="snuteam.php">SNU Team</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="column">
                            <h4>Extras</h4>
                            <ul>
                                <li><a href="brands.html">Brands</a></li>
                                <li><a href="vouchers.html">Party Orders</a></li>
                                <li><a href="search.html">Search</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="column">
                            <h4>My Account</h4>
                            <ul>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="create-account.html">Register</a></li>
                                <li><a href="forgot-password.html">Password</a></li>
                                <li><a href="shopping-cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-9 ">
                        <div id="about">
                            <h3>Order pizza online</h3>
                            <p>
                               <span id="result_box" lang="en">
                                    <span class="hps">Welcome to MeraBite! Here you can choose your pizzas, subs, beverages, desserts and order them. Pay them to our group on Tuesdays and Fridays between 20:00 - 22:00 and get your feast delivered at the SNU campus itself at no extra costs!</span> 
                                    
                                </span>
                                
                                
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-3 text-right">
                        <div id="powered">
                            <br> 
                            MeraBite © 2015
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //footer -->
    </div>
    
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.colorbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
    
</body>
</html>