<div class="col-lg-4 col-md-6">
    <div class="latest-product__text">
        <h4>{{$title}}</h4>
        <div class="latest-product__slider owl-carousel">
            <div class="latest-prdouct__slider__item">

                @foreach($products->take(3) as $product)
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic"> <img width="200px" height="200px" src="{{asset('storage/'.$product->image)}}" alt=""> </div>
                        <div class="latest-product__item__text">
                            <h6>{{$product->title}}</h6>
                            <span>${{$product->price}}</span> </div>
                    </a>
                @endforeach

            </div>
            <div class="latest-prdouct__slider__item">
                @foreach($products->skip(3)->take(3) as $product)
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic"> <img width="200px" height="200px" src="{{asset('storage/'.$product->image)}}" alt=""> </div>
                        <div class="latest-product__item__text">
                            <h6>{{$product->title}}</h6>
                            <span>${{$product->price}}</span> </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
