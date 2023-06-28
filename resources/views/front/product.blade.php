<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="token" content="{{csrf_token()}}">
    <title>Product Detail</title>

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
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
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
                    <a href="{{route('home-page')}}"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li><a href="{{route('home-page')}}">Home</a></li>
                        <li class="active"><a href="{{route('shop.page')}}">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">Shop Details</a></li>

                            </ul>
                        </li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                        <li><a href="{{route('basket')}}">Shoping Cart</a></li>
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

<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">

                        <div class="product__details__pic__item">
                            <img style="object-fit: contain" src="{{asset('storage/'.$product->image)}}" alt="">
                        </div>

                    <div class="product__details__pic__slider owl-carousel">
                        @foreach($product->images as $productImage)
                        <img style="object-fit: contain" width="200px" height="150px" data-imgbigurl="{{asset('storage/'.$productImage->image)}}"
                             src="{{asset('storage/'.$productImage->image)}}" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$product->title}}</h3>
                    <div class="product__details__rating">
                        <p>
                        @for($i = 1;$i <= $avg_rating; $i++)
                            <i style="color: #7fad39" class="fas fa-star"></i>
                        @endfor
                           ( {{$product->reviews->count()}} Reviews )</p>
                    </div>
                    <div class="product__details__price">${{$product->price}}</div>
                    <p>Mauris blandit aliquet elit, <b>{!! $product->description !!}</b>.</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input id="input-qty" type="text" value="1">
                            </div>
                        </div>
                    </div>
                    <a data-id="{{$product->id}}"
                       data-qty="1"
                       href=""
                       class="primary-btn add-to-card"
                       data-filters=""
                    >ADD TO CARD </a>
                    <a href="" class="heart-icon add-wishlist" data-qty="1" data-id="{{$product->id}}"><i class="fa-regular fa-heart"></i></a>
                    <ul>
                        <li><b>Category:</b> <b>{{$product->category->title}}</b></li>
                        <li><b>Specs:</b> <b>{{$product->specs}}</b></li>
                        <li><b>Share on:</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                               aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                               aria-selected="false">Specs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                               aria-selected="false">Reviews <span>({{$product->reviews->count()}})</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Description</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. <b>{!! $product->description !!}</b></p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Specs</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. <b>{{$product->specs}}</b>.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row my-5">
                                <div class="col-md-6">
                                    <h4 class="mb-4">{{$product->reviews->count()}} review for {{$product->title}}</h4>
                                    <div class="media mb-4" style="flex-direction: column;width: 100%">
                                      @foreach($product->reviews as $productReview)
                                            <div class="media-body">
                                                <h6>{{$productReview->full_name}}<small> - <i>{{$productReview->created_at}}</i></small></h6>
                                                <div class="text-primary mb-2">
                                                    @for($i = 1;$i <= $productReview->rating; $i++)
                                                        <i style="color: #7fad39" class="fas fa-star"></i>
                                                    @endfor

                                                </div>
                                                <p>{{$productReview->comment}}</p>
                                            </div>
                                      @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div>
                                            <a data-rate="1" style="color: #7fad39;cursor: pointer" class="far fa-star rating-star"></a>
                                            <a data-rate="2" style="color: #7fad39;cursor: pointer" class="far fa-star rating-star"></a>
                                            <a data-rate="3" style="color: #7fad39;cursor: pointer" class="far fa-star rating-star"></a>
                                            <a data-rate="4" style="color: #7fad39;cursor: pointer" class="far fa-star rating-star"></a>
                                            <a data-rate="5" style="color: #7fad39;cursor: pointer" class="far fa-star rating-star"></a>

                                        </div>
                                    </div>
                                    <form action="#" id="review-form" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea name="comment" id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input name="full_name" type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input name="email" type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0" style="background-color: #7fad39;width: 160px;border-radius: 10px">
                                            <input style="color: #FFFFFF" type="submit" value="Leave Your Review" class="btn px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>{{$product->category->title}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
          @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic">
                            <img src="{{asset('storage/'.$product->image)}}" alt="">
                            <ul class="product__item__pic__hover">
                                <li><a data-qty="1" data-id="{{$product->id}}" href="" class="add-to-wishlist"><i class="fa fa-heart"></i></a></li>

                                <li><a class="add-card"
                                       data-qty="1" data-id="{{$product->id}}"
                                       href=""><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{route('product.detail',$product->slug)}}">{{$product->title}}</a></h6>
                            <h5>${{$product->price}}</h5>
                        </div>
                    </div>
                </div>
          @endforeach
        </div>
    </div>
</section>
<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: 60-49 Road 11378 New York</li>
                        <li>Phone: +65 11.188.888</li>
                        <li>Email: hello@colorlib.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved | This template is made with <i class="fa fa-heart"
                                                                                aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="footer__copyright__payment"><img src="{{asset('assets/img/payment-item.png')}}" alt="">
                    </div>
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

<script>
   let rate = 1
   $(document).on('click','.rating-star',function (){
       $(this).removeClass('far fa-star')
       $(this).addClass('fa-solid fa-star')
       rate = $(this).attr('data-rate')
   })

   $(document).on('submit','#review-form',function (e){
       e.preventDefault()
       let data = {
           product_id:' {{$product->id}}',
           'rating': rate
       }
       $(this).serializeArray().forEach(function (el){
           data[el['name']] = el['value']
       })
       $.ajax({
         method: 'post',
           url: '{{route('rate.product')}}',
           data:{
               _token: $('meta[name=token]').attr('content'),
               ...data
           },
           beforeSend(){
                  $('.error-data').remove()
           },
           success(){
            window.location.reload()
           },
           error(err){
             if(err.status == 422){
               Object.keys(err.responseJSON.errors).forEach(function (errorName){
                   $(`input[name=${errorName}]`).parent().append(`<small class="text-danger error-data">${err.responseJSON.errors[errorName][0]}</small>`)
                   $(`textarea[name=${errorName}]`).parent().append(`<small class="text-danger error-data">${err.responseJSON.errors[errorName][0]}</small>`)
               })
             }
           }
       })
   })


</script>

<script>
    $(document).on('change mouseleave','#input-qty',function (e){
        e.preventDefault()
      const qty = $(this).val()
        $('.add-to-card').attr('data-qty',qty)

        $(document).on('click','.add-to-card',function (e){
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
    })

    $(document).on('click','.add-card',function (e){
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


    $(document).on('change mouseleave','#input-qty',function (e){
        e.preventDefault()
        const qty = $(this).val()
        $('.add-wishlist').attr('data-qty',qty)

        $(document).on('click','.add-wishlist',function (e){
            e.preventDefault()
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
