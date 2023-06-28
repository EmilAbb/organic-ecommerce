@extends('admin.layouts.admin')
@section('content')

    <a class="btn btn-primary my-3" href="{{route('organic.create')}}">Add</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Description</th>
                    <th>Url</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($models as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->title}}</td>
                        <td>{{$model->text}}</td>
                        <td>{{$model->description}}</td>
                        <td>{{$model->url}}</td>
                        <td><img width="100" src="{{asset('storage/'.$model->image)}}" alt=""></td>


                        <td>
                            <a class="btn bg-yellow" href="{{route('organic.edit',$model->id)}}"><i class="fa-solid fa-pen text-white"></i></a>
                        </td>

                        <td>
                            <form class="delete-form" action="{{route('organic.destroy',$model->id)}}" method="POST">
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
