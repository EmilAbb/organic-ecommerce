<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="token" content="{{csrf_token()}}">
    <title>Shop Grid</title>

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
<!-- Page Preloder -->

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{asset('assets/img/language.png')}}" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{route('home-page')}}">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="">Shop Details</a></li>
                    <li><a href="{{route('basket')}}">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

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
                <nav class="header__menu" style="width: 650px">
                    <ul>
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
                            <li><a href="{{route('profile')}}"><i class="fa fa-user"></i></a></li>
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
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <x-category-list/>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{route('search')}}" method="GET">

                            <input type="text" name="query" placeholder="What do yo u need?">
                            <button type="submit"  class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            @foreach($adminSettings as $adminSetting)
                                <h5>{{$adminSetting->phone}}</h5>
                                <span>{{$adminSetting->description}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            @foreach($categories->where('parent_id',null) as $category)
                                <li><a data-filter="*" class="products-link" data-slug="{{$category->slug}}"
                                       href="#">{{$category->title}}</a>
                                    @if($categories->where('parent_id',$category->id)->count())
                                        <ul>
                                            @foreach($categories->where('parent_id',$category->id) as $subCategory)
                                                <li><a href="">{{$subCategory->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div
                                class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="5" data-max="90">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <form id="price-filter-form" action="{{route('shop.page')}}" method="get">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 900px">
                        <x-latest-products title="Latest Products"
                                           :product-type="\App\Enums\ProductTypes::Latest_Products->value"/>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach($products as $product)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg">
                                                <img width="100%" height="100%" src="{{asset('storage/'.$product->image)}}"
                                                     alt="" style="object-fit: cover">
                                                <ul class="product__item__pic__hover">
                                                    <li><a class="add-to-wishlist" data-qty="1" data-id="{{$product->id}}" href=""><i class="fa fa-heart"></i></a></li>
                                                    <li><a data-qty="1" class="add-to-shop"  data-id="{{$product->id}}" href=""><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>{{$product->category->title}}</span>
                                                <h5><a href="{{route('product.detail',$product->slug)}}">{{$product->title}}</a></h5>
                                                <div class="product__item__price">${{$product->price}}</div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                </div>
                <div class="row" id="products-links">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg">
                                    <img src="{{asset('storage/'.$product->image)}}" alt="">
                                    <ul class="product__item__pic__hover">
                                        <li><a data-qty="1" data-id="{{$product->id}}" class="add-to-wishlist" href=""><i class="fa fa-heart"></i></a></li>
                                        <li><a data-qty="1" class="add-to-shop"  data-id="{{$product->id}}" href=""><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6 >{{$product->category->title}}</h6>
                                    <h4 class="my-2"><a style="color: #000000" href="{{route('product.detail',$product->slug)}}">{{$product->title}}</a></h4>
                                    <h5>${{$product->price}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="container d-flex justify-content-center">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

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
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}


<script>
    $(document).ready(function () {
        $('.products-link').on('click', function () {
            $.ajax({
                method: 'get',
                url: "{{route('get-category-slug',['slug'])}}".replace('slug', $(this).attr("data-slug")),
                success(response) {
                    $('#products-links').html(response)
                    // $('.select2').select2();
                }
            })
        })
    })

    $(document).ready(function () {
        $(".price-range").slider({
            range: true,
            min: 1,
            max: 90,
            values: [1, 90],
            slide: function (event, ui) {
                $("#minamount").val(ui.values[0])
                    $("#maxamount").val(ui.values[1])

            },
            stop: function (event, ui) {
                $.ajax({
                    url: "{{route('product.filter')}}",
                    method: "GET",
                    data: {
                        min_price: ui.values[0],
                        max_price: ui.values[1]
                    },
                    success: function (response) {
                        $('#products-links').html(response)
                    },
                    error: function (xhr) {

                    }
                })
            }

        })
    })

    $(document).on('click','.add-to-shop',function (e){
        e.preventDefault()
        // const qty = $(this).val()
        // $('.add-to-shop').attr('data-qty',qty)
        var $el = $(this)
        $.ajax({
            method:'POST',
            url: "{{route('add.basket')}}",
            data:{
                _token: $('meta[name=token]').attr('content'),
                qty:$el.attr('data-qty'),
                product_id:$el.attr('data-id')
            },
            success(){
                window.location.reload()
            }


        })
    })

    $(document).on('click','.add-to-wishlist',function (e){
        e.preventDefault()
        // const qty = $(this).val()
        // $('.add-to-shop').attr('data-qty',qty)
        var $el = $(this)
        $.ajax({
            method:'POST',
            url: "{{route('add.wishlist')}}",
            data:{
                _token: $('meta[name=token]').attr('content'),
                qty:$el.attr('data-qty'),
                product_id:$el.attr('data-id')
            },
            success(){
                window.location.reload()
            }


        })
    })
</script>


</body>

</html>


