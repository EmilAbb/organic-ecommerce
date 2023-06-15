<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{$title}}</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li  class="product-link" id="all-products" data-filter="*" data-slug="all">All</li>

                    @foreach($categories as $category)
                            <li data-filter="*"  class="product-link" data-slug="{{$category->slug}}">{{$category->title}}</li>
                     @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter " id="product-by-slug">
         @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/'.$product->image)}}">
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
        <div class="container d-flex justify-content-center">
            {{$products->links()}}
        </div>

    </div>
</section>


@push('js')
    <script>
        $(document).ready(function(){
            $('.product-link').on('click',function (){
                $.ajax({
                    method:'get',
                    url:"{{route('get-category-slug',['slug'])}}".replace('slug',$(this).attr("data-slug")),
                    success(response){
                        $('#product-by-slug').html(response)
                        // $('.select2').select2();
                    }
                })
            })
        })
    </script>
@endpush

