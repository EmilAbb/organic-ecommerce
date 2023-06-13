@extends('admin.layouts.admin')
@section('content')



    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route('product.update',$model->id) :  route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            @foreach(config('app.languages') as $lang)
                                <li class="nav-item ">
                                    <a
                                        class="nav-link {{$loop->first ? 'active show' : ''}}@error("$lang.title") text-danger @enderror"
                                       id="custom-tabs-one-home-tab" data-toggle="pill" href="#tab-{{$lang}}" role="tab" aria-controls="custom-tabs-one-home"
                                       aria-selected="true">{{$lang}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="tab-{{$lang}}" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" placeholder="Title" name="{{$lang}}[title]"
                                               value="{{old($lang.'.title', isset($model) ? $model->translateOrDefault($lang)->title : '' )}}" class="form-control">
                                        @error("$lang.title")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" placeholder="Slug" name="{{$lang}}[slug]"
                                               value="{{old($lang.'.slug', isset($model) ? $model->translateOrDefault($lang)->slug : ''  )}}" class="form-control">
                                        @error("$lang.slug")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" placeholder="Description" name="{{$lang}}[description]"
                                               value="{{old($lang.'.description', isset($model) ? $model->translateOrDefault($lang)->description : ''  )}}" class="form-control">
                                        @error("$lang.description")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Specs</label>
                                        <input type="text" placeholder="Specs" name="{{$lang}}[specs]"
                                               value="{{old($lang.'.specs', isset($model) ? $model->translateOrDefault($lang)->specs : ''  )}}" class="form-control">
                                        @error("$lang.specs")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label>Category</label>
                    <select  class="form-control select2 product-category" name="category_id" id="">
                        <option value="">Select category</option>

                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @selected(old('category_id',isset($model) ? $model->category_id : null) == $category->id)>{{$category->title}}</option>
                        @endforeach

                    </select>
                    @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>



                <div class="form-group">
                    <label>Product Type</label>
                    <select name="types[]" class="form-control select2" multiple>
                        @foreach(\App\Enums\ProductTypes::cases() as $type)
                            <option value="{{$type->value}}"
                            @isset($model)  @selected(in_array($type->value,$model->types->pluck('type')->toArray()))@endisset
                            >{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>




                <div class="form-group">
                    <input type="text" name="price" class="form-control"
                    value="{{old('price',isset($model) ? $model->price : '')}}"
                    placeholder="price">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="number" name="qty" class="form-control"
                           value="{{old('qty',isset($model) ? $model->qty : '')}}"
                           placeholder="qty">
                    @error('qty')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Image</label>
                    @isset($model)
                        <br>
                        <img width="200" src="{{asset('storage/'.$model->image)}}">
                    @endisset
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div id="attribute-area">

                </div>

                <button class="btn btn-success">Save</button>


            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $('.product-category').on('change',function (){
                getCategoryAttributes($(this).val())
            })
            getCategoryAttributes($('.product-category').val())
        })
        function getCategoryAttributes(categoryId){
            const productId = '{{isset($model) ? $model->id : ""}}'
            $.ajax({
                method:'get',
                url:"{{route('attributes-by-category',['category-id','product-id'])}}".replace('category-id',categoryId).replace('product-id',productId),
                success(response){
                    $('#attribute-area').html(response)
                    $('.select2').select2();
                }
            })
        }
    </script>
@endpush
@include('admin.includes.select2')
