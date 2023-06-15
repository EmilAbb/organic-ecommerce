@foreach($products as $product)
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item">
            <div class="product__item__pic set-bg">
                <img src="{{asset('storage/'.$product->image)}}" alt="">
                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <h6><a href="#">{{$product->title}}</a></h6>
                <h4 class="my-2">{{$product->category->title}}</h4>
                <h5>${{$product->price}}</h5>
            </div>
        </div>
    </div>
@endforeach
