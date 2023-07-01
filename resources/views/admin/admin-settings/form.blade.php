@extends('admin.layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($model) ? route('admin-settings.update',$model->id) :  route('admin-settings.store')}}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset

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


                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" placeholder="Phone" name="phone" value="{{old('phone',$model->phone ?? '')}}" class="form-control">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" placeholder="Description" name="description" value="{{old('description',$model->description ?? '')}}" class="form-control">
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Email" name="email" value="{{old('email',$model->email ?? '')}}" class="form-control">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Text</label>
                    <input type="text" placeholder="Text" name="text" value="{{old('text',$model->text ?? '')}}" class="form-control">
                    @error('text')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" placeholder="Address" name="address" value="{{old('address',$model->address ?? '')}}" class="form-control">
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Facebook</label>
                    <input type="url" placeholder="Facebook" name="facebook" value="{{old('facebook',$model->facebook ?? '')}}" class="form-control">
                    @error('facebook')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Twitter</label>
                    <input type="url" placeholder="Twitter" name="twitter" value="{{old('twitter',$model->twitter ?? '')}}" class="form-control">
                    @error('twitter')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Linkedin</label>
                    <input type="url" placeholder="Linkedin" name="linkedin" value="{{old('linkedin',$model->linkedin ?? '')}}" class="form-control">
                    @error('linkedin')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Pinterest</label>
                    <input type="url" placeholder="Pinterest" name="pinterest" value="{{old('pinterest',$model->pinterest ?? '')}}" class="form-control">
                    @error('pinterest')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
