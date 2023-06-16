<div class="col-lg-4 col-md-6">
    <div class="latest-product__text">
        <h4>{{$title}}</h4>
        <div class="latest-product__slider owl-carousel">
            <div class="latest-prdouct__slider__item">

                @foreach($topRatedProducts->take(3) as $topRatedProduct)
                    <a href="{{route('product.detail',$topRatedProduct->slug)}}" class="latest-product__item">
                        <div class="latest-product__item__pic"> <img width="200px" height="200px" src="{{asset('storage/'.$topRatedProduct->image)}}" alt=""> </div>
                        <div class="latest-product__item__text">
                            <h6>{{$topRatedProduct->title}}</h6>
                            <span>${{$topRatedProduct->price}}</span> </div>
                    </a>
                @endforeach

            </div>
            <div class="latest-prdouct__slider__item">
                @foreach($topRatedProducts->skip(3)->take(3) as $topRatedProduct2)
                    <a href="{{route('product.detail',$topRatedProduct2->slug)}}" class="latest-product__item">
                        <div class="latest-product__item__pic"> <img width="200px" height="200px" src="{{asset('storage/'.$topRatedProduct2->image)}}" alt=""> </div>
                        <div class="latest-product__item__text">
                            <h6>{{$topRatedProduct2->title}}</h6>
                            <span>${{$topRatedProduct2->price}}</span> </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
