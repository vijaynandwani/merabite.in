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
        <!-- top panel -->
        <div class="navbar navbar-inverse navbar-fixed-top topbar">
            <div class="container">

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
                <div id="column-right" class="hidden-xs hidden-sm">
                    <div class="box">
                        <div class="box-heading">
                            <span>Categories</span>
                        </div>
                        <div class="box-content">
                            <ul class="box-category treemenu">
                                @foreach($categoriesnavbar as $id=>$category)
                                <li>
                                    <a href="{{url('/store/category').'/'.$id}}"><span>{{$category}}</span></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="box box-featured">
                        <div class="box-heading">
                            <span>Featured</span>
                        </div>

                        <div class="box-content">
                            <div class="box-product product-grid">
                                <div class="item">
                                    <div class="image">
                                        <a href="margarita.html">
                                            {!! Form::image('img/data-pizza-margarita-80x80.jpg', 'Margarita') !!}
                                        </a>
                                    </div>
                        
                                    <div class="caption">
                                        <div class="name">
                                            <a href="margarita.html">Margarita</a>
                                        </div>

                                        <div class="price">
                                            <div>
                                                <span class="price-fixed">₹270.00</span>
                                            </div>
                                        </div>
                            
                                        <div class="cart">
                                            <button class="btn btn-success" type="button" onclick="addToCart(&#39;44&#39;);">
                                                <i class="fa fa-shopping-cart"></i> <span>Add to Cart</span>
                                            </button>
                                        </div>

                                        <div class="rating">
                                            <div class="stars" title="Based on 3 reviews.">
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star-o"></i>&nbsp;                        
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="image">
                                        <a href="margarita.html">
                                            {!! Form::image('img/data-pizza-pizza-diablo-80x80.jpg', 'Diablo') !!}
                                        </a>
                                    </div>
                        
                                    <div class="caption">
                                        <div class="name">
                                            <a href="margarita.html">Diablo</a>
                                        </div>

                                        <div class="price">
                                            <div>
                                                <span class="price-fixed">₹100</span>
                                            </div>
                                        </div>
                                        
                                        <div class="cart">
                                            <button class="btn btn-success" type="button" onclick="addToCart(&#39;6822&#39;);">
                                                <i class="fa fa-shopping-cart"></i> <span>Add to Cart</span>
                                            </button>
                                        </div>

                                        <div class="rating">
                                            <div class="stars" title="Based on 1 reviews.">
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i>                         
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="image">
                                        <a href="margarita.html">
                                             {!! Form::image('img/data-rolls-rolls-filadelfia-80x80.jpg', 'Rolls') !!}
                                        </a>
                                    </div>
                        
                                    <div class="caption">
                                        <div class="name">
                                            <a href="margarita.html">Rolls</a>
                                        </div>

                                        <div class="price">
                                            <div>
                                                <span class="price-fixed">₹150</span>
                                            </div>
                                        </div>
                                        
                                        <div class="cart">
                                            <button class="btn btn-success" type="button" onclick="addToCart(&#39;6827&#39;);">
                                                <i class="fa fa-shopping-cart"></i> <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div id="content">
                    @yield('content')

                </div>

                    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
                    <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
                </div>
            </div>
        </div>

        <!-- footer -->
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
    <script type="text/javascript" src="{{ asset('js/jquery.totalstorage.min.js') }}"></script>
    <script type="text/javascript">
    function display(view) {
        if (view == 'list')
        {
            $('#content .product-grid').attr('class', 'product-list box-product');
            $('.display').html('' +
                    '<div class="btn-group btn-group-sm">' +
                    '<span class="btn btn-default" disabled="disabled"><i class="fa fa-th-list"></i> List</span>' +
                    '<a class="btn btn-default" onclick="display(\'grid\');"><i class="fa fa-th"></i> Grid</a>' +
                    '</div>'
            );
            $.totalStorage('display', 'list');
        }
        else
        {
            $('#content .product-list').attr('class', 'product-grid box-product');
            $('.display').html('' +
                    '<div class="btn-group btn-group-sm">' +
                    '<a class="btn btn-default" onclick="display(\'list\');"><i class="fa fa-th-list"></i> List</a>' +
                    '<span class="btn btn-default" disabled="disabled"><i class="fa fa-th"></i> Grid</span>' +
                    '</div>'
            );
            $.totalStorage('display', 'grid');
        }
    }
    view = $.totalStorage('display');
    if (view) {
        display(view);
    } else {
        display('list');
    }
</script>
</body>
</html>