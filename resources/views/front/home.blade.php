<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mayoutfit</title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="description" content="Mayoutfit">
    <link rel="canonical" href="https://mayoutfit.com/" />
    <!-- Mayoutfit style CSS -->
    <link rel="stylesheet" href="{{Config::get('app.url')}}assets/front/css/style.css">
    <script src="{{Config::get('app.url')}}assets/front/js/modernizr-2.6.2.min.js"></script>
    <!-- Mayoutfit JS -->
<script src="{{Config::get('app.url')}}assets/front/js/jquery-1.11.2.min.js"></script>
<script src="{{Config::get('app.url')}}assets/front/js/bootstrap.min.js"></script>
<script src="{{Config::get('app.url')}}assets/front/js/scripts.js"></script>
<script src="{{Config::get('app.url')}}assets/front/js/owl.carousel.min.js"></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<body>
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="{!!config('app.url')!!}public/login">Log In</a><span>/</span><a href="{!!config('app.url')!!}public/login">Register</a></li>
                <li><a href="{!!config('app.url')!!}public/payment">Confirm Payment</a></li>
                <li><a href="#">How to Order</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="lang">
                    <a href="#">ENG</a>
                    <a href="#" class="active">ID</a>
                </li>
                <li class="dropdown bags">
                  <a href="#" class="dropdown-toggle shop-bag" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <!--<small>My Bag</small>-->
                    <i class="ion-bag"></i>
                    <span class="value">{!!$count!!}</span>
                  </a>
                  <ul class="dropdown-menu cart">
                    <li>
                        @if($count >0)
                            <?php $subtotal = 0;?>
                            @for($jj=0; $jj < $count; $jj++)
                                <div class="cart-list clearfix">
                                    <div class="col-xs-4 cart-img"><a href="#"><img src="{!!config('app.url')!!}public/upload/{!!$image[$jj]!!}"></a></div>
                                    <div class="col-xs-8">
                                        <div class="flower-name"><a href="#">{!!$name[$jj]!!}</a></div>
                                        <div class="qty">Qty : {!!$qty[$jj]!!}</div>
                                        <div class="price-web">Rp. {!!number_format($price[$jj])!!}</div>
                                    </div>
                                </div>
                                <?php $subtotal += $qty[$jj] * $price[$jj];?>
                            @endfor
                        @else
                            <div class="cart-list clearfix">Cart masih kosong</div>
                        @endif
                        <!-- <div class="cart-list clearfix">
                            <div class="col-xs-4 cart-img"><a href="#"><img src="{{Config::get('app.url')}}assets/front/images/10-PURICIA-BLOUSE.jpg"></a></div>
                            <div class="col-xs-8">
                                <div class="flower-name"><a href="#">Aliquam Lobor Poka</a></div>
                                <div class="qty">Qty : 2</div>
                                <div class="price-web">Rp. 200.000</div>
                            </div>
                        </div> -->
                        <div class="cart-action">
                            @if($count >0)
                                <div class="cart-total row clearfix">
                                    <div class="subtotal-label col-xs-6"><strong>Total</strong></div>
                                    <div class="subtotal col-xs-6 text-right">Rp. {!!number_format($subtotal)!!}</div>
                                </div>
                            @endif
                            <a href="{!!config('app.url')!!}public/cart" ><button class="btn btn-default">View Cart</button></a>
                            <a href="{!!config('app.url')!!}public/checkout"><button  class="btn btn-primary">Checkout</button></a>
                        </div>
                    </li>
                  </ul>
                </li>
                <li class="search-bar">

                </li>
            </ul>
        </div>
    </div>
    <!-- Logo Mayoutfit -->
    <div class="container">
        <div class="logo col-md-2 col-md-offset-5 col-xs-6 col-xs-offset-3">
            <a href="#"><img src="{{Config::get('app.url')}}assets/front/images/logo.png" alt="Mayoutfit" height="100" class="img-responsive center-block"></a>
        </div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="{!!config('app.url')!!}public/new">New Arrival</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catalog <span class="caret"></span></a>
              <ul class="dropdown-menu cat-menu">
                @foreach($list_category as $keylc => $valuelc)
                <li><a href="{!!config('app.url')!!}public/product/category/{!!$keylc!!}">{!!$valuelc!!}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="#sale">Sale</a></li>
            <li><a href="#store">Store</a></li>
            <li><a href="#event">Event</a></li>
            <li><a href="#faq">FAQ</a></li>
            <li><a href="#contact">Contact</a></li>
            <li>
                <form id="search-now">
                    <input type="search" placeholder="Search">
                </form>
            </li>
          </ul>
           
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- content -->
    @yield('content');
    <!-- content -->
    <footer id="footer">
        <div class="copyright">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Terms &amp; Privacy</a></li>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Newsletter</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 text-right"><span>Mayoutfit &copy; 2016</span></div>
                </div>
                
            </div>
        </div>
    </footer>
    <script type="text/javascript">
        $('#addNewAddress').on('click', function(){
            $('#add-new').toggle();
        });
        $('.except-new').on('click', function(){
            $('#add-new').hide();
        });
    </script>
</body>
</html>