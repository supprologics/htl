
        <div class="full-width-header header-style2 modify1">
            <!--Header Start-->
            <header id="rs-header" class="rs-header">
                <!-- Topbar Area Start -->
                <div class="topbar-area ">
                    <div class="container">
                        <div class="row y-middle">
                            <div class="col-md-6">
                                <ul class="topbar-contact">
                                    <li>
                                        <i class="flaticon-email"></i>
                                        <a href="mailto:support@rstheme.com">support@rstheme.com</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-call"></i>
                                        <a href="tel:+0885898745">(+088) 589-8745</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 text-right">
                                <ul class="topbar-right">
                                    @auth
                                            <li class="btn-part">
                                                <a class="apply-btn"
                                                        
                                                @if (Auth::user()->role_id==1)
                                                    href="{{ route('admin.home') }}"
                                                @elseif(Auth::user()->role_id==2)
                                                    href="{{ route('lecturer.home') }}"
                                                @else 
                                                    href="{{ route('student.home') }}"
                                                @endif
                                                >{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                                            </li>
                                            <li class="login-register">
                                                <i class="fa fa-sign-out"></i>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">Log out</a>
                                                            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                            
                                    @else   
                                    <li class="login-register">
                                        <i class="fa fa-sign-in"></i>
                                        <a href="{{ route('register') }}">Sign Up</a>
                                    </li>
                                    <li class="btn-part">
                                        <a class="apply-btn" href="{{ route('login') }}">Sign in</a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Topbar Area End -->

                <!-- Menu Start -->
                <div class="menu-area menu-sticky">
                    <div class="container-fluid">
                        <div class="row y-middle">
                            <div class="col-lg-4">
                                <div class="logo-cat-wrap">
                                    <div class="logo-part pr-90">
                                        <a href="{{ route('welcome') }}">
                                            <img src="{{ ('assets/images/logo.png') }}" alt="">
                                        </a>
                                    </div>
                                    <!--
                                    <div class="categories-btn">
                                       <button type="button" class="cat-btn"><i class="fa fa-th"></i>Categories</button>
                                        <div class="cat-menu-inner">
                                            <ul id="cat-menu">
                                                <li><a href="">Category 1</a></li>
                                                <li><a href="">Category 2</a></li>
                                                <li><a href="">Category 3</a></li>
                                                <li><a href="">Category 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                -->
                                </div>
                            </div>
                            <div class="col-lg-8 text-center">
                                <div class="rs-menu-area">
                                    <div class="main-menu pr-90 md-pr-15">
                                        <div class="mobile-menu">
                                            <a class="rs-menu-toggle">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                        </div>
                                        <nav class="rs-menu">
                                            <ul class="nav-menu">
                                              <li class=" current-menu-item">
                                                  <a href="{{route('welcome')  }}">Home</a>
                                              </li>

                                                <li class=" current-menu-item">
                                                    <a href="{{route('site.subjects')  }}" 
                                                    onclick="event.preventDefault();  document.getElementById('subject-form').submit();">Subjects</a>
                                                      
                                                    <form id="subject-form" action="{{ route('site.subjects') }}" method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" name="search_filter" id="search_filter" value="">
                                                        <input type="hidden" name="language_filter" id="language_filter" value="">
                                                        <input type="hidden" name="grade_filter" id="grade_filter" value="">
                                                    </form>
                                                </li>

                                                <li class= " current-menu-item">
                                                    <a href="{{route('site.about')  }}">About</a>
                                                </li> 

                                                <!--
                                                    <li class="menu-item-has-children">
                                                        <a href="#">Courses</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="course.html">Courses One</a> </li>
                                                            <li><a href="course2.html">Courses Two</a> </li>
                                                            <li><a href="course3.html">Courses Three</a> </li>
                                                            <li><a href="course4.html">Courses Four</a> </li>
                                                            </li><li><a href="course5.html">Courses Five</a> </li>
                                                            <li><a href="course6.html">Courses Six</a> </li>
                                                            <li><a href="course-single.html">Courses Single</a> </li>
                                                        </ul>
                                                    </li>
                                                -->
                                                
                                            </ul> <!-- //.nav-menu -->
                                        </nav>                                        
                                    </div> <!-- //.main-menu -->
                                    <!---
                                    <div class="expand-btn-inner">
                                        <ul>
                                            <li>
                                                <a class="hidden-xs rs-search short-border" data-target=".search-modal" data-toggle="modal" href="#">
                                                    <i class="flaticon-search"></i>
                                                </a>
                                            </li>
                                            <li class="icon-bar cart-inner no-border mini-cart-active">
                                                <a class="cart-icon">
                                                    <i class="flaticon-bag"></i>
                                                </a>
                                                <div class="woocommerce-mini-cart text-left">
                                                    <div class="cart-bottom-part">
                                                        <ul class="cart-icon-product-list">
                                                            <li class="display-flex">
                                                                <div class="icon-cart">
                                                                    <a href="#"><i class="fa fa-times"></i></a>
                                                                </div>
                                                                <div class="product-info">
                                                                    <a href="cart.html">Law Book</a><br>
                                                                    <span class="quantity">1 × $30.00</span>
                                                                </div>
                                                                <div class="product-image">
                                                                    <a href="cart.html"><img src="{{ ('assets/images/shop/1.jpg') }}" alt="Product Image"></a>
                                                                </div>
                                                            </li>
                                                            <li class="display-flex">
                                                                <div class="icon-cart">
                                                                    <a href="#"><i class="fa fa-times"></i></a>
                                                                </div>
                                                                <div class="product-info">
                                                                    <a href="cart.html">Spirit Level</a><br>
                                                                    <span class="quantity">1 × $30.00</span>
                                                                </div>
                                                                <div class="product-image">
                                                                    <a href="cart.html"><img src="{{ ('assets/images/shop/2.jpg') }}" alt="Product Image"></a>
                                                                </div>
                                                            </li>
                                                        </ul>

                                                        <div class="total-price text-center">
                                                            <span class="subtotal">Subtotal:</span>
                                                            <span class="current-price">$85.00</span>
                                                        </div>

                                                        <div class="cart-btn text-center">
                                                            <a class="crt-btn btn1" href="cart.html">View Cart</a>
                                                            <a class="crt-btn btn2" href="checkout.html">Check Out</a>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </li>
                                        </ul>
                                    </div>
                                -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu End -->

            </header>
            <!--Header End-->
        </div>