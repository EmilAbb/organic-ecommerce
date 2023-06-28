@extends('admin.layouts.admin')

@section('content')
    <a class="btn btn-primary my-3" href="{{route('contact.create')}}">Add</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($models as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->icon}}</td>
                        <td>{{$model->title}}</td>
                        <td>{{$model->text}}</td>

                        <td>
                            <a class="btn bg-yellow" href="{{route('contact.edit',$model->id)}}"><i class="fa-solid fa-pen text-white"></i></a>
                        </td>

                        <td>
                            <form class="delete-form" action="{{route('contact.destroy',$model->id)}}" method="POST">
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
