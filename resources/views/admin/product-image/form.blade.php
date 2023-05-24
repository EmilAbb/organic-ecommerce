@extends('admin.layouts.admin')
@section('content')



    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route('product-image.update',$model->id) :  route('product-image.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset

                <input type="hidden" name="product_id" value="{{$productId}}">


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
