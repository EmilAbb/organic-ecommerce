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
                                       id="custom-tabs-one-home-tab" data-toggle="pill" href="#title-{{$lang}}" role="tab" aria-controls="custom-tabs-one-home"
                                       aria-selected="true">Title {{$lang}}</a>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="title-{{$lang}}" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <input type="text" placeholder="Title" name="{{$lang}}[title]"
                                               value="{{old($lang.'title', isset($model) ? $model->translateOrDefault($lang)->title : '' )}}" class="form-control">
                                        @error("$lang.title")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>

                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            @foreach(config('app.languages') as $lang)
                                <li class="nav-item ">
                                    <a
                                        class="nav-link {{$loop->first ? 'active show' : ''}}@error("$lang.slug") text-danger @enderror"
                                        id="custom-tabs-one-home-tab" data-toggle="pill" href="#slug-{{$lang}}" role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">Slug {{$lang}}</a>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="slug-{{$lang}}" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <input type="text" placeholder="Slug" name="{{$lang}}[slug]"
                                               value="{{old($lang.'slug', isset($model) ? $model->translateOrDefault($lang)->slug : ''  )}}" class="form-control">
                                        @error("$lang.slug")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>


                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            @foreach(config('app.languages') as $lang)
                                <li class="nav-item ">
                                    <a
                                        class="nav-link {{$loop->first ? 'active show' : ''}}@error("$lang.description") text-danger @enderror"
                                        id="custom-tabs-one-home-tab" data-toggle="pill" href="#description-{{$lang}}" role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">Description {{$lang}}</a>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="description-{{$lang}}" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <input type="text" placeholder="Description" name="{{$lang}}[description]"
                                               value="{{old($lang.'description', isset($model) ? $model->translateOrDefault($lang)->description : ''  )}}" class="form-control">
                                        @error("$lang.description")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>


                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            @foreach(config('app.languages') as $lang)
                                <li class="nav-item ">
                                    <a
                                        class="nav-link {{$loop->first ? 'active show' : ''}}@error("$lang.specs") text-danger @enderror"
                                        id="custom-tabs-one-home-tab" data-toggle="pill" href="#specs-{{$lang}}" role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">Specs {{$lang}}</a>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="specs-{{$lang}}" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <input type="text" placeholder="Specs" name="{{$lang}}[specs]"
                                               value="{{old($lang.'specs', isset($model) ? $model->translateOrDefault($lang)->specs : ''  )}}" class="form-control">
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
                    <select class="form-control" name="category_id" id="">
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
                    <input type="number" name="price" class="form-control"
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

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
