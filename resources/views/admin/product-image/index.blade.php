@extends('admin.layouts.admin')
@section('content')

    <a class="btn btn-primary my-3" href="{{route('product-image.create',$productId)}}">Add</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($models as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td><img width="100" src="{{asset('storage/'.$model->image)}}"></td>

                       <td>
                            <a class="btn btn-secondary" href="{{route('product-image.edit',$model->id)}}">Edit</a>
                        </td>

                        <td>
                            <form class="delete-form" action="{{route('product-image.destroy',$model->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
