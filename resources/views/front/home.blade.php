@extends('front.layout')

@section('content')

    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($products as $product)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{asset('storage/'.$product->image)}}">
                                <h5><a style="border-radius: 5px;color: #7fad39;height: 40px;font-size: 14px;" href="{{route('product.detail',$product->slug)}}">{{$product->title}}</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
 <x-featured-products title="Featured Product" :product-type="\App\Enums\ProductTypes::Featured_Product->value"/>
    <!-- Featured Section End -->

    <!-- Banner Begin -->




    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">


                <x-latest-products title="Latest Products" :product-type="\App\Enums\ProductTypes::Latest_Products->value"/>



                <x-top-rated-products title="Top Rated Products" :product-type="\App\Enums\ProductTypes::Top_Rated_Products->value"/>


                <x-review-products title="Review Products" :product-type="\App\Enums\ProductTypes::Review_Products->value"/>

            </div>
        </div>
    </section>


@endsection

