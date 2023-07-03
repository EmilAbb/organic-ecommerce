
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="token" content="{{csrf_token()}}">
    <title>Basket</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css">

</head>

<body>

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">
                        <ul>
                            @foreach($adminSettings as $adminSetting)
                                <li><i class="fa fa-envelope"></i> {{$adminSetting->email}}</li>
                                <li>{{$adminSetting->text}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            @foreach($adminSettings as $adminSetting)
                                <a target="_blank" href="{{$adminSetting->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a target="_blank"  href="{{$adminSetting->twitter}}"><i class="fa fa-twitter"></i></a>
                                <a target="_blank"  href="{{$adminSetting->linkedin}}"><i class="fa fa-linkedin"></i></a>
                                <a target="_blank"  href="{{$adminSetting->pinterest}}"><i class="fa fa-pinterest-p"></i></a>
                            @endforeach
                        </div>
                        <div class="header__top__right__language">
                            <div>{{app()->getLocale()}}</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                @foreach(config('app.languages') as $lang)
                                    @if($lang !=app()->getLocale())
                                        <li><a href="">{{$lang}}</a></li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="{{route('loginView.page')}}"><i class="fa fa-user"></i> Login</a>

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    @foreach($adminSettings as $adminSetting)
                        <a href="{{route('home-page')}}"><img src="{{asset('storage/'.$adminSetting->image)}}" alt=""></a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul style="margin-left: -82px">
                        @foreach($menus as $menu)
                            <li><a href="{{$menu->url}}">{{$menu->title}}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        @if(auth()->check())
                            <li><a href="{{route('profile')}}"><i  class="fa fa-user"></i></a></li>
                            <li> <a href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                        @endif
                        <li><a href="{{route('wishlist')}}"><i class="fa fa-heart"></i> <span>{{Cart::name('wishlist')->countItems()}}</span></a></li>
                        <li><a href="{{route('basket')}}"><i class="fa fa-shopping-bag"></i> <span>{{Cart::name('basket')->countItems()}}</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>${{$basket->getTotal()}}</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-14 d-flex">
                <div class="shoping__cart__table">
                    <form action="{{route('update.from.basket')}}" method="POST">
                        @csrf
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($basket->getItems() as $basketItem)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <a target="_blank" href="{{route('product.detail',$basketItem->get('extra_info')['product']->slug)}}">
                                            <img width="100px" height="100px" src="{{asset('storage/'.$basketItem->get('extra_info')['product']->image)}}" alt="">
                                        </a>
                                        <h5>{{$basketItem->get('title')}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{$basketItem->get('price')}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="items[{{$basketItem->getHash()}}]" value="{{$basketItem->get('quantity')}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        ${{$basketItem->getSubTotal()}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{route('delete.from.basket',$basketItem->get('id'))}}"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-12">
                                <div class="shoping__cart__btns">
                                    <a href="{{route('shop.page')}}" class="primary-btn cart-btn my-5">CONTINUE SHOPPING</a>
                                    <button style="border:none"  class="my-5 primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                                        Update Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6" style="margin-left: 50px">
                    @auth()
                        <div class="shoping__checkout">
                            <h5 style="text-align: center">Order information</h5>
                            <form action="{{route('complete.order')}}" method="post">
                                @csrf
                                <div class="form-group form-group-sm">
                                    <input type="text" name="phone" placeholder="Phone" class="form-control form-control-sm">
                                    @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-group-sm">
                                    <input type="text" name="address" placeholder="Address" class="form-control form-control-sm">
                                    @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button  class="btn primary-btn">PROCEED TO CHECKOUT</button>
                            </form>

                            <ul style="margin-top: 20px">
                                <li>Subtotal <span>${{$basket->getTotal()}}</span></li>
                            </ul>

                        </div>

                    @endauth
                </div>
            </div>

        </div>

    </div>
</section>


<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                @foreach($adminSettings as $adminSetting)
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('home-page')}}"><img src="{{asset('storage/'.$adminSetting->image)}}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: {{$adminSetting->address}}</li>
                            <li>Phone: {{$adminSetting->phone}}</li>
                            <li>Email: {{$adminSetting->email}}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        @foreach($menus as $menu)
                            <li><a href="{{$menu->url}}">{{$menu->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="{{route('subscribe')}}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        @foreach($adminSettings as $adminSetting)
                            <a target="_blank" href="{{$adminSetting->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a target="_blank"  href="{{$adminSetting->twitter}}"><i class="fa fa-twitter"></i></a>
                            <a target="_blank"  href="{{$adminSetting->linkedin}}"><i class="fa fa-linkedin"></i></a>
                            <a target="_blank"  href="{{$adminSetting->pinterest}}"><i class="fa fa-pinterest-p"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img src="{{asset('assets/img/payment-item.png')}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->


<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('assets/js/mixitup.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
