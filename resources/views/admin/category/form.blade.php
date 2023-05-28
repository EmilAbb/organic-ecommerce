@extends('admin.layouts.admin')
@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route('category.update',$model->id) :  route('category.store')}}"
                  method="POST" enctype="multipart/form-data">
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
                                        id="custom-tabs-one-home-tab" data-toggle="pill" href="#title-{{$lang}}"
                                        role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">Title {{$lang}}</a>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="title-{{$lang}}"
                                     role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <input type="text" placeholder="Title" name="{{$lang}}[title]"
                                               value="{{old($lang.'title', isset($model) ? $model->translateOrDefault($lang)->title : '' )}}"
                                               class="form-control">
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
                                        id="custom-tabs-one-home-tab" data-toggle="pill" href="#slug-{{$lang}}"
                                        role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">Slug {{$lang}}</a>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="slug-{{$lang}}"
                                     role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <input type="text" placeholder="Slug" name="{{$lang}}[slug]"
                                               value="{{old($lang.'slug', isset($model) ? $model->translateOrDefault($lang)->slug : ''  )}}"
                                               class="form-control">
                                        @error("$lang.slug")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Parent Category</label>
                    <select class="form-control" name="parent_id" id="">
                        <option value="">Select category</option>

                        @foreach($categories->where('id','!=',isset($model) ? $model->id : null) as $category)
                            <option
                                value="{{$category->id}}" @selected(old('parent_id',isset($model) ? $model->parent_id : null) == $category->id)>{{$category->title}}</option>
                        @endforeach

                    </select>
                    @error('parent_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Attributes</label>
                    <select id="select2" class="form-control" name="attributes[]" id="" multiple>
                        @foreach($attributes as $attribute)
                            <option value="{{$attribute->id}}" @isset($model) @selected(in_array($attribute->id,old('attributes[]',$model->attributes->pluck('id')->toArray())))@endisset >{{$attribute->title}}</option>
                        @endforeach

                    </select>
                    @error('parent_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Active</label>
                    <input type="checkbox" @checked(old('active',$model->active ?? '' ))  name="active" value="1">
                    @error('active')
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

@section('js')
    <script src="{{asset('_assets/plugins/select2/js/select2.full.js')}}"></script>
    <script>
        $('#select2').select2();
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('_assets/plugins/select2/css/select2.css')}}">
@endsection
