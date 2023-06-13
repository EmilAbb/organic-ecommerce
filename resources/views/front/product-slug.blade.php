<div class="row featured__filter " id="product-by-slug">
    @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat d-flex justify-content-center">
            <div class="featured__item">
                <div class="featured__item__pic set-bg">
                    <img style="width: 100%;height: 100%;object-fit: contain" src="{{asset('storage/'.$product->image)}}" alt="">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>

                </div>
                <div class="featured__item__text">
                    <h6><a href="#">{{$product->title}}</a></h6>
                    <h5>${{$product->price}}</h5>
                </div>
            </div>
        </div>
    @endforeach
</div>
