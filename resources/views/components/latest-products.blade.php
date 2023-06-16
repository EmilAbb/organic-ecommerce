<div class="col-lg-4 col-md-6">
    <div class="latest-product__text">
        <h4>{{$title}}</h4>
        <div class="latest-product__slider owl-carousel">
            <div class="latest-prdouct__slider__item">

                @foreach($latestProducts->take(3) as $latestProduct)
                    <a href="{{route('product.detail',$latestProduct->slug)}}" class="latest-product__item">
                        <div class="latest-product__item__pic"> <img width="200px" height="200px" src="{{asset('storage/'.$latestProduct->image)}}" alt=""> </div>
                        <div class="latest-product__item__text">
                            <h6>{{$latestProduct->title}}</h6>
                            <span>${{$latestProduct->price}}</span> </div>
                    </a>
                @endforeach

            </div>
            <div class="latest-prdouct__slider__item">
                @foreach($latestProducts->skip(3)->take(3) as $latestProduct2)
                    <a href="{{route('product.detail',$latestProduct2->slug)}}" class="latest-product__item">
                        <div class="latest-product__item__pic"> <img width="200px" height="200px" src="{{asset('storage/'.$latestProduct2->image)}}" alt=""> </div>
                        <div class="latest-product__item__text">
                            <h6>{{$latestProduct2->title}}</h6>
                            <span>${{$latestProduct2->price}}</span> </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

