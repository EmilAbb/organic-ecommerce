@extends('admin.layouts.admin')

@section('content')
    <a class="btn btn-primary my-3" href="{{route('admin-settings.create')}}">Add</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Logo</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th>Email</th>
                    <th>Text</th>
                    <th>Address</th>
                    <th>Facebook</th>
                    <th>Twitter</th>
                    <th>Linkedin</th>
                    <th>Pinterest</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($models as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td><img width="100" src="{{asset('storage/'.$model->image)}}" alt=""></td>
                        <td>{{$model->phone}}</td>
                        <td>{{$model->description}}</td>
                        <td>{{$model->email}}</td>
                        <td>{{$model->text}}</td>
                        <td>{{$model->address}}</td>
                        <td>{{$model->facebook}}</td>
                        <td>{{$model->twitter}}</td>
                        <td>{{$model->linkedin}}</td>
                        <td>{{$model->pinterest}}</td>

                        <td>
                            <a class="btn bg-yellow" href="{{route('admin-settings.edit',$model->id)}}"><i class="fa-solid fa-pen text-white"></i></a>
                        </td>

                        <td>
                            <form class="delete-form" action="{{route('admin-settings.destroy',$model->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
        <div class="container d-flex justify-content-center">
            {{$models->links()}}
        </div>
    </div>
@endsection
