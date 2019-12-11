
<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="float-left">
                        <p>Phone: +01 734655485</p>
                        <p>email: eisershop@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="float-right">
                        <ul class="right_side">
                            <li>
                                <a href="cart.html">
                                    Checkout
                                </a>
                            </li>
                            @if(Session::get('customerId'))
                            <li><a href="#" onclick="document.getElementById('customerLoginForm').submit();">Logout</a></li>
                                <form id="customerLoginForm" action="{{route('customer-logout')}}" method="post">
                                  @csrf
                                </form>
                            @else
                            <li><a href="{{route('new-customer-login')}}">Login</a></li>
                            @endif
                            <li><a href="#">Create Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html">
                    <img src="{{asset('/public/front')}}/img/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0">
                        <div class="col-lg-7 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('/')}}">Home</a>
                                </li>
                                @foreach($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('category', ['id'=>$category->id , 'name'=>$category->cat_name])}}">{{$category->cat_name}}</a>
                                </li>
                                  @endforeach
                            </ul>
                        </div>

                        <div class="col-lg-5 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-search" aria-hidden="true"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-user" aria-hidden="true"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
