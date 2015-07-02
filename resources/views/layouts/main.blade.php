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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
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
        <!-- top panel -->
        <div class="navbar navbar-inverse navbar-fixed-top topbar">
            <div class="container">

                <!-- cart -->
                @if(!Auth::check())
                    <div id="cart">
                    <div class="heading">
                        <a href="auth/google" title="Log In">
                           <span id="cart-total">
                               <i class="fa fa-user fa-lg"></i>&nbsp;
                               <span class="hidden-xs">Sign In</span>
                           </span>
                        </a>
                    </div>
                    </div>
                @else
                    <div id="cart">
                    <div class="heading">
                            <a href={!! action('AuthController@logout')!!}>
                            <span id="cart-total">
                           <i class="fa fa-power-off fa-lg"></i>
                           </span>
                        </a>
                        <a title="Shopping Cart">
                           <span id="cart-total">
                               <i class="fa fa-shopping-cart fa-lg"></i>&nbsp;
                               <span class="hidden-xs">{{\Cart::count()}} item(s) - ₹{{\Cart::total()}}.00</span>
                           </span>
                        </a>
                    </div>
                    </div>
                @endif
                

                
                <div id="menu" class="menu-container">
                    <button type="button" class="menu-toggle" data-toggle="collapse" data-target="#menu-mobile">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse menu-collapse" id="menu-mobile">
                       
                           <ul class="nav nav-pills">
                            @foreach($categoriesnavbar as $id=>$category)
                            <li>{!! link_to_action('StoreController@getCategory', $category, $id)!!}
                            </li>
                            @endforeach
                            @if(Auth::check())
                                <li>{!! link_to_action('StoreController@getMyorders', "My Orders")!!}</li>
                            @endif
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
                            <a href="{{url('/')}}"><img src="{{ asset('img/logo_pizza.png') }}" title="MeraBite" alt="MeraBite"></a>
                        </div>
                    </div>



                    <div class="col-sm-4">
                        <div id="search">
                          {!!Form::macro('myField', function()
                            {
                                return '<button type="submit" class="btn btn-default"><span class="fa fa-search"></span></button>';
                            });!!}

                        {!! Form::open(array('url'=>'store/search', 'method'=>'get', 'class'=>'form-inline')) !!}
                        <div class="input-group">
                        {!! Form::text('keyword', null, array('placeholder'=>'Search by keyword', 'class'=>'form-control')) !!}
                          <span class="input-group-btn">
                         {!!Form::myField();!!}
                        </span>
                        </div>
                        {!! Form::close() !!}
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
                    <div class="box product-slider clearfix">
    
                        <div class="banner clearfix pull-right" style="width: 200px">
                            <div class="item pull-left">
                                <a href="pizza.html">
                                    <img src="img/data-banners-03-200x140.jpg" alt="Hot" title="Hot">
                                </a>
                                <br>
                            </div>
                            <div class="item pull-left">
                                <a href="pizza.html">
                                    <img src="img/data-banners-07-200x140.jpg" alt="Special" title="Special">
                                </a>
                                <br>
                            </div>
                        </div>
        
                        <div class="box-content hidden-xs" style="margin-right: 250px;">
                            <div class="bx-wrapper">
                                <div class="bx-viewport">
                                    <div id="product-slider-0">
                                        <div class="slide-item" >
                                            <div class="si-image">
                                                <a href="margarita.html">
                                                    <img src="img/data-pizza-margarita-300x300.jpg" alt="Margarita">
                                                </a>
                                            </div>
                                
                                            <div class="si-caption">
                                                <div class="si-title">
                                                    <a href="margarita.html">MARGHERITA</a>
                                                </div>

                                                <div class="si-desc">
                                                    <span>
                                                        All lovers of Italian cuisine know that the Pizza Margherita is the culinary embodiment of Italy. Classic cake flavored with mozzarella and red tomatoes.
                                                    </span>
                                                </div>
                                    
                                                <div class="si-rating rating">
                                                    <div class="stars" title="Based on 3 reviews.">
                                                        <i class="fa fa-star"></i>&nbsp;
                                                        <i class="fa fa-star"></i>&nbsp;
                                                        <i class="fa fa-star"></i>&nbsp;
                                                        <i class="fa fa-star"></i>&nbsp;
                                                        <i class="fa fa-star-o"></i>&nbsp;                        
                                                    </div>
                                                </div>
                                    
                                                <div class="si-price price">
                                                    <div><span class="price-fixed">₹220.00</span></div>
                                                </div>
                                    
                                                <div class="si-buy cart">
                                                    <button onclick="addToCart(&#39;44&#39;);" type="button" class="btn btn-success">
                                                        <span>Buy now</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="slide-item">
                                            <div class="si-image">
                                                <a href="paneer-tikka.php">
                                                    <img src="img/data-pizza-pizza-diablo-300x300.jpg" alt="Paneer Tikka Sub">
                                                </a>
                                            </div>
                                    
                                            <div class="si-caption">
                                                <div class="si-title">
                                                    <a href="paneer-tikka.php">Paneer Tikka Sub</a>
                                                </div>

                                                <div class="si-desc">
                                                    <span>
                                                        Cottage cheese slices marinated with barbeque seasoning and roasted to a light crispness. Sheer pleasure for the veggie when served on freshly baked bread.
                                                    </span>
                                                </div>
                                        
                                                <div class="si-rating rating">
                                                    <div class="stars" title="Based on 1 reviews.">
                                                        <i class="fa fa-star"></i>&nbsp;
                                                        <i class="fa fa-star"></i>&nbsp;
                                                        <i class="fa fa-star"></i>&nbsp;
                                                        <i class="fa fa-star"></i>&nbsp;
                                                        <i class="fa fa-star"></i>&nbsp;                        
                                                    </div>
                                                </div>
                                        
                                                <div class="si-price price">
                                                    <div><span class="price-fixed">₹125.00</span></div>
                                                </div>
                                        
                                                <div class="si-buy cart">
                                                    <button onclick="addToCart(&#39;6822&#39;);" type="button" class="btn btn-success">
                                                        <span>Buy now</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="slide-item">
                                            <div class="si-image">
                                                <a href="non-veg-supreme.php">
                                                    <img src="img/item3.jpg" alt="Non Veg Supreme">
                                                </a>
                                            </div>
                                    
                                            <div class="si-caption">
                                                <div class="si-title">
                                                    <a href="non-veg-supreme.php">Non Veg Supreme</a>
                                                </div>

                                                <div class="si-desc">
                                                    <span>
                                                        This is as loaded as it gets, folkes! There is hot 'n' spicy chicken with tangy black olives, onions, crisp capsicum & delectable mushrooms. Hey! Did we leave anything out?
                                                    </span>
                                                </div>
                                        
                                                <div class="si-price price">
                                                    <div><span class="price-fixed"></span>₹280.00</div>
                                                </div>
                                        
                                                <div class="si-buy cart">
                                                    <button onclick="addToCart(&#39;6816&#39;);" type="button" class="btn btn-success">
                                                        <span>Buy now</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="slide-item">
                                            <div class="si-image">
                                                <a href="chicken-tandoori.php">
                                                    <img src="img/menu_other_favourite_subs_chicken-tandoori.jpg" alt="Chicken Tandoori">
                                                </a>
                                            </div>
                                    
                                            <div class="si-caption">
                                                <div class="si-title">
                                                    <a href="chicken-tandoori.php">Chicken Tandoori</a>
                                                </div>

                                                <div class="si-desc">
                                                    <span>
                                                        Succulent chicken breast pieces marinated with yoghurt, garlic , ginger and barbecued to get that delightfully unique taste .Served on freshly baked bread with creamy mint mayo sauce.
                                                    </span>
                                                </div>
                                        
                                        
                                                <div class="si-price price">
                                                    <div><span class="price-fixed">₹135.00</span></div>
                                                </div>
                                        
                                                <div class="si-buy cart">
                                                    <button onclick="addToCart(&#39;6829&#39;);" type="button" class="btn btn-success">
                                                        <span>Buy now</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="slide-item">
                                            <div class="si-image">
                                                <a href="menu-desserts.php">
                                                    <img src="img/menu_desserts.jpg" alt="Rich Chocolodate Truffle">
                                                </a>
                                            </div>
                                    
                                            <div class="si-caption">
                                                <div class="si-title">
                                                    <a href="menu-desserts.php">Rich Chocolodate Truffle</a>
                                                </div>

                                                <div class="si-desc">
                                                    <span>
                                                        We are sure that this mouth watering dessert would give your yummy dinner a sweet ending! Try out the subway's original Rich chocolate truffle!
                                                    </span>
                                                </div>
                                        
                                                <div class="si-price price">
                                                    <div><span class="price-fixed">₹60.00</span></div>
                                                </div>
                                        
                                                <div class="si-buy cart">
                                                    <button onclick="addToCart(&#39;6836&#39;);" type="button" class="btn btn-success">
                                                        <span>Buy now</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="bx-controls bx-has-pager bx-has-controls-direction">
                                    <div class="bx-pager bx-default-pager"></div>
                                    <div class="bx-controls-direction" id="bx-controls-direction"></div>
                                </div>
                            </div>
                        </div>
       

                        <div class="box">
        
                            <ul id="product-tabs-0" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#product-tab-0-featured" data-toggle="tab">
                                        <span>Featured Products</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#product-tab-0-latest" data-toggle="tab">
                                        <span>Latest</span>
                                    </a>
                                </li>
                            </ul>

            
                            <div class="box-content tab-content" id="product-slideshow0">

                                <div class="box-product product-grid tab-pane fade in active" id="product-tab-0-featured">
                                    <!-- Begin box-product div -->
                                    <div class="item">
                                        <div class="image">
                                            <a href="peppy-paneer.php">
                                                <img src="img/dominos-peppy-paneer.jpg" alt="Stuffed Garlic Bread" width="240" height="240">
                                            </a>
                                        </div>
                        
                                        <div class="caption">
                                            <div class="name">
                                                <a href="peppy-paneer.php">Peppy Paneer Pizza</a>
                                            </div>

                                            <div class="price">
                                                <div>
                                                    <span class="price-fixed">₹200.00</span>
                                                </div>
                                            </div>
                            
                            
                                            <div class="cart">
                                                <button onclick="addToCart(&#39;44&#39;);" type="button" class="btn btn-success">
                                                    <i class="fa fa-shopping-cart"></i> <span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Begin box-product div -->
                                    <div class="item">
                                        <div class="image">
                                            <a href="chocolate-cookie.php">
                                                <img src="img/menu_cookies_single_chocolate.jpg" alt="Veg Shammi" width="240" height="240">
                                            </a>
                                        </div>
                        
                                        <div class="caption">
                                            <div class="name">
                                                <a href="chocolate-cookie.php">Chocolate Cookies</a>
                                            </div>

                                            <div class="price">
                                                <div>
                                                    <span class="price-fixed">₹30.00 for 2</span>
                                                </div>
                                            </div>
                                            
                                            <div class="cart">
                                                <button onclick="addToCart(&#39;6822&#39;);" type="button" class="btn btn-success">
                                                    <i class="fa fa-shopping-cart"></i> <span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Begin box-product div -->
                                    <div class="item">
                                        <div class="image">
                                            <a href="butterscotch.php">
                                                <img src="img/butterscotch.jpg" alt="Butterscotch Mousse Cake" width="240" height="240">
                                            </a>
                                        </div>
                        
                                        <div class="caption">
                                            <div class="name">
                                                <a href="butterscotch.php">Butterscotch Mousse Cake</a>
                                            </div>

                                            <div class="price">
                                                <div>
                                                    <span class="price-fixed">₹60.00</span>
                                                </div>
                                            </div>
                                            
                                            <div class="cart">
                                                <button onclick="addToCart(&#39;6827&#39;);" type="button" class="btn btn-success">
                                                    <i class="fa fa-shopping-cart"></i> <span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Begin box-product div -->
                                    <div class="item">

                                        <div class="image">
                                            <a href="veg-pasta.php">
                                                <img src="img/veg-pasta.jpg" alt="Veg Pasta" width="240" height="240">
                                            </a>
                                        </div>
                    
                                        <div class="caption">
                                            <div class="name">
                                                <a href="veg-pasta.php">Veg Pasta</a>
                                            </div>

                                            <div class="price">
                                                <div>
                                                    <span class="price-fixed">₹110.00</span>
                                                </div>
                                            </div>
                                            
                                            <div class="cart">
                                                <button onclick="addToCart(&#39;6836&#39;);" type="button" class="btn btn-success">
                                                    <i class="fa fa-shopping-cart"></i> <span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="box-product product-grid tab-pane fade" id="product-tab-0-latest">
                                    @yield('content')
                                </div>
                            </div>
                        </div>

                        

                    </div>
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