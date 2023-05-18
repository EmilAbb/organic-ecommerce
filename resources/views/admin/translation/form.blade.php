@extends('admin.layouts.admin')
@section('content')



    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route('translation.update',$model->id) :  route('translation.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            @foreach(config('app.languages') as $lang)
                                <li class="nav-item ">
                                    <a class="nav-link {{$loop->first ? 'active show' : ''}} @error("value.$lang") text-danger @enderror" id="custom-tabs-one-home-tab" data-toggle="pill" href="#value-{{$lang}}" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Value {{$lang}}</a>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="value-{{$lang}}" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <input type="text" placeholder="Value" name="value[{{$lang}}]"
                                               value="{{old('value.'.$lang, isset($model) ?  $model->getTranslation('value',$lang) : '')}}" class="form-control">
                                        @error("value.$lang")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- /.card -->
                </div>




                <div class="form-group">
                    <label>Key</label>
                    <input type="text" placeholder="Key" name="key" value="{{old('key',$model->key ?? '')}}" class="form-control">
                    @error('key')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
