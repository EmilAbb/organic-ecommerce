
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="token" content="{{csrf_token()}}">
    <title>Contact</title>

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
                    <div class="header__cart__price">item: <span>${{Cart::name('basket')->getTotal()}}</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>


<section class="contact spad">
    <div class="container">
        <div class="row">
           @foreach($contacts as $contact)
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span>{!! $contact->icon !!}</span>
                        <h4>{{$contact->title}}</h4>
                        <p>{{$contact->text}}</p>
                    </div>
                </div>
           @endforeach
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
  @foreach($contactMaps as $contactMap)
       {!! $contactMap->iframe !!}


        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>{{$contactMap->title}}</h4>
                <ul>
                    <li>{{$contactMap->phone}}</li>
                    <li>{{$contactMap->text}}</li>
                </ul>
            </div>
        </div>
  @endforeach
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Leave Message</h2>
                </div>
            </div>
        </div>
        <form action="{{route('message')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Your name" name="name">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Your Email" name="email">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea placeholder="Your message" name="message"></textarea>
                    <button type="submit" class="site-btn">SEND MESSAGE</button>
                </div>
            </div>
        </form>
    </div>
</div>


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
